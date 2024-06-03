<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->user() && $request->user()->isAdmin()) {
        //     return $next($request);
        // }

        // abort(403, 'Unauthorized');

        // if (!Auth::check()) {
        //     throw new AuthenticationException('Unauthenticated.');
        // }

        return $next($request);

        // $response = $next($request);

        // $response->header('X-Custom-Header', 'Hello, World!');

        // return $response;
    }
}
