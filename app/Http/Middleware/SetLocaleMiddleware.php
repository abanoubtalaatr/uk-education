<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Nova\Nova;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale(config('app.locale'));

        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        if ($request->session()->has('locale')) {
            app()->setLocale($request->session()->get('locale'));
        }
        if (app()->getLocale() == 'ar') {
            Nova::enableRTL();
        }

        return $next($request);
    }
}
