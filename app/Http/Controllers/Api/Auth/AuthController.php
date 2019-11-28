<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\ResetPassword;
use App\PostLimitation;
use App\UserVerifications;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\SmsProvider;
use Illuminate\Support\Carbon;
use App\Mail\ResetPasswordMail;
use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\LoginAuthException;
use App\Mail\ResetPasswordRequestMail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $smsProvider;

    public function __construct(SmsProvider $smsProvider)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verify', 'resendCode', 'resetPassword']]);
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

    /**
     * Register New User
     *
     * @return void
     */
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
        } else {
            $mobile_number = request('mobile_number');
        }

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
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

    public function verifyPhone()
    {
        $validate_verify = Validator::make(request()->all(), [
            'unverified_user_id' => ['required', 'exists:user_verifications,id'],
            'code' => ['required', 'exists:user_verifications,verification_code'],
        ]);

        if ($validate_verify->fails()) {
            $this->addMultibleResponse($validate_verify->errors())->addStatusCode(400);
            return $this->response();
        }

        $user_verification = UserVerifications::find(request('unverified_user_id'));
        if ($user_verification->attemp > 3) {
            $this->addResponse(trans('auth.verification_code_exceeded'))->addStatusCode(400);
            return $this->response();
        }

        if (request('code') != $user_verification->verification_code) {
            $user_verification->increment('attemp');
            $this->addResponse(trans('auth.wrong_code'))->addStatusCode(400);
            return $this->response();
        }
        $user  = User::create([
            'name' => $user_verification->name,
            'password' => $user_verification->password,
            'email' => $user_verification->email,
            'mobile_number' => $user_verification->mobile_number,
            'type' => $user_verification->type
        ]);

        if (!$token = auth('api')->login($user)) {
            $this->addResponse(trans('auth.failed'))->addStatusCode(401);
            return $this->response();
        }

        $user->postLimitation()->save(new PostLimitation());
        $user_verification->delete();
        return $this->respondWithToken($token);
    }


    public function resendCode()
    {
        $user_verification = UserVerifications::find(request('unverified_user_id'));

        if (empty($user_verification)) {
            $this->addResponse(trans('auth.notregistered'))->addStatusCode(400);
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
            'token_type' => 'Bearer',
            'access_token' => $token,
            'expires_in' => config('jwt.ttl') * 60,
            'user' => new UserResource(auth('api')->user())
        ]);
    }
    public function resetPassword()
    {
        $new_password = env('STATIC_NEW_PASSWORD', str::upper(str::random(6)));
        if (is_numeric(request('user'))) {
            $validate_mobile_number = Validator::make(
                request()->all(),
                ['user' => ['required', 'min:9', 'max:14', 'exists:users,mobile_number']],
                ['user.exists' => trans('auth.notvalid')]
            );

            if ($validate_mobile_number->fails()) {
                $this->addMultibleResponse($validate_mobile_number->errors())->addStatusCode(400);
                return $this->response();
            }

            if (app()->environment('production')) {
                if (!preg_match('/(00966)[0-9]{9}/', request('user'))) {
                    request()->merge(['user' => '00966' . request('user')]);
                }
            }

            $message =    trans('auth.new_password') . $new_password;
            $this->smsProvider->sendMessage($message, request('user'));

            $user = User::where('mobile_number', '=', request('user'))
                ->where('type', '=', User::Types['user'])
                ->first();

            $user->update([
                'password' => bcrypt($new_password),
            ]);

            Mail::to($user->email)->send(new ResetPasswordRequestMail());
            $this->addResponse(trans('auth.new_password_sent_to_phone'))->addStatusCode(200);
            return $this->response();
        }

        if (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            $validate_email = Validator::make(
                request()->all(),
                ['user' => ['required', 'email', 'exists:users,email']],
                ['user.exists' => trans('auth.notvalid')]
            );

            if ($validate_email->fails()) {
                $this->addMultibleResponse($validate_email->errors())->addStatusCode(400);
                return $this->response();
            }

            $user = User::where('email', '=', request('user'))
                ->where('type', '=', User::Types['user'])
                ->first();

            if (($user->email_verified_at) == "NULL") {
                $this->addResponse(trans('auth.mail_not_verified'))->addStatusCode(400);
                return $this->response();
            } else {
                ResetPassword::create([
                    'user_id' => $user->id,
                ]);
                $user->update([
                    'password' => bcrypt($new_password),
                ]);
                Mail::to(request('user'))->send(new ResetPasswordMail($new_password));
                $this->addResponse(trans('auth.new_password_sent_to_mail'))->addStatusCode(200);
                return $this->response();
            }
        }
    }
 
    public function changePassword()
    {
        if (request('new_password') != request('confirm_password')) {
            $this->addResponse(trans('auth.password_not_match'))->addStatusCode(400);
            return $this->response();
        }

        $validate_request = Validator::make(request()->all(), [
            'old_password' => ['required', 'min:6', 'max:255'],
            'new_password' => ['required', 'min:6', 'max:255'],
            'confirm_password' => ['required', 'min:6', 'max:255'],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        if (!Hash::check(request('old_password'), auth('api')->user()->getAuthPassword())) {
            $this->addResponse(trans('passwords.invalid'))->addStatusCode(401);
            return $this->response();
        }

        auth('api')->user()->update([
            'password' => bcrypt(request('new_password'))
        ]);

        $this->addResponse(trans('passwords.updated'))->addStatusCode(200);
        return $this->response();
    }
}
