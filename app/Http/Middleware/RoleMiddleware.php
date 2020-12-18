<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use App\Http\Middleware\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $role)
{
    {
        if ( $request->user()->tieneRol() == '') {
            return redirect('/');
        }
    return $next($request);
    }
}
}