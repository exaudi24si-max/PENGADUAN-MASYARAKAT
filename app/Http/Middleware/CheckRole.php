<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN role-nya adalah 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, tampilkan error 403
        return abort(403, 'Hanya admin yang dapat mengakses halaman ini.');
    }
}
