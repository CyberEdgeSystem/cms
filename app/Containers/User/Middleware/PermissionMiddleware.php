<?php

namespace App\Containers\User\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permission = null)
    {

        if (!Auth::check() || !Auth::user()->hasPermission($permission)) {
            abort(403, 'Доступ заборонений');
        }

        return $next($request);
    }
}
