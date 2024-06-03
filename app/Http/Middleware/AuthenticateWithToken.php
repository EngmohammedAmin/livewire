<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateWithToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard('sanctum')->check()) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthenticated'], 401);
    }

    // protected function authenticate($request, array $guards)
    // {
    //     if ($this->authenticateViaBearerToken($request)) {
    //         return $request;
    //     }

    //     throw new AuthenticationException();
    // }

    // protected function authenticateViaBearerToken($request)
    // {
    //     $token = $request->bearerToken();

    //     if ($token) {
    //         // return true;
    //         return Auth::onceUsingId(Auth::id());
    //     }

    //     return false;
    // }
}