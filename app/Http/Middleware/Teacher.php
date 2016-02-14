<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Redirect;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->level() > 1) { // you can pass an id or slug
            return $next($request);
        } else {
            return Redirect::route('login.create');
        }


    }
}
