<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\LoginAuthException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
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
            $request = ['mobile_number' => request('user'), 'password' => request('password')];
        } elseif (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            $request = ['email' => request('user'), 'password' => request('password')];
        }else{
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
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'mobile_country_id' => ['required', 'integer', 'exists:countries,id']
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
            return $this->response();
        }

        $new_user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'mobile_number' => request('mobile_number'),
            'city_id' => request('city_id'),
            'mobile_country_id' => request('mobile_country_id'),
            'type' => 1 // Normal User
        ]);

        if (!$new_user) {
            $this->addResponse(trans('messages.unexpected_error'))->addStatusCode(409);
            return $this->response();
        }

        if (!$token = auth('api')->attempt(request(['email', 'password']))) {
            $this->addResponse(trans('auth.failed'))->addStatusCode(401);
            return $this->response();
        }

        return $this->respondWithToken($token);
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
