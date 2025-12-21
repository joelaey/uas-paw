<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect('/auth/login');
        }

        if (auth()->user()->role !== $role) {
            // Redirect to appropriate dashboard based on actual role
            if (auth()->user()->isAdmin()) {
                return redirect('/admin/dashboard');
            }
            return redirect('/user/dashboard');
        }

        return $next($request);
    }
}
