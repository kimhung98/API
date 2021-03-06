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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->role == 'admin' || $user->role == 'employee')
                return $next($request);
            else
                return redirect()->route('home');
        }
        else {
            return redirect()->route('user.login');
        }
    }
}
