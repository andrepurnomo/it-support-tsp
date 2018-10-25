<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class notStaff
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
        if (Auth::user()->level == 'staff') {
            return redirect('task')->with('status', 'Staff dilarang akses ke menu tersebut');
        }

        return $next($request);
    }
}
