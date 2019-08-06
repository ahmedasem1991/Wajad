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
            'email' => ['required', 'email'],
            'password' => ['required', 'max:255', 'min:6']
        ]);

        if ($validate_inputs->fails()) {
            $this->addResponse($validate_inputs->errors())->addStatusCode(401);
            return $this->response();
        }

        if (!$token = auth('api')->attempt(request(['email', 'password']))) {
            $this->addResponse($this->invalid_data)->addStatusCode(401);
            return $this->response();
        }

        if (!auth('api')->user()->is_user()) {
            $this->addResponse($this->un_authorized)->addStausCode(401);
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
            $this->addResponse($validate_request->errors())->addStatusCode(401);
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
            $this->addResponse($this->unexpected_error)->addStatusCode(409);
            return $this->response();
        }

        if (!$token = auth('api')->attempt(request(['email', 'password']))) {
            $this->addResponse($this->un_authorized)->addStatusCode(401);
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
          
           // 'refresh_token' => auth()->refresh()
            'user' => auth('api')->user(),
            'expires_in' => config('jwt.ttl') * 60,
            'access_token' => $token,
           // 'refresh_token' => auth('api')->refresh()
        ]);
    }
}
