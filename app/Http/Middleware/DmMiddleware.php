<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DmMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->role_id=='2') {
                return $next($request);
            }else {
            alert()->error('Access Denied','Halaman ini hanya tersedia khusus untuk Decision Maker');
                return back();
            }

        } else {
            return redirect('login');
        }
        return $next($request);
    }
}
