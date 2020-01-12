<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\Api\ApiException;
use App\Services\Auth\ApiCsrfVerification;

class ApiTokenVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->method() == 'GET') {
            return $next($request);
        }

        $token = $request->get('__token') ?? null;

        if (!$token || !is_array($token)) {
            throw new ApiException(trans("auth.token_mismatch"), 400);
        }

        if (ApiCsrfVerification::tokenIsValid($token)) {
            return $next($request);
        }

        throw new ApiException(trans("auth.token_mismatch"), 400);
    }
}
