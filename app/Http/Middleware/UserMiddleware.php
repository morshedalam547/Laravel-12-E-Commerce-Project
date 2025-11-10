<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        // যদি ইউজার লগইন করা থাকে এবং তার role 'user' হয়
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request);
        }

        // যদি ইউজার লগইন করা থাকে কিন্তু admin হয়
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // যদি লগইন করা না থাকে
        return redirect()->route('login');
    }
}
