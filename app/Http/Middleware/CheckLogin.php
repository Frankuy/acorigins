<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use DB;

class CheckLogin
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
        if (Cookie::get('user_id') == null) {
            return redirect('/login')->with('status', 'You are not authorized, please login first');
        }
        if (Cookie::get('key') == null) {
            return redirect('/login')->with('status', 'You are not authorized, please login first');
        }

        $user = DB::table('users')
            ->find(Cookie::get('user_id'));

        if (!$user){
            return redirect('/login')->with('status', 'You are not authorized, please login first');
        }

        if (Cookie::get('key') !== $user->username) {
            return redirect('/login')->with('status', 'You are not authorized, please login first');
        }
        
        return $next($request);
    }
}
