<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->hasRole('siswa')) {
                return redirect(RouteServiceProvider::BERANDA);
            } elseif(Auth::user()->hasRole('perusahaan')) {
                return redirect(RouteServiceProvider::PERUSAHAAN);
            } else {
                return redirect(RouteServiceProvider::ADMIN);
            }
        }

        return $next($request);
    }
}
