<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SetLanguage
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
        // \App::setlocale($request->locale);

        URL::defaults([
            'locale' => app()->getLocale()
        ]);

        return $next($request);
    }
}