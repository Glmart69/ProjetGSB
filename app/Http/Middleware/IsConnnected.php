<?php

namespace App\Http\Middleware;

use Closure;

class IsConnnected
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
        if(Session::get('id') != null)
            return $next($request);
        else
            return redirect('/connexion');
    }
}
