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
        // Simple check: Assumes the user with ID 1 is the Admin
        // This stops non-admin users from accessing the /admin routes
        if (!Auth::check() || Auth::user()->id !== 1) { 
            return redirect('/dashboard')->with('error', 'Unauthorized access. Only user ID 1 is permitted.');
        }

        return $next($request);
    }
}
