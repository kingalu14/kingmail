<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizedSuperAdmin
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
        $isAuthorized = false;
        if (auth()->check()) {
            if (Auth::user()->role['slug'] === 'admin' || Auth::user()->role['slug'] === 'super_user') {
                $isAuthorized = true;
            }
        }

        if (!$isAuthorized) {
            return redirect('/');
        }
        return $next($request);
    }
}
