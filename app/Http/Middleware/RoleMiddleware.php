<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Memeriksa role pengguna sebelum mengakses halaman.
     */
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {

        // Pastikan pengguna sudah login
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Periksa kesesuaian role
        if ($request->user()->role !== $role) {
            abort(403, 'Halaman ini khusus untuk ' . $role . '.');
        }

        return $next($request);
    }
}
