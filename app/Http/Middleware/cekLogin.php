<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class cekLogin
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
        if ($request->session()->get('lolos',false) === true)
        {
            return $next($request);
        }
        
        return redirect()->route('login');
    }
}
