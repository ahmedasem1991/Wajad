<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->user()->isAdmin() && auth()->user()->status == 1 ) {
            return $next($request);
        } 
        auth()->logout();
        return redirect()->route('nova.login');
    }
}
