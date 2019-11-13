<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\UserVerifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\LoginAuthException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    private $mobile_number = "";

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $validate_password = Validator::make((array) request('password'), ['required', 'max:255', 'min:6']);

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
            'email' => ['required', 'email', 'unique:users,mobile_number'],
            'password' => ['required', 'min:6', 'max:255'],
            'mobile_number' => ['required', 'numeric', 'unique:users,mobile_number'],
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
            ->where('mobile_number', '=',   $mobile_number)->where('type', '=', User::Types['user'])
            ->first();


        // if (!empty($user_verification) && $user_verification->sendCodeWithinMinute()) {
        //     $this->addResponse(trans('auth.verification_code_wait_time_one_minute'))->addStatusCode(400);
        //     return $this->response();
        // }



        if (empty($user_verification)) {
            $activation_code = env('STATIC_VERIFICATION_CODE') ?: str_pad(rand(0, pow(10, 4) - 1), 4, '0', STR_PAD_LEFT);
            $attemp = 1;

            $user_verification = UserVerifications::create([
                'name' => request('name'),
                'password' => bcrypt(request('password')),
                'email' => request('email'),
                'mobile_number' => $mobile_number,
                'verification_code' => $activation_code,
                'agreement' => request('agreement'),
                'attemp' => $attemp,
                'type' => User::Types['user'] // Normal User
            ]);
        } else {
            $user_verification->attemp += 1;
            $user_verification->save();
        }


        $basic  = new \Nexmo\Client\Credentials\Basic(env('NEXMO_KEY'), env('NEXMO_SECRET'));
        $client = new \Nexmo\Client($basic);
        $message = 'Wajad, Register activation code is ' . $activation_code;
        // $client->message()->send([
        //     'to' =>  $mobile_number,
        //     'from' => 'Nexmo',
        //     'text' => $message
        // ]);

        $this->addResponse(trans('auth.verification_code_sent'))->addStatusCode(200);
        return  $this->response();
    }


    public function verify()
    {
        $user_verification = UserVerifications::where('email', '=', request('email'))
        ->where('mobile_number', '=', request('mobile_number'))->where('type', '=', User::Types['user'])
        ->first();

        if (!empty($user_verification) && request('attemp') > 3) {
            $this->addResponse(trans('auth.verification_code_exceeded'))->addStatusCode(404);
            return $this->response();
        }

        if (!empty($user_verification) && request('attemp') > 3) {
            $this->addResponse(trans('auth.verification_code_exceeded'))->addStatusCode(404);
            return $this->response();
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
