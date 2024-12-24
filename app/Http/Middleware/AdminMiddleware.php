<?php

namespace App\Http\Middleware;

use Closure;
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
        if (Auth::check()) {
            if (Auth::user()->utype === 1) { // Admin check
                return $next($request);
            } else {
                // Logout unauthorized user
                Auth::logout();
                return redirect()->route('login')->with('error', 'Access denied. Admins only.');
            }
        }

        // Redirect unauthenticated users
        return redirect()->route('login')->with('error', 'Please login to access this page.');
    }
}
