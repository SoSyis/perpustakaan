<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil role user yang sedang login
        $userRole = Auth::user()->role;

        // Cek apakah role user termasuk dalam role yang diizinkan
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika role tidak cocok
        abort(403, 'Akses ditolak.',);
    }
}
