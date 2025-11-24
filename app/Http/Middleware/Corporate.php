<?php

namespace App\Http\Middleware;

use Closure;

class Corporate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->isCorporateAdmin()) {
            return $next($request);
        }
        auth()->logout();

    }
}
