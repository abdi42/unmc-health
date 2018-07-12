<?php

namespace App\Http\Middleware;

use Closure;

use \App\User;

use Illuminate\Support\Facades\DB;

class AdminMiddleware
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
        //$users = User::all()->pluck('email')->where('email','=','szm.makandar@gmail.com');
        $users = User::all()->first();
        if(!$users->email)
        {
            return redirect('/');
        }

        return $next($request);
    }
}
