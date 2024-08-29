<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is logged in by verifying the 'email' session key
        if (session('email') != null) {
            $userRole = session('role');

            // Allow if user role matches any of the allowed roles or is an admin
            if (in_array($userRole, $roles) || $userRole === 'admin') {
                return $next($request);
            }

            return redirect()->back()->with('error', "You don't have access to this page.");
        }

        return redirect('/admin/login');
    }
}
