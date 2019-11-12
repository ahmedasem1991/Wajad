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
    private $phoneNumber="";

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
        $validate_inputs = Validator::make(request()->all(), [
            'user' => ['required'],
            'password' => ['required', 'max:255', 'min:6']
        ]);


        if (is_numeric(request('user'))) {
            if (preg_match('/(00966)[0-9]{9}/', request('user'))) {
                $phoneNumber = request('user');
            } elseif (preg_match('/[0-9]{9}/', request('user'))) {
                $phoneNumber = '00966' . request('user');
            }
            $request = ['mobile_number' => $phoneNumber, 'password' => request('password')];
        } 
        
        elseif (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            $request = ['email' => request('user'), 'password' => request('password')];
        } 
        
        else {
            $this->addResponse(trans('auth.notvalid'))->addStatusCode(401);
            return $this->response();
        }

        if ($validate_inputs->fails()) {
            $this->addMultibleResponse($validate_inputs->errors())->addStatusCode(401);
            return $this->response();
        }

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
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255'],
            'mobile_number' => ['required', 'numeric', 'unique:users,mobile_number'],
            'agreement' => ['required', 'boolean']
        ]);


        if (preg_match('/(00966)[0-9]{9}/', request('mobile_number'))) {
            $phoneNumber = request('mobile_number');
        } elseif (preg_match('/[0-9]{9}/', request('mobile_number'))) {
            $phoneNumber = '00966' . request('mobile_number');
        }    
        request()->merge([ 'mobile_number' => $phoneNumber ]);
 

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
            return $this->response();
        } 
     
        
        $email = request('email', '');
 
        try {
            UserVerifications::where('expired_period', '<', date('Y-m-d H:i:s'))->delete();
        } catch (\Exception $e) {
            \Log::info('ERROR_DELETING_USER_ACTIVATIONS', ['error' => '']);
        }

        $user_activation = UserVerifications::where('email', '=', $email)
        ->where('mobile_number','=',   $phoneNumber)
        ->first();

        if (!empty($user_activation) && Carbon::now()->diffInSeconds($user_activation->created_at) < 60) {
            return $this->addResponse(trans('auth.verification_code_wait_time_one_minute'))->addStatusCode(404);
        }

        if (!$user_activation || $user_activation->expired_period < date('Y-m-d H:i:s')) {
            if ($user_activation)
                $user_activation->delete();

            $activation_code = env('STATIC_VERIFICATION_CODE') ?: str_pad(rand(0, pow(10, 4) - 1), 4, '0', STR_PAD_LEFT);
            $activation_expire = date('Y-m-d H:i:s', strtotime('+15 minutes'));
            $user_activation = UserVerifications::create([
                'email' => $email,
                'mobile_number' => $phoneNumber,
                'verification_code' => $activation_code,
                'expired_period' => $activation_expire,
                'agreement' => request('agreement'), 
                'type' => 1 // Normal User
            ]);
        } else {
            $activation_code = $user_activation->activation_code;
        }

        //code to send sms verification code
        $output = ['code' => $activation_code];
        try {
            // $output['sms'] = SMSMessage::send($phoneNumber, $activation_code, env('SMS_FROM', '201066222501'));
       $nexmo = app('Nexmo\Client');
	$nexmo->message()->send([
		'to'   =>   $phoneNumber,
		'from' => 'nexmo',
		'text' => $activation_code
	]);
       
        } catch (Exception $e) {
            \Log::error(['error' => 'verify', 'exception' => $e]);
        }

        return $this->addResponse('Activation code Sent') ;






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
