<?php

namespace App\Http\Middleware;

use Closure;

class cekReset
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
        if ($request->session()->get('email',false) === true)
        {
            return $next($request);
        }

        return redirect('show_forget');
    }
}
