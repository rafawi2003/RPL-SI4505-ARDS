<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // tambahkan ini

class FilamentAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Periksa apakah pengguna sudah masuk dan bukan admin
        if (Auth::check() && Auth::user()->usertype !== 'admin') {
            // Jika bukan admin, arahkan ke halaman login
            return redirect('/login');
        }
    
        return $next($request);
    }
}
