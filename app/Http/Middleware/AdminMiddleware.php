<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors([
                'email' => 'You must be an admin to access this page.',
            ]);
        }

        return $next($request);
    }
}
