<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Repositories\Exceptions\RoleDoesNotExist;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (!Auth::user()->hasAnyRole($roles)) {
            throw new RoleDoesNotExist();
        }

        return $next($request);
    }
}
