<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
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
        $langHeader = $request->server('HTTP_ACCEPT_LANGUAGE');

        if ($langHeader !== 'ar') {
            $langHeader = 'en';
        }

        app()->setLocale($langHeader);

        return $next($request);
    }
}
