<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengajuan Masuk - Admin</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f5f6fa;
    color: #222;
  }

  .layout { display: flex; min-height: 100vh; }

  /* ===== SIDEBAR (konsisten dengan admin-home) ===== */
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

  .sidebar-brand img { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; background: #fdf6ee; }
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

  .sidebar-footer { padding: 16px 20px; border-top: 1px solid rgba(255,255,255,0.12); font-size: 12px; color: #9fb2c9; }

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

  .breadcrumb { font-size: 13px; color: #7a8896; margin-bottom: 18px; }
  .breadcrumb a { color: #17b8c4; text-decoration: none; font-weight: 600; }
  .breadcrumb a:hover { text-decoration: underline; }

  /* ===== FILTER TABS ===== */
  .filter-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 18px;
  }

  .filter-tab {
    background: #fff;
    border: 1px solid #d8dde3;
    color: #444;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .filter-tab .count {
    background: #f1f3f6;
    color: #7a8896;
    font-size: 11px;
    padding: 2px 7px;
    border-radius: 10px;
  }

  .filter-tab.active { background: #1e3a5f; border-color: #1e3a5f; color: #fff; }
  .filter-tab.active .count { background: rgba(255,255,255,0.2); color: #fff; }

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
    width: 240px;
  }
  .search-box input:focus { border-color: #17b8c4; }

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

  tr.row-utama { cursor: pointer; }
  tr.row-utama:hover { background: #fafbfc; }
  tr.row-utama.expanded { background: #eef4fa; }

  .chev {
    display: inline-block;
    transition: transform 0.2s;
    color: #7a8896;
    font-size: 12px;
  }
  tr.row-utama.expanded .chev { transform: rotate(180deg); }

  .badge {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
  }
  .badge.menunggu { background: #fff4e0; color: #b8790a; }
  .badge.diproses { background: #eaf0f8; color: #2f5a8a; }
  .badge.selesai  { background: #e3f9ef; color: #1d9e75; }
  .badge.ditolak  { background: #fde9e9; color: #d63b3b; }

  /* ===== BARIS DETAIL (expand) ===== */
  tr.row-detail td {
    background: #fafbfc;
    padding: 0;
    border-top: none;
  }

  .detail-inner {
    padding: 22px 26px 26px;
    display: none;
  }

  tr.row-detail.show .detail-inner { display: block; }

  .detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 20px;
  }

  .detail-block h4 {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    color: #7a8896;
    margin-bottom: 10px;
  }

  .detail-row {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    font-size: 13.5px;
    padding: 6px 0;
    border-bottom: 1px dashed #eef0f3;
  }
  .detail-row span:first-child { color: #7a8896; }
  .detail-row span:last-child { color: #1e2a3a; font-weight: 600; text-align: right; }

  .dokumen-list { list-style: none; }
  .dokumen-list li {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 8px;
    padding: 10px 14px;
    margin-bottom: 8px;
    font-size: 13px;
  }
  .dokumen-list a { color: #2f5a8a; font-weight: 700; text-decoration: none; font-size: 12.5px; }
  .dokumen-list a:hover { text-decoration: underline; }

  .action-bar {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px;
    padding-top: 18px;
    border-top: 1px solid #eef0f3;
  }

  .btn-aksi {
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: filter 0.15s;
  }
  .btn-aksi:hover { filter: brightness(0.94); }

  .btn-setujui  { background: #1d9e75; color: #fff; }
  .btn-proses   { background: #2f5a8a; color: #fff; }
  .btn-menunggu { background: #fff4e0; color: #b8790a; }
  .btn-tolak    { background: #fde9e9; color: #d63b3b; }
  .btn-edit     { background: #f1f3f6; color: #444; }
  .btn-hapus    { background: #fff; color: #d63b3b; border: 1px solid #f3c9c9; }

  .tolak-form {
    display: none;
    margin-top: 14px;
    background: #fff;
    border: 1px solid #f3c9c9;
    border-radius: 10px;
    padding: 14px;
  }
  .tolak-form.show { display: block; }

  .tolak-form textarea {
    width: 100%;
    min-height: 70px;
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 10px;
    font-size: 13px;
    font-family: inherit;
    outline: none;
    resize: vertical;
    margin-bottom: 10px;
  }
  .tolak-form textarea:focus { border-color: #d63b3b; }

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

  .modal-close { background: none; border: none; font-size: 18px; color: #888; cursor: pointer; line-height: 1; }

  .modal-body { padding: 22px; }

  .form-group { margin-bottom: 16px; }

  .form-group label {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: #1e2a3a;
    margin-bottom: 6px;
  }

  .form-group input {
    width: 100%;
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 10px 12px;
    font-size: 13.5px;
    outline: none;
    font-family: inherit;
  }

  .form-group input:focus { border-color: #17b8c4; }

  .modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    padding: 16px 22px;
    border-top: 1px solid #f0f2f5;
  }

  .btn-primary {
    background: #17b8c4;
    color: #fff;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
  }
  .btn-primary:hover { background: #129aa5; }

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

  .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 150; }

  @media (max-width: 960px) {
    .sidebar { position: fixed; left: 0; top: 0; transform: translateX(-100%); }
    .sidebar.show { transform: translateX(0); }
    .sidebar-overlay.show { display: block; }
    .hamburger-btn { display: flex; }
    .admin-profile .name, .admin-profile .role { display: none; }
  }

  @media (max-width: 760px) {
    .detail-grid { grid-template-columns: 1fr; }
  }

  @media (max-width: 700px) {
    .content { padding: 18px; }
    .panel-header { flex-direction: column; align-items: stretch; }
    .search-box input { width: 100%; }
    thead { display: none; }
    table, tbody, tr, td { display: block; width: 100%; }
    tr.row-utama { border: 1px solid #eef0f3; border-radius: 10px; margin-bottom: 10px; padding: 6px 0; }
    tr.row-utama td {
      border-top: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      padding: 8px 16px;
    }
    tr.row-utama td::before {
      content: attr(data-label);
      font-weight: 700;
      color: #7a8896;
      font-size: 11px;
      text-transform: uppercase;
      flex-shrink: 0;
    }
    tr.row-detail td { border-radius: 0 0 10px 10px; }
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
      <li><a href="{{ url('/admin/pengajuan') }}" class="active"><span class="icon">📥</span> Semua Pengajuan</a></li>

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
      <li><a href="{{ url('/admin/surat-pernyataan-penguasaan-fisik-hak-pertama') }}"><span class="icon">🏡</span> Penguasaan Fisik (Hak Pertama)</a></li>

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
          Pengajuan Masuk
          <span class="subtitle">Verifikasi, proses, setujui, atau tolak pengajuan</span>
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
      <div class="breadcrumb"><a href="{{ url('/admin') }}">Dashboard</a> &nbsp;/&nbsp; Pengajuan Masuk</div>

      <div class="filter-tabs" id="filterTabs">
        <button type="button" class="filter-tab active" data-status="semua">Semua <span class="count" id="countSemua">0</span></button>
        <button type="button" class="filter-tab" data-status="menunggu">Menunggu <span class="count" id="countMenunggu">0</span></button>
        <button type="button" class="filter-tab" data-status="diproses">Diproses <span class="count" id="countDiproses">0</span></button>
        <button type="button" class="filter-tab" data-status="selesai">Selesai <span class="count" id="countSelesai">0</span></button>
        <button type="button" class="filter-tab" data-status="ditolak">Ditolak <span class="count" id="countDitolak">0</span></button>
      </div>

      <div class="panel">
        <div class="panel-header">
          <div>
            <h2>Daftar Pengajuan</h2>
            <div class="subtitle">Klik satu baris untuk lihat detail dan verifikasi</div>
          </div>
          <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">

    <div class="search-box">
        <input type="text" id="cariPengajuan" placeholder="Cari nama / no. berkas...">
    </div>

    <button class="btn-primary" id="btnTambahPengajuan">
        + Tambah Pengajuan
    </button>

</div>
        </div>

        <table>
          <thead>
            <tr>
              <th style="width:36px;"></th>
              <th>No. Berkas</th>
              <th>Nama Pemohon</th>
              <th>Jenis Formulir</th>
              <th>Tanggal Masuk</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="tabelPengajuan"></tbody>
        </table>

        <div class="table-empty" id="tableEmpty" style="display:none;">Tidak ada pengajuan yang cocok.</div>
      </div>
    </main>
  </div>
</div>

<!-- ===== MODAL EDIT PENGAJUAN ===== -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">
    <div class="modal-header">
      <h3>Edit Data Pengajuan</h3>
      <button type="button" class="modal-close" id="modalClose">&times;</button>
    </div>
    <div class="modal-body">
      <form id="formEdit">
        <input type="hidden" id="editId">
        <div class="form-group">
          <label for="editNama">Nama Pemohon</label>
          <input type="text" id="editNama" required>
        </div>
        <div class="form-group">
          <label for="editEmail">Email</label>
          <input type="text" id="editEmail">
        </div>
        <div class="form-group">
          <label for="editHp">No. HP</label>
          <input type="text" id="editHp">
        </div>
        <div class="form-group">
          <label for="editAlamat">Alamat</label>
          <input type="text" id="editAlamat">
        </div>
        <div class="form-group">
          <label for="editJenisFormulir">Jenis Formulir</label>
          <input type="text" id="editJenisFormulir">
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn-secondary" id="btnBatalEdit">Batal</button>
      <button type="button" class="btn-primary" id="btnSimpanEdit">Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
  /*
    Data dummy sementara, belum tersambung database.
    Nanti diganti data dari Controller, dan fungsi setujui/proses/tolak
    disambungkan ke route PATCH /admin/pengajuan/{id}/status.
  */
  let pengajuanList = [
    {
      id: 1, nomor_berkas: 'PMH-2026-0128', nama_pemohon: 'Sutrisno', email: 'sutrisno@email.com', no_hp: '0812-3456-7890',
      alamat: 'Jl. Ijen No. 12, Malang', jenis_formulir: 'Formulir Permohonan', tanggal: '2026-07-15', status: 'menunggu',
      catatan_pemohon: 'Mengajukan permohonan sertipikat tanah warisan.',
      dokumen: ['KTP Pemohon.pdf', 'Fotokopi Sertipikat.pdf', 'Formulir Permohonan.pdf'],
    },
    {
      id: 2, nomor_berkas: 'PTSL-2026-0044', nama_pemohon: 'Wahyu Kurniawan', email: 'wahyu.k@email.com', no_hp: '0813-2233-4455',
      alamat: 'Jl. Soekarno Hatta No. 45, Malang', jenis_formulir: 'Formulir PTSL', tanggal: '2026-07-15', status: 'diproses',
      catatan_pemohon: 'Pendaftaran tanah pertama kali program PTSL.',
      dokumen: ['KTP & KK.pdf', 'Bukti Girik.pdf', 'Surat Pernyataan Tidak Sengketa.pdf'],
    },
    {
      id: 3, nomor_berkas: 'SPN-2026-0091', nama_pemohon: 'Dewi Anggraini', email: 'dewi.a@email.com', no_hp: '0821-4455-6677',
      alamat: 'Jl. Kawi No. 8, Malang', jenis_formulir: 'Surat Pernyataan', tanggal: '2026-07-14', status: 'selesai',
      catatan_pemohon: 'Surat pernyataan keaslian sertipikat untuk balik nama.',
      dokumen: ['KTP Pemohon.pdf', 'Sertipikat Asli (scan).pdf'],
    },
    {
      id: 4, nomor_berkas: 'PMH-2026-0127', nama_pemohon: 'Agus Prasetyo', email: 'agus.p@email.com', no_hp: '0857-1122-3344',
      alamat: 'Jl. Veteran No. 21, Malang', jenis_formulir: 'Formulir Permohonan', tanggal: '2026-07-14', status: 'ditolak',
      catatan_pemohon: 'Permohonan perubahan hak atas tanah.',
      dokumen: ['KTP Pemohon.pdf', 'Bukti Kepemilikan.pdf'],
      alasan_tolak: 'Dokumen bukti kepemilikan tidak sesuai dengan data yang terdaftar.',
    },
    {
      id: 5, nomor_berkas: 'PTSL-2026-0043', nama_pemohon: 'Siti Rahayu', email: 'siti.r@email.com', no_hp: '0878-9900-1122',
      alamat: 'Jl. Bandulan No. 5, Malang', jenis_formulir: 'Formulir PTSL', tanggal: '2026-07-13', status: 'diproses',
      catatan_pemohon: 'Pendaftaran tanah warisan orang tua.',
      dokumen: ['KTP & KK.pdf', 'Girik Tanah.pdf'],
    },
    {
      id: 6, nomor_berkas: 'SPN-2026-0090', nama_pemohon: 'Bambang Wijaya', email: 'bambang.w@email.com', no_hp: '0812-9988-7766',
      alamat: 'Jl. Bendungan Sigura-gura No. 3, Malang', jenis_formulir: 'Surat Pernyataan', tanggal: '2026-07-13', status: 'selesai',
      catatan_pemohon: 'Surat pernyataan pelepasan hak untuk jual beli.',
      dokumen: ['KTP Pemohon.pdf', 'Bukti Kepemilikan.pdf', 'Materai.pdf'],
    },
  ];

  let currentFilter = 'semua';

  const tabelPengajuan = document.getElementById('tabelPengajuan');
  const tableEmpty = document.getElementById('tableEmpty');
  const cariPengajuan = document.getElementById('cariPengajuan');
  const filterTabs = document.getElementById('filterTabs');

  // Baca ?status=... dari URL saat halaman dibuka (link dari sidebar admin-home)
  const urlParams = new URLSearchParams(window.location.search);
  const statusFromUrl = urlParams.get('status');
  if (statusFromUrl && ['menunggu', 'diproses', 'selesai', 'ditolak'].includes(statusFromUrl)) {
    currentFilter = statusFromUrl;
  }

  function updateCounts() {
    document.getElementById('countSemua').textContent = pengajuanList.length;
    document.getElementById('countMenunggu').textContent = pengajuanList.filter(p => p.status === 'menunggu').length;
    document.getElementById('countDiproses').textContent = pengajuanList.filter(p => p.status === 'diproses').length;
    document.getElementById('countSelesai').textContent = pengajuanList.filter(p => p.status === 'selesai').length;
    document.getElementById('countDitolak').textContent = pengajuanList.filter(p => p.status === 'ditolak').length;
  }

  function statusLabel(status) {
    return status.charAt(0).toUpperCase() + status.slice(1);
  }

  function renderTabel() {
    const keyword = cariPengajuan.value.toLowerCase().trim();

    let filtered = pengajuanList.filter(p => {
      const cocokStatus = currentFilter === 'semua' || p.status === currentFilter;
      const cocokKeyword = p.nama_pemohon.toLowerCase().includes(keyword) || p.nomor_berkas.toLowerCase().includes(keyword);
      return cocokStatus && cocokKeyword;
    });

    tabelPengajuan.innerHTML = '';

    if (filtered.length === 0) {
      tableEmpty.style.display = 'block';
      updateCounts();
      return;
    }
    tableEmpty.style.display = 'none';

    filtered.forEach(p => {
      const trUtama = document.createElement('tr');
      trUtama.className = 'row-utama';
      trUtama.dataset.id = p.id;
      trUtama.innerHTML = `
        <td><span class="chev">▾</span></td>
        <td data-label="No. Berkas">${p.nomor_berkas}</td>
        <td data-label="Nama Pemohon">${p.nama_pemohon}</td>
        <td data-label="Jenis Formulir">${p.jenis_formulir}</td>
        <td data-label="Tanggal Masuk">${formatTanggal(p.tanggal)}</td>
        <td data-label="Status"><span class="badge ${p.status}">${statusLabel(p.status)}</span></td>
      `;

      const trDetail = document.createElement('tr');
      trDetail.className = 'row-detail';
      trDetail.dataset.detailFor = p.id;
      trDetail.innerHTML = `
        <td colspan="6">
          <div class="detail-inner">
            <div class="detail-grid">
              <div class="detail-block">
                <h4>Data Pemohon</h4>
                <div class="detail-row"><span>Nama</span><span>${p.nama_pemohon}</span></div>
                <div class="detail-row"><span>Email</span><span>${p.email}</span></div>
                <div class="detail-row"><span>No. HP</span><span>${p.no_hp}</span></div>
                <div class="detail-row"><span>Alamat</span><span>${p.alamat}</span></div>
              </div>
              <div class="detail-block">
                <h4>Dokumen Terlampir</h4>
                <ul class="dokumen-list">
                  ${p.dokumen.map(d => `<li>${d} <a href="#">Lihat</a></li>`).join('')}
                </ul>
              </div>
            </div>

            ${p.catatan_pemohon ? `
              <div class="detail-block" style="margin-bottom:16px;">
                <h4>Catatan Pemohon</h4>
                <div style="font-size:13.5px; color:#444;">${p.catatan_pemohon}</div>
              </div>
            ` : ''}

            ${p.status === 'ditolak' && p.alasan_tolak ? `
              <div class="detail-block" style="margin-bottom:16px;">
                <h4>Alasan Ditolak</h4>
                <div style="font-size:13.5px; color:#d63b3b;">${p.alasan_tolak}</div>
              </div>
            ` : ''}

            <div class="action-bar">
              <button type="button" class="btn-aksi btn-menunggu" data-action="menunggu" data-id="${p.id}">⏳ Menunggu</button>
              <button type="button" class="btn-aksi btn-proses" data-action="diproses" data-id="${p.id}">↻ Proses</button>
              <button type="button" class="btn-aksi btn-setujui" data-action="selesai" data-id="${p.id}">✓ Setujui</button>
              <button type="button" class="btn-aksi btn-tolak" data-action="tolak-toggle" data-id="${p.id}">✕ Tolak</button>
              <button type="button" class="btn-aksi btn-edit" data-action="edit" data-id="${p.id}">✏️ Edit</button>
              <button type="button" class="btn-aksi btn-hapus" data-action="hapus" data-id="${p.id}">🗑️ Hapus</button>
            </div>

            <div class="tolak-form" id="tolakForm-${p.id}">
              <textarea placeholder="Tulis alasan penolakan..." id="alasanTolak-${p.id}"></textarea>
              <button type="button" class="btn-aksi btn-tolak" data-action="tolak-konfirmasi" data-id="${p.id}">Konfirmasi Tolak</button>
            </div>
          </div>
        </td>
      `;

      tabelPengajuan.appendChild(trUtama);
      tabelPengajuan.appendChild(trDetail);
    });

    updateCounts();
  }

  function formatTanggal(tgl) {
    const bulanIndo = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const d = new Date(tgl);
    return `${d.getDate()} ${bulanIndo[d.getMonth()]} ${d.getFullYear()}`;
  }

  // Toggle expand baris
  tabelPengajuan.addEventListener('click', (e) => {
    const rowUtama = e.target.closest('tr.row-utama');
    if (rowUtama && !e.target.closest('.btn-aksi')) {
      const id = rowUtama.dataset.id;
      const rowDetail = tabelPengajuan.querySelector(`tr.row-detail[data-detail-for="${id}"]`);
      rowUtama.classList.toggle('expanded');
      rowDetail.classList.toggle('show');
      return;
    }

    // Tombol aksi (setujui/proses/tolak)
    const btn = e.target.closest('.btn-aksi');
    if (!btn) return;

    const id = Number(btn.dataset.id);
    const action = btn.dataset.action;
    const item = pengajuanList.find(p => p.id === id);
    if (!item) return;

    if (action === 'selesai' || action === 'diproses' || action === 'menunggu') {
      item.status = action;
      showToast(`Pengajuan ${item.nomor_berkas} ditandai "${statusLabel(action)}".`);
      renderTabel();
    }

    if (action === 'tolak-toggle') {
      const form = document.getElementById(`tolakForm-${id}`);
      form.classList.toggle('show');
    }

    if (action === 'tolak-konfirmasi') {
      const textarea = document.getElementById(`alasanTolak-${id}`);
      const alasan = textarea.value.trim();
      if (!alasan) {
        textarea.focus();
        return;
      }
      item.status = 'ditolak';
      item.alasan_tolak = alasan;
      showToast(`Pengajuan ${item.nomor_berkas} ditolak.`);
      renderTabel();
    }

    if (action === 'edit') {
      bukaModalEdit(id);
    }

    if (action === 'hapus') {
      if (confirm(`Hapus pengajuan "${item.nomor_berkas}" atas nama ${item.nama_pemohon}? Data akan hilang secara permanen.`)) {
        pengajuanList = pengajuanList.filter(x => x.id !== id);
        showToast(`Pengajuan ${item.nomor_berkas} berhasil dihapus.`);
        renderTabel();
      }
    }
  });

  // ===== MODAL EDIT =====
  const modalOverlay = document.getElementById('modalOverlay');
  const editId = document.getElementById('editId');
  const editNama = document.getElementById('editNama');
  const editEmail = document.getElementById('editEmail');
  const editHp = document.getElementById('editHp');
  const editAlamat = document.getElementById('editAlamat');
  const editJenisFormulir = document.getElementById('editJenisFormulir');

  function bukaModalEdit(id) {
    const item = pengajuanList.find(p => p.id === id);
    if (!item) return;
    editId.value = item.id;
    editNama.value = item.nama_pemohon;
    editEmail.value = item.email;
    editHp.value = item.no_hp;
    editAlamat.value = item.alamat;
    editJenisFormulir.value = item.jenis_formulir;
    modalOverlay.classList.add('show');
    editNama.focus();
  }

  function tutupModalEdit() {
    modalOverlay.classList.remove('show');
  }

  document.getElementById('btnBatalEdit').addEventListener('click', tutupModalEdit);
  document.getElementById('modalClose').addEventListener('click', tutupModalEdit);
  modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) tutupModalEdit();
  });

  document.getElementById('btnSimpanEdit').addEventListener('click', () => {
    const nama = editNama.value.trim();
    if (!nama) {
      editNama.focus();
      return;
    }
    const item = pengajuanList.find(p => p.id === Number(editId.value));
    item.nama_pemohon = nama;
    item.email = editEmail.value.trim();
    item.no_hp = editHp.value.trim();
    item.alamat = editAlamat.value.trim();
    item.jenis_formulir = editJenisFormulir.value.trim();

    tutupModalEdit();
    showToast('Data pengajuan berhasil diperbarui.');
    renderTabel();
  });

  // Filter tabs
  filterTabs.addEventListener('click', (e) => {
    const btn = e.target.closest('.filter-tab');
    if (!btn) return;
    currentFilter = btn.dataset.status;
    document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
    renderTabel();
  });

  // Set tab aktif sesuai filter awal (dari URL)
  document.querySelectorAll('.filter-tab').forEach(t => {
    t.classList.toggle('active', t.dataset.status === currentFilter);
  });

  cariPengajuan.addEventListener('input', renderTabel);

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

  renderTabel();
</script>

</body>
</html>