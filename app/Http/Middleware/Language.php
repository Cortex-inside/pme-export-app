<?php

namespace PMEexport\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
        } else {
            session()->put('locale', config('app.locale'));
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
