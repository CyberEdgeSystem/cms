<?php

namespace App\Containers\User\Middleware;

use App\Containers\User\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next,  string ...$roles)
    {

        if (empty($roles)) {
            abort(500, 'Роль не вказана у middleware');
        }

        if (!Auth::check() || !Auth::user()->hasAnyRole($roles)) {
            abort(403, 'Доступ заборонений');
        }


        return $next($request);
    }
}





