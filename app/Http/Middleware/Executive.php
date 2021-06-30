<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Executive
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
        if(auth()->user()->rolse=="executive"){
            return $next($request);
        }
        abort(404);
    }
}
