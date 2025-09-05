<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // If role is 'admin' but user is not admin → block
        if ($role === 'admin' && !$user->is_admin) {
            abort(403, 'Unauthorized access.');
        }

        // If role is 'user' but user is admin → block
        if ($role === 'user' && $user->is_admin) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
