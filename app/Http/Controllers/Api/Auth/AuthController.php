<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\UserVerifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\LoginAuthException;
use App\Services\SmsProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class AuthController extends Controller
{
    protected $smsProvider;

    public function __construct(SmsProvider $smsProvider)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verify', 'resendCode']]);
        $this->smsProvider = $smsProvider;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $validate_password = Validator::make(request()->all(), [
            'password' => ['required', 'max:255', 'min:6']
        ]);

        if ($validate_password->fails()) {
            $this->addMultibleResponse($validate_password->errors())->addStatusCode(401);
            return $this->response();
        }

        if (is_numeric(request('user'))) {
            $validate_mobile_number = Validator::make(
                request()->all(),
                ['user' => ['required', 'min:9', 'max:14', 'exists:users,mobile_number']],
                ['user.exists' => trans('auth.failed')]
            );

            if ($validate_mobile_number->fails()) {
                $this->addMultibleResponse($validate_mobile_number->errors())->addStatusCode(401);
                return $this->response();
            }

            if (!preg_match('/(00966)[0-9]{9}/', request('user'))) {
                request()->merge(['user' => '00966' . request('user')]);
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
                $this->addMultibleResponse($validate_email->errors())->addStatusCode(401);
                return $this->response();
            }

            $request = ['email' => request('user'), 'password' => request('password')];
        }

        if (!isset($request)) {
            $this->addResponse(trans('auth.notvalid'))->addStatusCode(401);
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

    /**
     * Register New User
     *
     * @return void
     */
    public function register()
    {
        $validate_request = Validator::make(request()->all(), [
            'name' => ['required', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'unique:user_verifications,email'],
            'password' => ['required', 'min:6', 'max:255'],
            'mobile_number' => ['required', 'numeric', 'unique:users,mobile_number', 'unique:user_verifications,mobile_number'],
            'agreement' => ['required', 'boolean']
        ]);

        // if (preg_match('/(00966)[0-9]{9}/', request('mobile_number'))) {
        //     $mobile_number = request('mobile_number');
        // } elseif (preg_match('/[0-9]{9}/', request('mobile_number'))) {
        //     $mobile_number = '00966' . request('mobile_number');
        // }
        // request()->merge([ 'mobile_number' => $mobile_number ]);
        $mobile_number = request('mobile_number');

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
            return $this->response();
        }

        $user_verification = UserVerifications::where('email', '=', request('email'))
            ->where('mobile_number', '=', $mobile_number)
            ->where('type', '=', User::Types['user'])
            ->first();

        if (empty($user_verification)) {
            $activation_code = env('STATIC_VERIFICATION_CODE', rand(1000, 9999));

            $user_verification = UserVerifications::updateOrCreate([
                'name' => request('name'),
                'password' => bcrypt(request('password')),
                'email' => request('email'),
                'mobile_number' => $mobile_number,
                'verification_code' => $activation_code,
                'agreement' => request('agreement'),
                'type' => User::Types['user'] // Normal User
            ]);

            $message = 'Wajad, Register activation code is ' . $activation_code;

            $this->smsProvider->sendMessage($message, $mobile_number);
        }

        return $this->jsonResponse([
            'data' => [
                "unverified_user_id" => $user_verification->id,
                "message" => trans('auth.verification_code_sent'),
            ]
        ]);
    }

    public function verify()
    {
        $user_verification = UserVerifications::find(request('unverified_user_id'));

        if (empty($user_verification)) {
            $this->addResponse(trans('auth.notregistered'))->addStatusCode(404);
            return $this->response();
        } else {
            if ($user_verification->attemp > 3) {
                $this->addResponse(trans('auth.verification_code_exceeded'))->addStatusCode(404);
                return $this->response();
            } else {
                if (request('code') == $user_verification->verification_code) {
                    $user  = User::create([
                        'name' => $user_verification->name,
                        'password' => $user_verification->password,
                        'email' => $user_verification->email,
                        'mobile_number' => $user_verification->mobile_number,
                        'agreement' => $user_verification->agreement,
                        'type' => $user_verification->type
                    ]);

                    $user_verification->delete();

                    $this->addResponse(trans('auth.registered_successfully'))->addStatusCode(200);

                    return $this->response();
                } else {
                    $user_verification->increment('attemp');
                    $this->addResponse(trans('auth.wrong_code'))->addStatusCode(400);
                    return $this->response();
                }
            }
        }
    }


    public function resendCode()
    {
        $user_verification = UserVerifications::find(request('unverified_user_id'));

        if (empty($user_verification)) {
            $this->addResponse(trans('auth.notregistered'))->addStatusCode(404);
            return $this->response();
        } else {
            if ($user_verification->sendCodeWithinMinute()) {
                $this->addResponse(trans('auth.verification_code_wait_time_one_minute'))->addStatusCode(400);
                return $this->response();
            } else {
                $user_verification->update(['attemp' => 0]);
                $activation_code =  $user_verification->activation_code;
                $mobile_number =  $user_verification->mobile_number;
                $message = 'Wajad, Register activation code is ' . $activation_code;
                $this->smsProvider->sendMessage($message, $mobile_number);
                return $this->jsonResponse([
                    'data' => [
                        "unverified_user_id" => $user_verification->id,
                        "message" => trans('auth.verification_code_sent'),
                    ]
                ]);
            }
        }
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'token_type' => 'bearer',
            'access_token' => $token,
            'expires_in' => config('jwt.ttl') * 60,
            'user' => auth('api')->user()
        ]);
    }
}
