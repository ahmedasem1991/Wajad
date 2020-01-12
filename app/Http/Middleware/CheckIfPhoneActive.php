<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\Api\ApiException;

class CheckIfPhoneActive
{
    public function handle($request, Closure $next)
    {
        if (auth('api')->user()->is_mobile_number_verified) {
            return $next($request);
        }

        throw new ApiException(trans('auth.phone_not_verified'), 400);
    }
}
