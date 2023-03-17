<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAdminIfAuthenticated
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

        if (Auth::check() && Auth::user()->privilege->type === 'admin') {
            // Redirection si pas connecté
            return redirect(route('admin-dashboard'));
        } elseif (Auth::check() && Auth::user()->privilege->type !== 'admin') {
            // Redirection si connecté, mais n'est pas un admin
            return redirect(route('homepage'));
        }

        return $next($request);
    }
}
