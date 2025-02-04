<?php

namespace Modules\Customer\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotCustomer
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @param  string|null  $guard
    * @return mixed
    */
    public function handle($request, Closure $next, $guard = 'customer')
    {
        if (! Auth::guard($guard)->check()) {
            return redirect()->route('account.login');
        } else {
            if (Auth::guard($guard)->user()->status == 0) {
                Auth::guard($guard)->logout();
                session()->flash('warning', trans('shop::app.customer.login-form.not-activated'));

                return redirect()->route('account.login');
            }
        }

        return $next($request);
    }
}
