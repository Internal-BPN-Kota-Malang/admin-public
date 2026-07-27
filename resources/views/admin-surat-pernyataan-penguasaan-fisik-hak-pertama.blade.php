<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Penguasaan Fisik (Hak Pertama) - Admin</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f5f6fa;
    color: #222;
  }

  .layout { display: flex; min-height: 100vh; }

  /* ===== SIDEBAR (disamakan dengan admin-home) ===== */
  .sidebar {
  width: 250px;
  flex-shrink: 0;
  background: #1e3a5f;
  color: #fff;
  display: flex;
  flex-direction: column;
  position: sticky;
  top: 0;
  height: 100vh;
  overflow: hidden;
  white-space: nowrap;
  transition: width 0.28s ease, padding 0.28s ease;
  z-index: 200;
}

.sidebar.collapsed {
  width: 0;
  padding: 0;
  border: none;
}
  .sidebar-brand {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 22px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.12);
  }

  .sidebar-brand img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
    background: #fdf6ee;
  }

  .sidebar-brand span { font-size: 15px; font-weight: 700; line-height: 1.3; }
  .sidebar-nav {
  list-style: none;
  padding: 16px 12px;
  flex: 1;
  overflow-y: auto;
  overflow-x: hidden;
}
  .sidebar-section-title {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    color: #9fb2c9;
    padding: 14px 12px 6px;
  }

  .sidebar-nav a {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #dbe5f2;
    text-decoration: none;
    padding: 11px 12px;
    border-radius: 8px;
    font-size: 14px;
    margin-bottom: 2px;
    transition: background 0.2s, color 0.2s;
  }

  .sidebar-nav a .icon { width: 20px; text-align: center; font-size: 16px; }
  .sidebar-nav a:hover { background: rgba(255,255,255,0.08); color: #fff; }
  .sidebar-nav a.active { background: #17b8c4; color: #06282b; font-weight: 700; }

  .sidebar-footer {
    padding: 16px 20px;
    border-top: 1px solid rgba(255,255,255,0.12);
    font-size: 12px;
    color: #9fb2c9;
  }

  /* ===== MAIN AREA ===== */
  .main { flex: 1; min-width: 0; display: flex; flex-direction: column; }

  .topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 16px 28px;
    border-bottom: 1px solid #eaecef;
    position: sticky;
    top: 0;
    z-index: 100;
  }

  .topbar-left { display: flex; align-items: center; gap: 14px; }

 .hamburger-btn {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 4px;
  width: 38px;
  height: 38px;
  background: #f5f6fa;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  padding: 0 9px;
  flex-shrink: 0;
  transition: background 0.2s;
}
.hamburger-btn:hover { background: #eaf0f8; }
.hamburger-btn span {
  width: 20px;
  height: 2.5px;
  background: #1e3a5f;
  border-radius: 2px;
}
  .hamburger-btn span { width: 22px; height: 3px; background: #1e3a5f; border-radius: 2px; }

  .topbar-title { font-size: 18px; font-weight: 700; color: #1e2a3a; }
  .topbar-title .subtitle { display: block; font-size: 12px; font-weight: 400; color: #7a8896; margin-top: 2px; }

  .admin-profile { display: flex; align-items: center; gap: 10px; }
  .admin-profile img { width: 38px; height: 38px; border-radius: 50%; object-fit: cover; background: #eaf0f8; }
  .admin-profile .name { font-size: 13px; font-weight: 700; color: #1e2a3a; line-height: 1.3; }
  .admin-profile .role { font-size: 11px; color: #7a8896; }

  .content { padding: 28px; }

  .breadcrumb {
    font-size: 13px;
    color: #7a8896;
    margin-bottom: 18px;
  }
  .breadcrumb a { color: #17b8c4; text-decoration: none; font-weight: 600; }
  .breadcrumb a:hover { text-decoration: underline; }

  /* ===== PANEL ===== */
  .panel {
    background: #fff;
    border-radius: 14px;
    border: 1px solid #eef0f3;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    overflow: hidden;
  }

  .panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    padding: 18px 22px;
    border-bottom: 1px solid #f0f2f5;
  }

  .panel-header h2 { font-size: 17px; color: #1e2a3a; }
  .panel-header .subtitle { font-size: 12px; color: #7a8896; margin-top: 2px; }

  .panel-header-actions { display: flex; align-items: center; gap: 10px; }

  .search-box { position: relative; }
  .search-box::before {
    content: '';
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    width: 12px;
    height: 12px;
    border: 2px solid #9aa4af;
    border-radius: 50%;
  }
  .search-box input {
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 9px 12px 9px 32px;
    font-size: 13px;
    outline: none;
    width: 220px;
  }
  .search-box input:focus { border-color: #17b8c4; }

  .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #17b8c4;
    color: #fff;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s;
    white-space: nowrap;
  }
  .btn-primary:hover { background: #129aa5; }

  table { width: 100%; border-collapse: collapse; }

  thead th {
    text-align: left;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    color: #7a8896;
    background: #f8fafc;
    padding: 12px 22px;
    white-space: nowrap;
  }

  tbody td {
    padding: 14px 22px;
    font-size: 13.5px;
    color: #333;
    border-top: 1px solid #f0f2f5;
    vertical-align: middle;
  }

  tbody tr:hover { background: #fafbfc; }

  .doc-name { font-weight: 700; color: #1e2a3a; }

  .doc-link {
    color: #5b2a99;
    font-size: 12.5px;
    word-break: break-all;
  }

  .badge-kategori {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    color: #5b2a99;
    background: #f6efff;
    padding: 4px 10px;
    border-radius: 20px;
  }

  .action-buttons { display: flex; gap: 8px; }

  .btn-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: 1px solid #e2e6eb;
    background: #fff;
    cursor: pointer;
    font-size: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s, border-color 0.2s;
  }

  .btn-icon.edit:hover { background: #eaf0f8; border-color: #2f5a8a; }
  .btn-icon.delete:hover { background: #fde9e9; border-color: #d63b3b; }

  .table-empty { padding: 40px 22px; text-align: center; color: #888; font-size: 14px; }

  /* ===== MODAL ===== */
  .modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(10,14,20,0.5);
    align-items: center;
    justify-content: center;
    z-index: 500;
    padding: 20px;
  }
  .modal-overlay.show { display: flex; }

  .modal-box {
    background: #fff;
    border-radius: 16px;
    width: 100%;
    max-width: 440px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    overflow: hidden;
    max-height: 90vh;
    overflow-y: auto;
  }

  .modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 22px;
    border-bottom: 1px solid #f0f2f5;
  }

  .modal-header h3 { font-size: 16px; color: #1e2a3a; }

  .modal-close {
    background: none;
    border: none;
    font-size: 18px;
    color: #888;
    cursor: pointer;
    line-height: 1;
  }

  .modal-body { padding: 22px; }

  .form-group { margin-bottom: 16px; }

  .form-group label {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: #1e2a3a;
    margin-bottom: 6px;
  }

  .form-group input,
  .form-group select {
    width: 100%;
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 10px 12px;
    font-size: 13.5px;
    outline: none;
    font-family: inherit;
  }

  .form-group input:focus,
  .form-group select:focus { border-color: #17b8c4; }

  .form-hint { font-size: 11.5px; color: #7a8896; margin-top: 4px; }

  .modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    padding: 16px 22px;
    border-top: 1px solid #f0f2f5;
  }

  .btn-secondary {
    background: #f1f3f6;
    color: #444;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
  }
  .btn-secondary:hover { background: #e6e9ed; }

  .toast {
    position: fixed;
    bottom: 24px;
    right: 24px;
    background: #1e2a3a;
    color: #fff;
    padding: 12px 20px;
    border-radius: 10px;
    font-size: 13.5px;
    box-shadow: 0 10px 24px rgba(0,0,0,0.2);
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.25s, transform 0.25s;
    z-index: 600;
  }
  .toast.show { opacity: 1; transform: translateY(0); }

  .sidebar-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.4);
    z-index: 150;
  }

  /* ===== UPLOAD FILE ===== */
  .file-upload-box {
    border: 1.5px dashed #d8dde3;
    border-radius: 8px;
    padding: 16px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
  }
  .file-upload-box:hover { border-color: #17b8c4; background: #f6feff; }
  .file-upload-box.has-file { border-style: solid; border-color: #17b8c4; background: #f6feff; }

  .file-upload-box .upload-icon { font-size: 22px; margin-bottom: 6px; }
  .file-upload-box .upload-text { font-size: 12.5px; color: #7a8896; }
  .file-upload-box .upload-filename { font-size: 13px; font-weight: 700; color: #1e2a3a; word-break: break-all; }

  .file-upload-box input[type="file"] { display: none; }

  .btn-hapus-file {
    display: inline-block;
    margin-top: 8px;
    font-size: 11.5px;
    color: #d63b3b;
    text-decoration: underline;
    cursor: pointer;
    background: none;
    border: none;
  }

  @media (max-width: 960px) {
    .sidebar { position: fixed; left: 0; top: 0; transform: translateX(-100%); }
    .sidebar.show { transform: translateX(0); }
    .sidebar-overlay.show { display: block; }
    .hamburger-btn { display: flex; }
    .admin-profile .name, .admin-profile .role { display: none; }
  }

  @media (max-width: 700px) {
    .content { padding: 18px; }
    .panel-header { flex-direction: column; align-items: stretch; }
    .panel-header-actions { flex-direction: column; align-items: stretch; }
    .search-box input { width: 100%; }
    thead { display: none; }
    table, tbody, tr, td { display: block; width: 100%; }
    tbody tr { border: 1px solid #eef0f3; border-radius: 10px; margin-bottom: 12px; padding: 8px 0; }
    tbody td {
      border-top: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      padding: 8px 16px;
    }
    tbody td::before {
      content: attr(data-label);
      font-weight: 700;
      color: #7a8896;
      font-size: 11px;
      text-transform: uppercase;
      flex-shrink: 0;
    }
  }
</style>
</head>
<body>

<div class="layout">
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <img src="{{ asset('images/logo.png') }}" alt="Logo Kantor Pertanahan">
      <span>Kantor Pertanahan<br>Admin</span>
    </div>

    <ul class="sidebar-nav">
      <li><a href="{{ url('/admin') }}"><span class="icon">🏠</span> Dashboard</a></li>

      <div class="sidebar-section-title">Pengajuan Masuk</div>
      <li><a href="{{ url('/admin/pengajuan') }}"><span class="icon">📥</span> Semua Pengajuan</a></li>

      <div class="sidebar-section-title">Formulir Utama</div>
      <li><a href="{{ url('/admin/permohonan') }}"><span class="icon">📑</span> Formulir Permohonan</a></li>
      <li><a href="{{ url('/admin/ptsl') }}"><span class="icon">🗺️</span> Formulir PTSL</a></li>

      <div class="sidebar-section-title">Surat Pernyataan</div>
      <li><a href="{{ url('/admin/surat-pernyataan') }}"><span class="icon">📚</span>Surat Pernyataan</a></li>
      <li><a href="{{ url('/admin/surat-kuasa') }}"><span class="icon">📝</span> Surat Kuasa</a></li>
      <li><a href="{{ url('/admin/surat-pernyataan-keaslian-sertipikat') }}"><span class="icon">📄</span> Keaslian Sertipikat</a></li>
      <li><a href="{{ url('/admin/surat-pernyataan-pemasangan-tanda-batas') }}"><span class="icon">📐</span> Pemasangan Tanda Batas</a></li>
      <li><a href="{{ url('/admin/surat-pernyataan-pelepasan') }}"><span class="icon">📋</span> Pelepasan</a></li>
      <li><a href="{{ url('/admin/surat-pernyataan-penguasaan-fisik-perpanjangan') }}"><span class="icon">🏠</span> Penguasaan Fisik (Perpanjangan)</a></li>
      <li><a href="{{ url('/admin/surat-pernyataan-penguasaan-fisik-hak-pertama') }}" class="active"><span class="icon">🏡</span> Penguasaan Fisik (Hak Pertama)</a></li>

      <div class="sidebar-section-title">Pajak</div>
      <li><a href="{{ url('/admin/surat-bphtb') }}"><span class="icon">💰</span> Surat BPHTB</a></li>
      <li><a href="{{ url('/admin/surat-pph') }}"><span class="icon">🧾</span> Surat PPH</a></li>

      <div class="sidebar-section-title">Konten</div>
      <li><a href="{{ url('/admin/informasi') }}"><span class="icon">ℹ️</span> Informasi</a></li>
      <li><a href="{{ url('/admin/pengguna') }}"><span class="icon">👥</span> Pengguna</a></li>

      <div class="sidebar-section-title">Akun</div>
      <li><a href="{{ url('/settings/profile') }}"><span class="icon">⚙️</span> Pengaturan</a></li>
      <li><a href="{{ url('/logout') }}"><span class="icon">🚪</span> Keluar</a></li>
    </ul>

    <div class="sidebar-footer">&copy; {{ date('Y') }} Kantor Pertanahan</div>
  </aside>

  <div class="main">
    <header class="topbar">
      <div class="topbar-left">
        <button class="hamburger-btn" id="hamburgerBtn"><span></span><span></span><span></span></button>
        <div class="topbar-title">
          Kelola Penguasaan Fisik untuk Pemberian Hak Pertama Kali
          <span class="subtitle">Tambah, ubah, atau hapus entri dokumen</span>
        </div>
      </div>
      <div class="admin-profile">
        <img src="{{ asset('images/admin.png') }}" alt="Admin">
        <div>
          <div class="name">{{ auth()->user()->name ?? 'Admin' }}</div>
          <div class="role">Administrator</div>
        </div>
      </div>
    </header>

    <main class="content">
      <div class="breadcrumb"><a href="{{ url('/admin') }}">Dashboard</a> &nbsp;/&nbsp; Penguasaan Fisik (Hak Pertama)</div>

      <div class="panel">
        <div class="panel-header">
          <div>
            <h2>Entri Dokumen</h2>
            <div class="subtitle">Daftar Surat Pernyataan Penguasaan Fisik untuk Pemberian Hak Pertama Kali</div>
          </div>
          <div class="panel-header-actions">
            <div class="search-box">
              <input type="text" id="cariDokumen" placeholder="Cari dokumen...">
            </div>
            <button type="button" class="btn-primary" id="btnTambah">+ Tambah Dokumen</button>
          </div>
        </div>

        <table>
          <thead>
            <tr>
              <th style="width:40px;">No</th>
              <th>Nama Dokumen</th>
              <th>Kategori</th>
              <th>Link / File</th>
              <th style="width:100px;">Aksi</th>
            </tr>
          </thead>
          <tbody id="tabelDokumen"></tbody>
        </table>

        <div class="table-empty" id="tableEmpty" style="display:none;">Belum ada dokumen. Klik "Tambah Dokumen" untuk menambahkan.</div>
      </div>
    </main>
  </div>
</div>

<!-- ===== MODAL TAMBAH / EDIT ===== -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">
    <div class="modal-header">
      <h3 id="modalTitle">Tambah Dokumen</h3>
      <button type="button" class="modal-close" id="modalClose">&times;</button>
    </div>
    <div class="modal-body">
      <form id="formDokumen">
        <input type="hidden" id="dokumenId">
        <div class="form-group">
          <label for="namaDokumen">Nama Dokumen</label>
          <input type="text" id="namaDokumen" placeholder="Contoh: Surat Pernyataan Penguasaan Fisik untuk Hak Pertama Kali" required>
        </div>
        <div class="form-group">
          <label for="kategoriDokumen">Kategori</label>
          <select id="kategoriDokumen" required>
            <option value="Hak Baru">Hak Baru</option>
            <option value="Umum">Umum</option>
            <option value="Sertipikat">Sertipikat</option>
            <option value="Batas Tanah">Batas Tanah</option>
            <option value="Hak Tanah">Hak Tanah</option>
            <option value="Perpanjangan Hak">Perpanjangan Hak</option>
            <option value="Pajak">Pajak</option>
            <option value="Pendaftaran Tanah">Pendaftaran Tanah</option>
            <option value="__lainnya__">+ Lainnya...</option>
          </select>
        </div>
        <div class="form-group" id="kategoriLainnyaWrap" style="display:none;">
          <label for="kategoriLainnya">Nama Kategori Baru</label>
          <input type="text" id="kategoriLainnya" placeholder="Ketik nama kategori baru">
        </div>
        <div class="form-group">
          <label>Dokumen</label>
          <div class="file-upload-box" id="fileUploadBox">
            <input type="file" id="fileDokumen" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            <div id="fileUploadPlaceholder">
              <div class="upload-icon">📤</div>
              <div class="upload-text">Klik untuk pilih file dari penyimpanan<br>(PDF, DOC, DOCX, JPG, PNG)</div>
            </div>
            <div id="fileUploadSelected" style="display:none;">
              <div class="upload-icon">📄</div>
              <div class="upload-filename" id="fileUploadFilename"></div>
              <button type="button" class="btn-hapus-file" id="btnHapusFile">Hapus file, pilih ulang</button>
            </div>
          </div>
          <div class="form-hint">Ukuran maksimal 5MB. File akan disimpan di server.</div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn-secondary" id="btnBatal">Batal</button>
      <button type="button" class="btn-primary" id="btnSimpan">Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
  /*
    Data dummy sementara, belum tersambung database.
    Nanti diganti dengan data dari Controller, dan fungsi
    tambah/edit/hapus disambungkan ke route store/update/destroy.
  */
  let dokumenList = [
    { id: 1, nama: 'Surat Pernyataan Penguasaan Fisik untuk Pemberian Hak Pertama Kali', kategori: 'Hak Baru', link: '/forms/surat-pernyataan-penguasaan-fisik-hak-pertama.pdf' },
    { id: 2, nama: 'Contoh Surat Pernyataan Penguasaan Fisik (Hak Pertama) Terisi', kategori: 'Hak Baru', link: '/forms/contoh-penguasaan-fisik-hak-pertama.pdf' },
  ];
  let nextId = dokumenList.length + 1;

  const tabelDokumen = document.getElementById('tabelDokumen');
  const tableEmpty = document.getElementById('tableEmpty');
  const cariDokumen = document.getElementById('cariDokumen');

  function renderTabel(keyword = '') {
    const filtered = dokumenList.filter(d => d.nama.toLowerCase().includes(keyword.toLowerCase()));
    tabelDokumen.innerHTML = '';

    if (filtered.length === 0) {
      tableEmpty.style.display = 'block';
      return;
    }
    tableEmpty.style.display = 'none';

    filtered.forEach((d, index) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td data-label="No">${index + 1}</td>
        <td data-label="Nama Dokumen" class="doc-name">${d.nama}</td>
        <td data-label="Kategori"><span class="badge-kategori">${d.kategori}</span></td>
        <td data-label="Link" class="doc-link">${d.link || '-'}</td>
        <td data-label="Aksi">
          <div class="action-buttons">
            <button type="button" class="btn-icon edit" data-id="${d.id}" title="Edit">✏️</button>
            <button type="button" class="btn-icon delete" data-id="${d.id}" title="Hapus">🗑️</button>
          </div>
        </td>
      `;
      tabelDokumen.appendChild(tr);
    });
  }

  cariDokumen.addEventListener('input', () => renderTabel(cariDokumen.value));

  // ===== MODAL =====
  const modalOverlay = document.getElementById('modalOverlay');
  const modalTitle = document.getElementById('modalTitle');
  const dokumenIdInput = document.getElementById('dokumenId');
  const namaDokumenInput = document.getElementById('namaDokumen');
  const kategoriDokumenInput = document.getElementById('kategoriDokumen');
  const kategoriLainnyaWrap = document.getElementById('kategoriLainnyaWrap');
  const kategoriLainnyaInput = document.getElementById('kategoriLainnya');
  const fileUploadBox = document.getElementById('fileUploadBox');
  const fileDokumenInput = document.getElementById('fileDokumen');
  const fileUploadPlaceholder = document.getElementById('fileUploadPlaceholder');
  const fileUploadSelected = document.getElementById('fileUploadSelected');
  const fileUploadFilename = document.getElementById('fileUploadFilename');
  const btnHapusFile = document.getElementById('btnHapusFile');

  let fileTerpilih = null;
  let namaFileLama = '';

  const kategoriBawaan = ['Hak Baru', 'Umum', 'Sertipikat', 'Batas Tanah', 'Hak Tanah', 'Perpanjangan Hak', 'Pajak', 'Pendaftaran Tanah'];

  kategoriDokumenInput.addEventListener('change', () => {
    const isLainnya = kategoriDokumenInput.value === '__lainnya__';
    kategoriLainnyaWrap.style.display = isLainnya ? 'block' : 'none';
    if (isLainnya) kategoriLainnyaInput.focus();
  });

  function resetFileUploadBox() {
    fileTerpilih = null;
    namaFileLama = '';
    fileDokumenInput.value = '';
    fileUploadBox.classList.remove('has-file');
    fileUploadPlaceholder.style.display = 'block';
    fileUploadSelected.style.display = 'none';
  }

  function tampilkanFileTerpilih(namaFile) {
    fileUploadBox.classList.add('has-file');
    fileUploadPlaceholder.style.display = 'none';
    fileUploadSelected.style.display = 'block';
    fileUploadFilename.textContent = namaFile;
  }

  fileUploadBox.addEventListener('click', (e) => {
    if (e.target === btnHapusFile) return;
    if (fileUploadSelected.style.display === 'block') return;
    fileDokumenInput.click();
  });

  fileDokumenInput.addEventListener('change', () => {
    const file = fileDokumenInput.files[0];
    if (!file) return;
    fileTerpilih = file;
    tampilkanFileTerpilih(file.name);
  });

  btnHapusFile.addEventListener('click', (e) => {
    e.stopPropagation();
    resetFileUploadBox();
  });

  function bukaModalTambah() {
    modalTitle.textContent = 'Tambah Dokumen';
    dokumenIdInput.value = '';
    namaDokumenInput.value = '';
    kategoriDokumenInput.value = 'Hak Baru';
    kategoriLainnyaWrap.style.display = 'none';
    kategoriLainnyaInput.value = '';
    resetFileUploadBox();
    modalOverlay.classList.add('show');
    namaDokumenInput.focus();
  }

  function bukaModalEdit(id) {
    const item = dokumenList.find(d => d.id === id);
    if (!item) return;
    modalTitle.textContent = 'Edit Dokumen';
    dokumenIdInput.value = item.id;
    namaDokumenInput.value = item.nama;

    if (kategoriBawaan.includes(item.kategori)) {
      kategoriDokumenInput.value = item.kategori;
      kategoriLainnyaWrap.style.display = 'none';
      kategoriLainnyaInput.value = '';
    } else {
      kategoriDokumenInput.value = '__lainnya__';
      kategoriLainnyaWrap.style.display = 'block';
      kategoriLainnyaInput.value = item.kategori;
    }

    resetFileUploadBox();
    if (item.link) {
      namaFileLama = item.link;
      tampilkanFileTerpilih(item.link + ' (file tersimpan, klik "Hapus file" untuk ganti)');
    }

    modalOverlay.classList.add('show');
    namaDokumenInput.focus();
  }

  function tutupModal() {
    modalOverlay.classList.remove('show');
  }

  document.getElementById('btnTambah').addEventListener('click', bukaModalTambah);
  document.getElementById('btnBatal').addEventListener('click', tutupModal);
  document.getElementById('modalClose').addEventListener('click', tutupModal);
  modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) tutupModal();
  });

  document.getElementById('btnSimpan').addEventListener('click', () => {
    const nama = namaDokumenInput.value.trim();
    if (!nama) {
      namaDokumenInput.focus();
      return;
    }

    let kategori = kategoriDokumenInput.value;
    if (kategori === '__lainnya__') {
      kategori = kategoriLainnyaInput.value.trim();
      if (!kategori) {
        kategoriLainnyaInput.focus();
        return;
      }
    }

    let link = namaFileLama;
    if (fileTerpilih) {
      link = fileTerpilih.name;
    }

    const id = dokumenIdInput.value;

    if (id) {
      const item = dokumenList.find(d => d.id === Number(id));
      item.nama = nama;
      item.kategori = kategori;
      item.link = link;
      showToast('Dokumen berhasil diperbarui.');
    } else {
      dokumenList.push({ id: nextId++, nama, kategori, link });
      showToast('Dokumen berhasil ditambahkan.');
    }

    tutupModal();
    renderTabel(cariDokumen.value);
  });

  tabelDokumen.addEventListener('click', (e) => {
    const editBtn = e.target.closest('.btn-icon.edit');
    const deleteBtn = e.target.closest('.btn-icon.delete');

    if (editBtn) {
      bukaModalEdit(Number(editBtn.dataset.id));
    }

    if (deleteBtn) {
      const id = Number(deleteBtn.dataset.id);
      const item = dokumenList.find(d => d.id === id);
      if (item && confirm(`Hapus dokumen "${item.nama}"?`)) {
        dokumenList = dokumenList.filter(d => d.id !== id);
        renderTabel(cariDokumen.value);
        showToast('Dokumen berhasil dihapus.');
      }
    }
  });

  // ===== TOAST =====
  let toastTimeout;
  function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
    clearTimeout(toastTimeout);
    toastTimeout = setTimeout(() => toast.classList.remove('show'), 2500);
  }

  // ===== SIDEBAR MOBILE =====
 const sidebar = document.getElementById('sidebar');
const hamburgerBtn = document.getElementById('hamburgerBtn');

if (window.innerWidth <= 768) {
  sidebar.classList.add('collapsed');
}

hamburgerBtn.addEventListener('click', () => {
  sidebar.classList.toggle('collapsed');
});
  // Render awal
  renderTabel();
</script>

</body>
</html>