<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfProdiPi
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'prodi_pi')
	{
	    if (Auth::guard($guard)->check()) {
	        return redirect('prodi-pi/home');
	    }

	    return $next($request);
	}
}