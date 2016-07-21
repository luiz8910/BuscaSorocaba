<?php

namespace BuscaSorocaba\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check())
        {
            return redirect('/home');
        }

        if(Auth::user()->role <> $role)
        {
            return redirect('home');
        }

        return $next($request);
    }
}
