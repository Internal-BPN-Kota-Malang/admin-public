<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Pengajuan - Admin</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f6fa; color: #222; padding: 40px 20px; }

  .card {
    max-width: 640px;
    margin: 0 auto;
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(20,30,50,0.05);
    padding: 32px;
  }

  .back { font-size: 13px; color: #17b8c4; text-decoration: none; font-weight: 700; display: inline-block; margin-bottom: 20px; }
  .back:hover { text-decoration: underline; }

  h1 { font-size: 20px; color: #1e2a3a; margin-bottom: 24px; }

  .field { margin-bottom: 18px; }
  .field label { display: block; font-size: 13px; font-weight: 600; color: #333; margin-bottom: 6px; }
  .field .required { color: #e24b4a; }

  .field input, .field select, .field textarea {
    width: 100%;
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 11px 13px;
    font-size: 14px;
    font-family: inherit;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  .field input:focus, .field select:focus, .field textarea:focus {
    border-color: #17b8c4;
    box-shadow: 0 0 0 3px rgba(23,184,196,0.12);
  }
  .field textarea { resize: vertical; min-height: 80px; }

  .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

  .form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 26px;
    padding-top: 20px;
    border-top: 1px solid #eef0f3;
  }

  .btn { padding: 12px 24px; border-radius: 8px; font-size: 14px; font-weight: 700; cursor: pointer; border: none; text-decoration: none; display: inline-block; }
  .btn-batal { background: #f0f2f5; color: #444; }
  .btn-batal:hover { background: #e4e7ec; }
  .btn-simpan { background: linear-gradient(90deg, #17b8c4, #2f5a8a); color: #fff; }
  .btn-simpan:hover { filter: brightness(1.06); }

  .alert-error { background: #fcebeb; color: #791f1f; padding: 12px 16px; border-radius: 8px; font-size: 13px; margin-bottom: 20px; }
  .alert-error ul { margin: 6px 0 0 18px; }

  @media (max-width: 600px) { .row-2 { grid-template-columns: 1fr; } }
</style>
</head>
<body>

<div class="card">
  <a href="{{ route('admin') }}" class="back">← Kembali ke Data Pengajuan</a>
  <h1>Tambah Pengajuan Manual</h1>

  @if ($errors->any())
    <div class="alert-error">
      Mohon periksa kembali:
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.pengajuan.store') }}" method="POST">
    @csrf

    <div class="field">
      <label for="nama_pemohon">Nama Pemohon <span class="required">*</span></label>
      <input type="text" id="nama_pemohon" name="nama_pemohon" value="{{ old('nama_pemohon') }}" placeholder="Nama lengkap pemohon" required>
    </div>

    <div class="field">
      <label for="jenis_surat">Jenis Surat <span class="required">*</span></label>
      <select id="jenis_surat" name="jenis_surat" required>
        <option value="" disabled {{ old('jenis_surat') ? '' : 'selected' }}>Pilih jenis surat</option>
        <option value="Surat Kuasa" {{ old('jenis_surat') == 'Surat Kuasa' ? 'selected' : '' }}>Surat Kuasa</option>
        <option value="Surat Pernyataan Keaslian Sertipikat" {{ old('jenis_surat') == 'Surat Pernyataan Keaslian Sertipikat' ? 'selected' : '' }}>Surat Pernyataan Keaslian Sertipikat</option>
        <option value="Surat Pernyataan Pemasangan Tanda Batas" {{ old('jenis_surat') == 'Surat Pernyataan Pemasangan Tanda Batas' ? 'selected' : '' }}>Surat Pernyataan Pemasangan Tanda Batas</option>
        <option value="Surat Pernyataan Pelepasan" {{ old('jenis_surat') == 'Surat Pernyataan Pelepasan' ? 'selected' : '' }}>Surat Pernyataan Pelepasan</option>
        <option value="Surat BPHTB" {{ old('jenis_surat') == 'Surat BPHTB' ? 'selected' : '' }}>Surat BPHTB</option>
        <option value="Surat PPH" {{ old('jenis_surat') == 'Surat PPH' ? 'selected' : '' }}>Surat PPH</option>
        <option value="Formulir Permohonan" {{ old('jenis_surat') == 'Formulir Permohonan' ? 'selected' : '' }}>Formulir Permohonan</option>
        <option value="Formulir PTSL" {{ old('jenis_surat') == 'Formulir PTSL' ? 'selected' : '' }}>Formulir PTSL</option>
      </select>
    </div>

    <div class="row-2">
      <div class="field">
        <label for="status">Status <span class="required">*</span></label>
        <select id="status" name="status" required>
          <option value="menunggu" {{ old('status') == 'menunggu' ? 'selected' : '' }}>Menunggu Verifikasi</option>
          <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
          <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
          <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
      </div>
      <div class="field">
        <label for="tanggal_pengajuan">Tanggal Pengajuan <span class="required">*</span></label>
        <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}" required>
      </div>
    </div>

    <div class="field">
      <label for="keterangan">Keterangan</label>
      <textarea id="keterangan" name="keterangan" placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
    </div>

    <div class="form-actions">
      <a href="{{ route('admin') }}" class="btn btn-batal">Batal</a>
      <button type="submit" class="btn btn-simpan">Simpan Pengajuan</button>
    </div>
  </form>
</div>

</body>
</html>