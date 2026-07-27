<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/', function () {
    return redirect('/admin/login');
})->name('home');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.attempt');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('admin')->group(function () {

    Route::get('/admin', function () {
        return view('admin-home');
    })->name('admin.home');

    Route::get('/admin/pengajuan', function () {
        return view('admin-pengajuan');
    })->name('admin.pengajuan');

    Route::get('/admin/permohonan', function () {
        return view('admin-formulir-permohonan');
    })->name('admin.permohonan');

    Route::get('/admin/ptsl', function () {
        return view('admin-ptsl');
    })->name('admin.ptsl');

    Route::get('/admin/surat-pernyataan', function () {
        return view('admin-surat-pernyataan');
    })->name('admin.surat-pernyataan');

    Route::get('/admin/surat-kuasa', function () {
        return view('admin-surat-kuasa');
    });

    Route::get('/admin/surat-pernyataan-keaslian-sertipikat', function () {
        return view('admin-surat-pernyataan-keaslian-sertipikat');
    });

    Route::get('/admin/surat-pernyataan-pemasangan-tanda-batas', function () {
        return view('admin-surat-pernyataan-pemasangan-tanda-batas');
    });

    Route::get('/admin/surat-pernyataan-pelepasan', function () {
        return view('admin-surat-pernyataan-pelepasan');
    });

    Route::get('/admin/surat-pernyataan-penguasaan-fisik-perpanjangan', function () {
        return view('admin-surat-pernyataan-penguasaan-fisik-perpanjangan');
    });

    Route::get('/admin/surat-pernyataan-penguasaan-fisik-hak-pertama', function () {
        return view('admin-surat-pernyataan-penguasaan-fisik-hak-pertama');
    });

    Route::get('/admin/surat-bphtb', function () {
        return view('admin-surat-bphtb');
    });

    Route::get('/admin/surat-pph', function () {
        return view('admin-surat-pph');
    });

    Route::get('/admin/informasi', function () {
        return view('admin-informasi');
    });

    Route::get('/admin/pengguna', function () {
        return view('admin-pengguna');
    });

});

require __DIR__.'/settings.php';