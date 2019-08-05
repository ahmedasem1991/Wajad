<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\LoginAuthException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
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
            $this->addResponse('Unauthorized.')->addStatusCode(401);
            return $this->response();
        }

        if (!auth('api')->user()->is_user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
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
            'user' => auth('api')->user(),
            'expires_in' => config('jwt.ttl') * 60,
            'access_token' => $token,
        ]);
    }
}
