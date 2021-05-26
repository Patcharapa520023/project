<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Adminer
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
        if(auth()->user()->roles=="admin"){

            return $next($request);
        }

    }
}
