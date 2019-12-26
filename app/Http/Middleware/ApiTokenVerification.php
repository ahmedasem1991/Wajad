<?php

namespace App\Http\Middleware;

use Closure;

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
        if ($header = $request->header('__token')) {
            # code...
        }
        return $next($request);
    }
}
