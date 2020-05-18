<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;

class Admin
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
        if (Auth::check() && Auth::user()->is_admin == User::IS_ADMIN) {
            return $next($request);
        }
        abort(404);
    }
}
