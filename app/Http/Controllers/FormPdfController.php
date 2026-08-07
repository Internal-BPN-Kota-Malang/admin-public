<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FormPdfController extends Controller
{
    // Untuk tombol "Isi Online" -> generate PDF TERISI
    public function generateLegalisir(Request $request)
    {
        $validated = $request->validate([
            'nama_pemohon' => 'required|string',
            'tempat_lahir_pemohon' => 'required|string',
            'tanggal_lahir_pemohon' => 'required|date',
            'pekerjaan_pemohon' => 'required|string',
            'alamat_pemohon' => 'required|string',
            'status_bertindak' => 'required|in:diri_sendiri,kuasa',
            'nama_diwakili' => 'nullable|string',
            'tempat_lahir_diwakili' => 'nullable|string',
            'tanggal_lahir_diwakili' => 'nullable|date',
            'pekerjaan_diwakili' => 'nullable|string',
            'alamat_diwakili' => 'nullable|string',
            'jenis_sertipikat' => 'required|string',
            'nomor_sertipikat' => 'required|string',
            'kelurahan' => 'required|string',
            'keperluan' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
        ]);

        $pdf = Pdf::loadView('pdf.legalisir-sertipikat', ['data' => $validated])
                  ->setPaper('a4', 'portrait');

        return $pdf->download('permohonan-legalisir-sertipikat.pdf');
    }

    // Untuk tombol "Unduh Form" -> generate PDF KOSONG
    public function downloadBlank()
    {
        $pdf = Pdf::loadView('pdf.legalisir-sertipikat', ['data' => []])
                  ->setPaper('a4', 'portrait');

        return $pdf->download('form-permohonan-legalisir-sertipikat.pdf');
    }
}