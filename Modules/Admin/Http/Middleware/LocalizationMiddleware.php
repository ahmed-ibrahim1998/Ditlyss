<?php

namespace Modules\Admin\Http\Middleware;

use Closure;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session()->has('app-locale') and array_key_exists(Session()->get('app-locale'), config('admin.languages'))) {
            app()->setLocale(Session()->get('app-locale'));
        } else {
            session()->put('app-locale', app()->getLocale());
        }

        return $next($request);
    }
}
