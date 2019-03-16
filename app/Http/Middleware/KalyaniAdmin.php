<?php

namespace App\Http\Middleware;

use Closure;

class KalyaniAdmin
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
	    if (   ($request->user()) 
		&& ($request->user()->id == 2) 
	        && !($request->is('fees/*') || $request->is('dashboard') || $request->is('fees')  || $request->path() == '/' || $request->is('logout'))	
	       )
	    {
		      abort(403, 'Access denied');
	    }

	    return $next($request);

    }
}
