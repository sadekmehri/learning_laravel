<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Debugbar;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard)
        {
            if(Auth::guard($guard)->check() && Auth::user()->is_active_user == 1)
            {
                switch (Auth::user()->id_permission)
                {
                    case 1: return redirect()->route('admin.index');break;
                    case 2: return redirect()->route('user.index');break;
                    default: return redirect()->route('home.index'); break;
                }
            }
        }
        return $next($request);
    }
}
