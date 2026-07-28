<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $mode === 'tambah' ? 'Tambah' : 'Edit' }} Formulir - Admin</title>
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
  .field small { display: block; margin-top: 4px; color: #9aa4af; font-size: 12px; }

  .field-checkbox { display: flex; align-items: center; gap: 8px; }
  .field-checkbox input { width: auto; }
  .field-checkbox label { margin-bottom: 0; }

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
  <a href="{{ route('admin.formulir') }}" class="back">← Kembali ke Data Formulir</a>
  <h1>{{ $mode === 'tambah' ? 'Tambah Formulir Baru' : 'Edit Formulir' }}</h1>

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

  <form action="{{ $mode === 'tambah' ? route('admin.formulir.store') : route('admin.formulir.update', $formulir) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($mode === 'edit')
      @method('PUT')
    @endif

    <div class="field">
      <label for="nama">Nama Formulir <span class="required">*</span></label>
      <input type="text" id="nama" name="nama" value="{{ old('nama', $formulir->nama) }}" placeholder="Contoh: Surat Kuasa" required>
    </div>

    <div class="row-2">
      <div class="field">
        <label for="kategori">Kategori <span class="required">*</span></label>
        <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $formulir->kategori) }}" placeholder="Contoh: Umum, Pajak, Sertipikat" required>
      </div>
      <div class="field">
        <label for="icon">Ikon (emoji)</label>
        <input type="text" id="icon" name="icon" value="{{ old('icon', $formulir->icon ?? '📄') }}" placeholder="📄" maxlength="10">
      </div>
    </div>

    <div class="field">
      <label for="deskripsi">Deskripsi Singkat</label>
      <textarea id="deskripsi" name="deskripsi" placeholder="Penjelasan singkat formulir ini">{{ old('deskripsi', $formulir->deskripsi) }}</textarea>
    </div>

    <div class="field">
      <label for="link_isi_online">Link "Isi Online"</label>
      <input type="text" id="link_isi_online" name="link_isi_online" value="{{ old('link_isi_online', $formulir->link_isi_online) }}" placeholder="/surat-kuasa/ajukan">
      <small>Alamat halaman form isi online untuk formulir ini (kosongkan kalau belum ada).</small>
    </div>

    <div class="field">
      <label for="file_kosong">File PDF Kosong</label>
      <input type="file" id="file_kosong" name="file_kosong" accept="application/pdf">
      @if ($mode === 'edit' && $formulir->file_kosong)
        <small>
          File saat ini:
          <a href="{{ asset('storage/' . $formulir->file_kosong) }}" target="_blank">{{ basename($formulir->file_kosong) }}</a>
          — upload file baru untuk menggantinya, atau biarkan kosong kalau tidak ingin diubah.
        </small>
      @else
        <small>Upload file PDF form kosong (maks 5MB).</small>
      @endif
    </div>

    <div class="field field-checkbox">
      <input type="checkbox" id="aktif" name="aktif" value="1" {{ old('aktif', $formulir->aktif ?? true) ? 'checked' : '' }}>
      <label for="aktif">Aktif (tampilkan di situs publik)</label>
    </div>

    <div class="form-actions">
      <a href="{{ route('admin.formulir') }}" class="btn btn-batal">Batal</a>
      <button type="submit" class="btn btn-simpan">{{ $mode === 'tambah' ? 'Simpan Formulir' : 'Simpan Perubahan' }}</button>
    </div>
  </form>
</div>

</body>
</html>