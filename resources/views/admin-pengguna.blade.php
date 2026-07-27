<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Pengguna - Admin</title>
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
    transition: transform 0.25s ease;
    z-index: 200;
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

  .sidebar-nav { list-style: none; padding: 16px 12px; flex: 1; overflow-y: auto; }

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
    display: none;
    flex-direction: column;
    gap: 4px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px;
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

  /* ===== STAT CARDS ===== */
  .stat-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-bottom: 20px;
  }
  .stat-card {
    background: #fff;
    border-radius: 14px;
    border: 1px solid #eef0f3;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    padding: 18px 20px;
  }
  .stat-card .stat-label { font-size: 12px; color: #7a8896; margin-bottom: 6px; }
  .stat-card .stat-value { font-size: 24px; font-weight: 700; color: #1e2a3a; }
  .stat-card.total .stat-value { color: #17b8c4; }
  .stat-card.aktif .stat-value { color: #1e8e3e; }
  .stat-card.nonaktif .stat-value { color: #d63b3b; }

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

  .panel-header-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

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

  .filter-role select {
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 9px 12px;
    font-size: 13px;
    outline: none;
    background: #fff;
    font-family: inherit;
  }
  .filter-role select:focus { border-color: #17b8c4; }

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

  .user-cell { display: flex; align-items: center; gap: 10px; }
  .user-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: #eaf0f8;
    color: #2f5a8a;
    font-size: 13px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .user-name { font-weight: 700; color: #1e2a3a; }
  .user-email { font-size: 12px; color: #7a8896; }

  .badge {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
    white-space: nowrap;
  }
  .badge-role-admin { color: #5b2a99; background: #f6efff; }
  .badge-role-petugas { color: #2f5a8a; background: #eaf0f8; }
  .badge-role-kepala { color: #a15c00; background: #fff4e5; }
  .badge-role-pemohon { color: #444; background: #f1f3f6; }

  .status-toggle {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    border: none;
    background: none;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px 4px 8px;
    border-radius: 20px;
  }
  .status-toggle.aktif { color: #1e8e3e; background: #e9f9ee; }
  .status-toggle.nonaktif { color: #d63b3b; background: #fde9e9; }
  .status-dot { width: 7px; height: 7px; border-radius: 50%; background: currentColor; }

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
  .btn-icon.reset:hover { background: #fff4e5; border-color: #a15c00; }

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
    max-width: 460px;
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

  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

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
  .form-error { font-size: 11.5px; color: #d63b3b; margin-top: 4px; display: none; }

  .status-radio-group { display: flex; gap: 10px; }
  .status-radio-option {
    flex: 1;
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 9px 10px;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    font-size: 13px;
  }
  .status-radio-option input { width: auto; }
  .status-radio-option.active-aktif { border-color: #1e8e3e; background: #e9f9ee; }
  .status-radio-option.active-nonaktif { border-color: #d63b3b; background: #fde9e9; }

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

  @media (max-width: 960px) {
    .sidebar { position: fixed; left: 0; top: 0; transform: translateX(-100%); }
    .sidebar.show { transform: translateX(0); }
    .sidebar-overlay.show { display: block; }
    .hamburger-btn { display: flex; }
    .admin-profile .name, .admin-profile .role { display: none; }
    .stat-row { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 700px) {
    .content { padding: 18px; }
    .stat-row { grid-template-columns: 1fr 1fr; gap: 10px; }
    .panel-header { flex-direction: column; align-items: stretch; }
    .panel-header-actions { flex-direction: column; align-items: stretch; }
    .search-box input, .filter-role select { width: 100%; }
    .form-row { grid-template-columns: 1fr; }
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

  <div class="sidebar-overlay" id="sidebarOverlay"></div>

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
      <li><a href="{{ url('/admin/surat-pernyataan-penguasaan-fisik-hak-pertama') }}"><span class="icon">🏡</span> Penguasaan Fisik (Hak Pertama)</a></li>

      <div class="sidebar-section-title">Pajak</div>
      <li><a href="{{ url('/admin/surat-bphtb') }}"><span class="icon">💰</span> Surat BPHTB</a></li>
      <li><a href="{{ url('/admin/surat-pph') }}"><span class="icon">🧾</span> Surat PPH</a></li>

      <div class="sidebar-section-title">Konten</div>
      <li><a href="{{ url('/admin/informasi') }}"><span class="icon">ℹ️</span> Informasi</a></li>
      <li><a href="{{ url('/admin/pengguna') }}" class="active"><span class="icon">👥</span> Pengguna</a></li>

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
          Kelola Pengguna
          <span class="subtitle">Tambah, ubah, atau nonaktifkan akun pengguna</span>
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
      <div class="breadcrumb"><a href="{{ url('/admin') }}">Dashboard</a> &nbsp;/&nbsp; Pengguna</div>

      <div class="stat-row">
        <div class="stat-card total">
          <div class="stat-label">Total Pengguna</div>
          <div class="stat-value" id="statTotal">0</div>
        </div>
        <div class="stat-card aktif">
          <div class="stat-label">Aktif</div>
          <div class="stat-value" id="statAktif">0</div>
        </div>
        <div class="stat-card nonaktif">
          <div class="stat-label">Nonaktif</div>
          <div class="stat-value" id="statNonaktif">0</div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-header">
          <div>
            <h2>Daftar Pengguna</h2>
            <div class="subtitle">Akun yang terdaftar di sistem</div>
          </div>
          <div class="panel-header-actions">
            <div class="search-box">
              <input type="text" id="cariPengguna" placeholder="Cari nama / email...">
            </div>
            <div class="filter-role">
              <select id="filterRole">
                <option value="">Semua Role</option>
                <option value="Admin">Admin</option>
                <option value="Petugas Loket">Petugas Loket</option>
                <option value="Kepala Kantor">Kepala Kantor</option>
                <option value="Pemohon">Pemohon</option>
              </select>
            </div>
            <button type="button" class="btn-primary" id="btnTambah">+ Tambah Pengguna</button>
          </div>
        </div>

        <table>
          <thead>
            <tr>
              <th style="width:40px;">No</th>
              <th>Nama Pengguna</th>
              <th>No. HP</th>
              <th>Role</th>
              <th>Status</th>
              <th style="width:130px;">Aksi</th>
            </tr>
          </thead>
          <tbody id="tabelPengguna"></tbody>
        </table>

        <div class="table-empty" id="tableEmpty" style="display:none;">Tidak ada pengguna yang cocok dengan pencarian/filter.</div>
      </div>
    </main>
  </div>
</div>

<!-- ===== MODAL TAMBAH / EDIT ===== -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">
    <div class="modal-header">
      <h3 id="modalTitle">Tambah Pengguna</h3>
      <button type="button" class="modal-close" id="modalClose">&times;</button>
    </div>
    <div class="modal-body">
      <form id="formPengguna">
        <input type="hidden" id="penggunaId">
        <div class="form-group">
          <label for="namaPengguna">Nama Lengkap</label>
          <input type="text" id="namaPengguna" placeholder="Contoh: Budi Santoso" required>
        </div>
        <div class="form-group">
          <label for="emailPengguna">Email</label>
          <input type="email" id="emailPengguna" placeholder="nama@email.com" required>
          <div class="form-error" id="errorEmail">Email ini sudah dipakai pengguna lain.</div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="hpPengguna">No. HP</label>
            <input type="text" id="hpPengguna" placeholder="08xxxxxxxxxx">
          </div>
          <div class="form-group">
            <label for="rolePengguna">Role</label>
            <select id="rolePengguna" required>
              <option value="Admin">Admin</option>
              <option value="Petugas Loket">Petugas Loket</option>
              <option value="Kepala Kantor">Kepala Kantor</option>
              <option value="Pemohon">Pemohon</option>
            </select>
          </div>
        </div>
        <div class="form-group" id="passwordWrap">
          <label for="passwordPengguna">Password</label>
          <input type="password" id="passwordPengguna" placeholder="Minimal 8 karakter">
          <div class="form-hint" id="passwordHint">Password awal untuk akun ini.</div>
        </div>
        <div class="form-group">
          <label>Status Akun</label>
          <div class="status-radio-group">
            <label class="status-radio-option" id="optAktif">
              <input type="radio" name="statusPengguna" value="Aktif" checked> Aktif
            </label>
            <label class="status-radio-option" id="optNonaktif">
              <input type="radio" name="statusPengguna" value="Nonaktif"> Nonaktif
            </label>
          </div>
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
    Nanti diganti dengan data dari Controller (Pengguna/User model),
    dan fungsi tambah/edit/hapus/reset-password disambungkan ke
    route store/update/destroy di routes/web.php.
  */
  let penggunaList = [
    { id: 1, nama: 'Ahmad Fauzi', email: 'ahmad.fauzi@pertanahan.go.id', hp: '081234567890', role: 'Admin', status: 'Aktif' },
    { id: 2, nama: 'Siti Rahma', email: 'siti.rahma@pertanahan.go.id', hp: '081298765432', role: 'Petugas Loket', status: 'Aktif' },
    { id: 3, nama: 'Bambang Wijaya', email: 'bambang.wijaya@pertanahan.go.id', hp: '081211122233', role: 'Kepala Kantor', status: 'Aktif' },
    { id: 4, nama: 'Dewi Anggraini', email: 'dewi.anggraini@pertanahan.go.id', hp: '081355566677', role: 'Petugas Loket', status: 'Nonaktif' },
    { id: 5, nama: 'Rizky Pratama', email: 'rizky.pratama@gmail.com', hp: '085712345678', role: 'Pemohon', status: 'Aktif' },
    { id: 6, nama: 'Nurul Hidayah', email: 'nurul.hidayah@gmail.com', hp: '085798765432', role: 'Pemohon', status: 'Aktif' },
  ];
  let nextId = penggunaList.length + 1;

  const roleBadgeClass = {
    'Admin': 'badge-role-admin',
    'Petugas Loket': 'badge-role-petugas',
    'Kepala Kantor': 'badge-role-kepala',
    'Pemohon': 'badge-role-pemohon',
  };

  const tabelPengguna = document.getElementById('tabelPengguna');
  const tableEmpty = document.getElementById('tableEmpty');
  const cariPengguna = document.getElementById('cariPengguna');
  const filterRole = document.getElementById('filterRole');

  function inisial(nama) {
    return nama.split(' ').filter(Boolean).slice(0, 2).map(w => w[0].toUpperCase()).join('');
  }

  function updateStats() {
    document.getElementById('statTotal').textContent = penggunaList.length;
    document.getElementById('statAktif').textContent = penggunaList.filter(p => p.status === 'Aktif').length;
    document.getElementById('statNonaktif').textContent = penggunaList.filter(p => p.status === 'Nonaktif').length;
  }

  function renderTabel() {
    const keyword = cariPengguna.value.toLowerCase();
    const role = filterRole.value;

    const filtered = penggunaList.filter(p => {
      const cocokKeyword = p.nama.toLowerCase().includes(keyword) || p.email.toLowerCase().includes(keyword);
      const cocokRole = !role || p.role === role;
      return cocokKeyword && cocokRole;
    });

    tabelPengguna.innerHTML = '';

    if (filtered.length === 0) {
      tableEmpty.style.display = 'block';
      updateStats();
      return;
    }
    tableEmpty.style.display = 'none';

    filtered.forEach((p, index) => {
      const tr = document.createElement('tr');
      const statusClass = p.status === 'Aktif' ? 'aktif' : 'nonaktif';
      tr.innerHTML = `
        <td data-label="No">${index + 1}</td>
        <td data-label="Nama Pengguna">
          <div class="user-cell">
            <div class="user-avatar">${inisial(p.nama)}</div>
            <div>
              <div class="user-name">${p.nama}</div>
              <div class="user-email">${p.email}</div>
            </div>
          </div>
        </td>
        <td data-label="No. HP">${p.hp || '-'}</td>
        <td data-label="Role"><span class="badge ${roleBadgeClass[p.role] || ''}">${p.role}</span></td>
        <td data-label="Status">
          <button type="button" class="status-toggle ${statusClass}" data-id="${p.id}" title="Klik untuk ubah status">
            <span class="status-dot"></span> ${p.status}
          </button>
        </td>
        <td data-label="Aksi">
          <div class="action-buttons">
            <button type="button" class="btn-icon edit" data-id="${p.id}" title="Edit">✏️</button>
            <button type="button" class="btn-icon delete" data-id="${p.id}" title="Hapus">🗑️</button>
          </div>
        </td>
      `;
      tabelPengguna.appendChild(tr);
    });

    updateStats();
  }

  cariPengguna.addEventListener('input', renderTabel);
  filterRole.addEventListener('change', renderTabel);

  // ===== MODAL =====
  const modalOverlay = document.getElementById('modalOverlay');
  const modalTitle = document.getElementById('modalTitle');
  const penggunaIdInput = document.getElementById('penggunaId');
  const namaPenggunaInput = document.getElementById('namaPengguna');
  const emailPenggunaInput = document.getElementById('emailPengguna');
  const errorEmail = document.getElementById('errorEmail');
  const hpPenggunaInput = document.getElementById('hpPengguna');
  const rolePenggunaInput = document.getElementById('rolePengguna');
  const passwordPenggunaInput = document.getElementById('passwordPengguna');
  const passwordHint = document.getElementById('passwordHint');

  function setStatusRadio(status) {
    const radios = document.getElementsByName('statusPengguna');
    radios.forEach(r => { r.checked = (r.value === status); });
  }

  function getStatusRadio() {
    const radios = document.getElementsByName('statusPengguna');
    for (const r of radios) if (r.checked) return r.value;
    return 'Aktif';
  }

  function bukaModalTambah() {
    modalTitle.textContent = 'Tambah Pengguna';
    penggunaIdInput.value = '';
    namaPenggunaInput.value = '';
    emailPenggunaInput.value = '';
    errorEmail.style.display = 'none';
    hpPenggunaInput.value = '';
    rolePenggunaInput.value = 'Pemohon';
    passwordPenggunaInput.value = '';
    passwordPenggunaInput.required = true;
    passwordPenggunaInput.placeholder = 'Minimal 8 karakter';
    passwordHint.textContent = 'Password awal untuk akun ini.';
    setStatusRadio('Aktif');
    modalOverlay.classList.add('show');
    namaPenggunaInput.focus();
  }

  function bukaModalEdit(id) {
    const item = penggunaList.find(p => p.id === id);
    if (!item) return;
    modalTitle.textContent = 'Edit Pengguna';
    penggunaIdInput.value = item.id;
    namaPenggunaInput.value = item.nama;
    emailPenggunaInput.value = item.email;
    errorEmail.style.display = 'none';
    hpPenggunaInput.value = item.hp || '';
    rolePenggunaInput.value = item.role;
    passwordPenggunaInput.value = '';
    passwordPenggunaInput.required = false;
    passwordPenggunaInput.placeholder = 'Kosongkan jika tidak ingin mengubah password';
    passwordHint.textContent = 'Isi hanya jika ingin mengganti password pengguna ini.';
    setStatusRadio(item.status);
    modalOverlay.classList.add('show');
    namaPenggunaInput.focus();
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
    const nama = namaPenggunaInput.value.trim();
    const email = emailPenggunaInput.value.trim();
    const hp = hpPenggunaInput.value.trim();
    const role = rolePenggunaInput.value;
    const password = passwordPenggunaInput.value;
    const status = getStatusRadio();
    const id = penggunaIdInput.value;

    if (!nama) { namaPenggunaInput.focus(); return; }
    if (!email) { emailPenggunaInput.focus(); return; }

    const emailDipakai = penggunaList.some(p => p.email.toLowerCase() === email.toLowerCase() && p.id !== Number(id));
    if (emailDipakai) {
      errorEmail.style.display = 'block';
      emailPenggunaInput.focus();
      return;
    }
    errorEmail.style.display = 'none';

    if (!id && password.length < 8) {
      passwordPenggunaInput.focus();
      showToast('Password minimal 8 karakter.');
      return;
    }

    if (id) {
      const item = penggunaList.find(p => p.id === Number(id));
      item.nama = nama;
      item.email = email;
      item.hp = hp;
      item.role = role;
      item.status = status;
      showToast('Data pengguna berhasil diperbarui.');
    } else {
      penggunaList.push({ id: nextId++, nama, email, hp, role, status });
      showToast('Pengguna baru berhasil ditambahkan.');
    }

    tutupModal();
    renderTabel();
  });

  tabelPengguna.addEventListener('click', (e) => {
    const editBtn = e.target.closest('.btn-icon.edit');
    const deleteBtn = e.target.closest('.btn-icon.delete');
    const statusBtn = e.target.closest('.status-toggle');

    if (editBtn) {
      bukaModalEdit(Number(editBtn.dataset.id));
    }

    if (deleteBtn) {
      const id = Number(deleteBtn.dataset.id);
      const item = penggunaList.find(p => p.id === id);
      if (item && confirm(`Hapus pengguna "${item.nama}"?`)) {
        penggunaList = penggunaList.filter(p => p.id !== id);
        renderTabel();
        showToast('Pengguna berhasil dihapus.');
      }
    }

    if (statusBtn) {
      const id = Number(statusBtn.dataset.id);
      const item = penggunaList.find(p => p.id === id);
      if (item) {
        item.status = item.status === 'Aktif' ? 'Nonaktif' : 'Aktif';
        renderTabel();
        showToast(`Status "${item.nama}" diubah menjadi ${item.status}.`);
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
  const overlay = document.getElementById('sidebarOverlay');
  const hamburgerBtn = document.getElementById('hamburgerBtn');
  function toggleSidebar() {
    sidebar.classList.toggle('show');
    overlay.classList.toggle('show');
  }
  hamburgerBtn.addEventListener('click', toggleSidebar);
  overlay.addEventListener('click', toggleSidebar);

  // Render awal
  renderTabel();
</script>

</body>
</html>