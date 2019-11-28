<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\PostLimitation;
use App\UserVerifications;
use App\Services\SmsProvider;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $smsProvider;

    public function __construct(SmsProvider $smsProvider)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verify', 'resendCode', 'resetPassword']]);
        $this->smsProvider = $smsProvider;
    }

    public function login()
    {
        $validate_password = Validator::make(request()->all(), [
            'password' => ['required', 'max:255', 'min:6']
        ]);

        if ($validate_password->fails()) {
            $this->addMultibleResponse($validate_password->errors())->addStatusCode(400);
            return $this->response();
        }

        if (is_numeric(request('user'))) {
            $validate_mobile_number = Validator::make(
                request()->all(),
                ['user' => ['required', 'min:9', 'max:14', 'exists:users,mobile_number']],
                ['user.exists' => trans('auth.failed')]
            );

            if ($validate_mobile_number->fails()) {
                $this->addMultibleResponse($validate_mobile_number->errors())->addStatusCode(400);
                return $this->response();
            }

            if (app()->environment('production')) {
                if (preg_match('/(00966)[0-9]{9}/', request('user'))) {
                    request()->merge(['user' =>  request('user')]);
                } elseif (preg_match('/[0-9]{9}/', request('user'))) {
                    $mobile_number = '00966' . request('user');
                    request()->merge(['user' => $mobile_number]);
                }
            }
            $request = ['mobile_number' => request('user'), 'password' => request('password')];
        }

        if (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            $validate_email = Validator::make(
                request()->all(),
                ['user' => ['required', 'email', 'exists:users,email']],
                ['user.exists' => trans('auth.failed')]
            );

            if ($validate_email->fails()) {
                $this->addMultibleResponse($validate_email->errors())->addStatusCode(400);
                return $this->response();
            }

            $request = ['email' => request('user'), 'password' => request('password')];
        }

        if (!isset($request)) {
            $this->addResponse(trans('auth.notvalid'))->addStatusCode(400);
            return $this->response();
        }

        $request['type'] = User::Types['user'];

        if (!$token = auth('api')->attempt($request)) {
            $this->addResponse(trans('auth.failed'))->addStatusCode(401);
            return $this->response();
        }

        if (!auth('api')->user()->isUser()) {
            $this->addResponse(trans('auth.failed'))->addStatusCode(401);
            return $this->response();
        }

        return $this->respondWithToken($token);
    }

    public function register()
    {
        $validate_request = Validator::make(request()->all(), [
            'name' => ['required', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255'],
            'mobile_number' => ['required', 'numeric', 'unique:users,mobile_number'],
        ]);

        if (app()->environment('production')) {
            if (preg_match('/(00966)[0-9]{9}/', request('mobile_number'))) {
                $mobile_number = request('mobile_number');
            } elseif (preg_match('/[0-9]{9}/', request('mobile_number'))) {
                $mobile_number = '00966' . request('mobile_number');
            }
            request()->merge(['mobile_number' => $mobile_number]);
        }

        if (app()->environment('local')) {
            $mobile_number = request('mobile_number');
        }

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        $activation_code = env('STATIC_VERIFICATION_CODE', rand(1000, 9999));

        $user = User::create([
            'name' => request('name'),
            'password' => bcrypt(request('password')),
            'email' => request('email'),
            'mobile_number' => $mobile_number,
            'verification_code' => $activation_code,
            'type' => User::Types['user'],
            'is_mobile_number_verified' => false,
        ]);

        $user->userVerification()->create([
            'verification_code' => $activation_code
        ]);

        $user->postLimitation()->save(new PostLimitation());

        $message = 'Wajad, Register activation code is ' . $activation_code;

        $this->smsProvider->sendMessage($message, $mobile_number);

        return $this->jsonResponse([
            'data' => [
                "unverified_user_id" => $user->id,
                "message" => trans('auth.verification_code_sent'),
            ]
        ]);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $token,
            'expires_in' => config('jwt.ttl') * 60,
            'user' => new UserResource(auth('api')->user())
        ]);
    }
}
