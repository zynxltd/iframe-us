<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllowIframes
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        // remove the SAMEORIGIN header
        $response->headers->remove('X-Frame-Options');
        return $response;
    }
}
