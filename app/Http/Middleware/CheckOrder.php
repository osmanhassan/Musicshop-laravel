<?php

namespace App\Http\Middleware;

use Closure;

class CheckOrder
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
         if(!$request->session()->has('cart'))
        {
            return redirect()->route('dashboard.index');
        }
        return $next($request);
    }
}
