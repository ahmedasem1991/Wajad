<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\User;
use App\PostLimitation;
use App\Services\SmsProvider;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct(SmsProvider $smsProvider)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verify', 'resendCode', 'resetPassword']]);
    }

    public function login()
    {
        $validate_password = Validator::make(request()->all(), [
            'password' => ['required', 'max:255', 'min:6']
        ]);

        if ($validate_password->fails()) {
            throw new ApiException($validate_password->errors()->first(), 400);
        }

        if (is_numeric(request('user'))) {
            $validate_mobile_number = Validator::make(
                request()->all(),
                ['user' => ['required', 'min:9', 'max:14', 'exists:users,mobile_number']],
                ['user.exists' => trans('auth.failed')]
            );

            if ($validate_mobile_number->fails()) {
                throw new ApiException($validate_mobile_number->errors()->first(), 400);
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
                throw new ApiException($validate_email->errors()->first(), 400);
            }

            $request = ['email' => request('user'), 'password' => request('password')];
        }

        if (!isset($request)) {
            throw new ApiException(trans('auth.notvalid'), 400);
        }

        $request['type'] = User::Types['user'];

        if (!$token = auth('api')->attempt($request)) {
            throw new ApiException(trans('auth.failed'), 401);
        }

        if (!auth('api')->user()->isUser()) {
            throw new ApiException(trans('auth.failed'), 401);
        }

        return $this->respondWithToken($token);
    }

    public function register()
    {
        $validate_request = Validator::make(request()->all(), [
            'name' => ['required', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255', 'confirmed'],
            'mobile_number' => ['required', 'numeric', 'unique:users,mobile_number', 'digits_between:9,14'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if (app()->environment('production')) {
            if (!preg_match('/(00966)[0-9]{9}/', request('mobile_number'))) {
                $mobile_number = '00966' . request('mobile_number');
            }
            request()->merge(['mobile_number' => $mobile_number]);
        }

        if (app()->environment('local')) {
            $mobile_number = request('mobile_number');
        }

        $user = User::create([
            'name' => request('name'),
            'password' => bcrypt(request('password')),
            'email' => request('email'),
            'mobile_number' => $mobile_number,
            'type' => User::Types['user'],
            'is_mobile_number_verified' => false,
        ]);

        (new UserService)->createAndSendActivationCode($user, 'mobile_number');

        $user->postLimitation()->save(new PostLimitation());

        request()->merge(['user' => request('email')]);

        return $this->login();
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
