<?php

namespace App\Http\Middleware;

use Closure;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 2) {
            return redirect()->route('FM');
        }

        if (Auth::user()->role == 1) {
            return redirect()->route('CC');
        }

        if (Auth::user()->role == 3) {
            return $next($request);
        }
    }
}