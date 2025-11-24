<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $langHeader = $request->header('Content-Language');

        if ($langHeader != 'ar') {
            $langHeader = 'en';
        }

        app()->setLocale($langHeader);

        return $next($request);
    }
}
