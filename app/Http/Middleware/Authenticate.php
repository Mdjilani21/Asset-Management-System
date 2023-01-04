<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson() || auth()->user()->is_admin == 1){
            return route('login');
        }

        // if(auth()->user()->is_admin == 1){
        //     // return route('login');
        //     return $next($request);
        // }
        return redirect('/')->with('error', 'You have no admin access');
    }
}
