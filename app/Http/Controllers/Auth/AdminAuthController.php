<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    /**
     * Tampilkan form login admin.
     */
    public function showLoginForm()
    {
        // Kalau sudah login sebagai admin, langsung lempar ke dashboard
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.home');
        }

        return view('admin-login');
    }

    /**
     * Proses login admin.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        // Coba login pakai kredensial yang diberikan
        if (! Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ]);
        }

        // Login berhasil secara kredensial, tapi cek dulu apakah dia admin
        if (Auth::user()->role !== 'admin') {
            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'Akun ini tidak memiliki akses ke panel admin.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.home'));
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('status', 'Anda berhasil keluar.');
    }
}