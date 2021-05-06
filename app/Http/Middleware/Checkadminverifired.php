<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Checkadminverifired
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

        if (!Auth::guard('adminapi')->user()) {   // Check is admin logged in
            return response()->json(['error' => 'you are not authenticated as admin', 401]);

        }
        return $next($request);
    }
}
