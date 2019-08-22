<?php

namespace App\Http\Middleware;

use Closure;

class AddCustomHeadersToTheApiRequest
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
        $headers = [
            'Accept' => 'application/json'
        ];

        $request_with_headers = $next($request);

        foreach ($headers as $key => $value) {
            $request_with_headers->headers->set($key, $value);
        }

        return $request_with_headers;
    }
}
