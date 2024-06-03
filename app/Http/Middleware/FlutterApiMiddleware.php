<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FlutterApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Add your middleware logic here

        // For example, you can check if the request has a specific header
        if (!$request->header('X-Flutter-App')) {
            return response()->json(['error' => 'Invalid request'], 400);
        }

        return $next($request);
    }
}
