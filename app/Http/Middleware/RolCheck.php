<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolCheck
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect()->route('posts.index')->with('error', 'No tienes permisos para acceder aquí.');
        }

        return $next($request);
    }
}
