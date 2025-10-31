<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
// Если пользователь не админ — редиректим на главную с ошибкой
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('main')->with('error', 'У вас нет прав для доступа в админ-панель.');
        }

        return $next($request);
    }
}