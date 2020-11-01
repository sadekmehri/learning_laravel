<?php

namespace App\Http\Middleware;

use Closure;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->id_permission == 1 && Auth::user()->is_active_user == 1)
            return $next($request);

        return redirect()->route('home.index');
    }
}
