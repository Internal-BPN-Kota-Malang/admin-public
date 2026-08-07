<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\FormPdfController;

// ======================
// ROUTE UNTUK USER (tanpa login)
// ======================

Route::get('/', function () {
    return view('user.home');
})->name('user.home');

Route::get('/informasi', function () {
    return view('user.informasi');
})->name('user.informasi');

Route::get('/tentang-kami', function () {
    return view('user.tentang-kami');
})->name('user.tentang-kami');

// Pengajuan
Route::get('/pengajuan', function () {
    return view('user.pengajuan');
})->name('user.pengajuan');

Route::get('/pengajuan/data', function () {
    return view('user.DataPengajuan');
})->name('user.pengajuan.data');

Route::get('/pengajuan/tambah', function () {
    return view('user.TambahPengajuan');
})->name('user.pengajuan.tambah');

// Formulir Permohonan
Route::get('/formulir-permohonan', function () {
    return view('user.formulir-permohonan');
})->name('user.formulir-permohonan');

Route::get('/isi-online/permohonan-legalisir-sertipikat', function () {
    return view('user.onlinePermohon-legalisirsertipikat');
})->name('isi-online.legalisir-sertipikat');
// Route untuk generate PDF
Route::post('/generate-pdf/legalisir-sertipikat', [FormPdfController::class, 'generateLegalisir'])
    ->name('pdf.legalisir.generate');
// PDF kosong (form blank untuk diisi manual)
Route::get('/unduh-form/permohonan-legalisir-sertipikat.pdf', [FormPdfController::class, 'downloadBlank'])
    ->name('form.legalisir.blank');

    
Route::get('/formulir-permohonan/tambah', function () {
    return view('user.TambahFormulir');
})->name('user.formulir-permohonan.tambah');

Route::get('/formulir-ptsl', function () {
    return view('user.formulir-PTSL');
})->name('user.formulir-ptsl');

// Surat-surat
Route::get('/surat-kuasa', function () {
    return view('user.surat-kuasa');
})->name('user.surat-kuasa');

Route::get('/surat-pernyataan', function () {
    return view('user.surat-pernyataan');
})->name('user.surat-pernyataan');


// ======================
// ROUTE UNTUK ADMIN (perlu login)
// ======================

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
    })->name('admin.surat-kuasa');

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