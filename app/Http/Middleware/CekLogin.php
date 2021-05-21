<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::user();
        if ($user->level == $role) {
            return $next($request);
        } else {
            return redirect('/login');
        }
        return redirect('/index')->with('error', 'Anda Tidak Memiliki Wewenang Mengakses Halaman Ini');
        // return $next($request);
    }
}
