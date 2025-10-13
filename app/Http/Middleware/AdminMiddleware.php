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
        // Redirect non-admin users or guests to the home page or general dashboard
        if (!Auth::check() || Auth::user()->id !== 1) { 
            return redirect('/')->with('error', 'Unauthorized access. You must be the designated Admin to access this area.');
        }

        return $next($request);
    }
}