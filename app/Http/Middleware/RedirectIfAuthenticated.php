<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::user()->rolse=='admin'){
                    return redirect()->route('dashboad');
                };
                echo "มาหน้านี้เพิ่ม  else if ข้างล่าง' app\Http\Middleware\RedirectIfAuthenticated.php";
                return ;
                // else if(Auth::user()->rolse=="personnel"){
                //     return redirect('หน้าทีต้องการ redurect ไป');
                // }
            }
        }

        return $next($request);
    }
}
