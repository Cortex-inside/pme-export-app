<?php

namespace PMEexport\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfEmpresa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if (Auth::user()->hasAnyRole(['empresa', 'empresa_estrangeira']) && !$request->is('sysCompany/complementRegister')) {
//                 return redirect()->route('exchange.index');

                if(!Auth::user()->company) {

                    Auth::logout();

                    return redirect()->route('login');
                }

                if (Auth::user()->company->status == 5 || Auth::user()->company->status == 4) {
                    return redirect(route('sysCompany.complementRegister'));
                }

                return $next($request);
            }
        }
        return $next($request);
    }
}
