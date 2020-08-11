<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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

        $destinations = [
            2 => 'moderator',
            3 => 'home',
        ];

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role != 1) {
            return redirect()->route($destinations[Auth::user()->role]);
        }

        return $next($request);
    }
}
