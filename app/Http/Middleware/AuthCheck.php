<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        // Проверка, авторизован ли пользователь
        if (!auth()->check()) {
            return redirect('/login'); // Перенаправление на страницу входа, если пользователь не авторизован
        }

        return $next($request);
    }
}
