<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Pastikan yang mengakses route ini adalah user dengan role 'admin'.
     * Kalau belum login sama sekali -> lempar ke halaman login admin.
     * Kalau login tapi bukan admin -> logout paksa & tolak akses.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('admin.login');
        }

        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login')
                ->with('status', 'Akun Anda tidak memiliki akses admin.');
        }

        return $next($request);
    }
}