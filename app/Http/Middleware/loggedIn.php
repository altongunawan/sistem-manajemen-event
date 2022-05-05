<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('loginId') && (url('login')==$request->url() || url('register')==$request->url())) {
            return redirect()->back()->with('failed','You must be guest to access login or register');
        }
        return $next($request);
    }
}