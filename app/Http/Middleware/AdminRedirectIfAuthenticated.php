<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfAuthenticated
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
                return redirect(RouteServiceProvider::HOME); // admin.dashboard
            }
        }

        if(Auth::guard('admin')->check()) {
            return redirect('admin/dashboard');
        }


        /**
         * TODO: Make it work
         * middleware that will set the appropriate language for other routes
         */
        // if(session()->has('locale')){
        //     app()->setLocale(session('locale'));
        //     app()->setLocale(config('app.locale'));
        // }

        return $next($request);
    }
}