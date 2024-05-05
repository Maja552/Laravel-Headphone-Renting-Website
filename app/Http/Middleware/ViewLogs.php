<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewLogs
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->hasPermissionTo('logs.index')) {
            return $next($request);
        }

        return redirect()->route('login');
        //abort(401, 'Unauthorised');
    }
}
