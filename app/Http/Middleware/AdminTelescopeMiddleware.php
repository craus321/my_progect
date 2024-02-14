<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminTelescopeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
