<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    
    public function handle($request, Closure $next)
    {
        // যদি ইউজার লগইন করা থাকে এবং তার role 'admin' হয়
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // যদি ইউজার লগইন করা থাকে কিন্তু admin না হয়
        if (Auth::check() && Auth::user()->role === 'user') {
            return redirect()->route('user.dashboard');
        }

        // যদি লগইন না করা থাকে
        return redirect()->route('login');
    }
}
