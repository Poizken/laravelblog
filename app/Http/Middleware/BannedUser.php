<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class BannedUser
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
        if (\Auth::check() && \Auth::user()->status == User::IS_BANNED) {
            return redirect()->route('home')->withErrors('You can\'t do this since you\'re banned');
        }
        return $next($request);
    }
}
