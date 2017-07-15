<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
	    if(!$request->user()->hasRole($role))
	    {

		    Session::flash('invalid_user', 'Sorry. You don\'t have the access to this resource. Please login as a valid user. ');
		    Auth::logout();
		    return redirect('/login');
	    }
        return $next($request);
    }
}
