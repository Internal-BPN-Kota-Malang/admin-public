<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin - Kantor Pertanahan</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f5f6fa;
    color: #222;
  }

  .layout {
    display: flex;
    min-height: 100vh;
  }

  /* ===== SIDEBAR ===== */
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
    flex-shrink: 0;
  }

  .sidebar-brand span {
    font-size: 15px;
    font-weight: 700;
    line-height: 1.3;
  }

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

  .sidebar-nav a .icon {
    width: 20px;
    text-align: center;
    font-size: 16px;
  }

  .sidebar-nav a:hover {
    background: rgba(255,255,255,0.08);
    color: #fff;
  }

  .sidebar-nav a.active {
    background: #26c6da;
    color: #0c2338;
    font-weight: 700;
  }

  .sidebar-footer {
    padding: 16px 20px;
    border-top: 1px solid rgba(255,255,255,0.12);
    font-size: 12px;
    color: #9fb2c9;
  }

  /* ===== MAIN AREA ===== */
  .main {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
  }

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

  .topbar-left {
    display: flex;
    align-items: center;
    gap: 14px;
  }

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

  .topbar-title {
    font-size: 18px;
    font-weight: 700;
    color: #1e2a3a;
  }

  .topbar-title .subtitle {
    display: block;
    font-size: 12px;
    font-weight: 400;
    color: #7a8896;
    margin-top: 2px;
  }

  .topbar-right {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .topbar-icon-btn {
    position: relative;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #f5f6fa;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 16px;
  }

  .topbar-icon-btn .dot {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #ff5b5b;
    border: 2px solid #fff;
  }

  .admin-profile {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
  }

  .admin-profile img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    background: #eaf0f8;
  }

  .admin-profile .name {
    font-size: 13px;
    font-weight: 700;
    color: #1e2a3a;
    line-height: 1.3;
  }

  .admin-profile .role {
    font-size: 11px;
    color: #7a8896;
  }

  .content {
    padding: 28px;
  }

  /* ===== STAT CARDS ===== */
  .stat-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 18px;
    margin-bottom: 28px;
  }

  .stat-card {
    background: #fff;
    border-radius: 14px;
    padding: 20px;
    border: 1px solid #eef0f3;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
  }

  .stat-icon.total { background: #eaf0f8; }
  .stat-icon.pending { background: #fff4e0; }
  .stat-icon.done { background: #e3f9ef; }
  .stat-icon.rejected { background: #fde9e9; }

  .stat-info .stat-value {
    font-size: 24px;
    font-weight: 800;
    color: #1e2a3a;
    line-height: 1.2;
  }

  .stat-info .stat-label {
    font-size: 13px;
    color: #7a8896;
    margin-top: 2px;
  }

  /* ===== TABLE SECTION ===== */
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

  .panel-header h3 {
    font-size: 16px;
    color: #1e2a3a;
  }

  .panel-header .subtitle {
    font-size: 12px;
    color: #7a8896;
    margin-top: 2px;
  }

  .btn-lihat-semua {
    font-size: 13px;
    font-weight: 700;
    color: #2f5a8a;
    text-decoration: none;
    padding: 8px 14px;
    border: 1px solid #cdd9e8;
    border-radius: 6px;
  }

  .btn-lihat-semua:hover { background: #eaf0f8; }

  table {
    width: 100%;
    border-collapse: collapse;
  }

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
    font-size: 13px;
    color: #333;
    border-top: 1px solid #f0f2f5;
    white-space: nowrap;
  }

  tbody tr:hover { background: #fafbfc; }
  tbody tr.row-clickable { cursor: pointer; }
  tbody tr.row-clickable:hover { background: #eef4fa; }

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

  .table-empty {
    padding: 40px 22px;
    text-align: center;
    color: #888;
    font-size: 14px;
  }

  @media (max-width: 600px) {
    .content { padding: 18px; }
    .topbar { padding: 14px 18px; }
    thead { display: none; }
    table, tbody, tr, td { display: block; width: 100%; }
    tbody tr {
      border: 1px solid #eef0f3;
      border-radius: 10px;
      margin-bottom: 12px;
      padding: 8px 0;
    }
    tbody td {
      border-top: none;
      display: flex;
      justify-content: space-between;
      gap: 12px;
      padding: 8px 16px;
      white-space: normal;
    }
    tbody td::before {
      content: attr(data-label);
      font-weight: 700;
      color: #7a8896;
      font-size: 11px;
      text-transform: uppercase;
    }
    .admin-profile .name, .admin-profile .role { display: none; }
    .sidebar { position: fixed; left: 0; top: 0; z-index: 250; }
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
      <li><a href="{{ url('/admin') }}" class="active"><span class="icon">🏠</span> Dashboard</a></li>

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
      <li><a href="{{ url('/admin/pengguna') }}"><span class="icon">👥</span> Pengguna</a></li>

      <div class="sidebar-section-title">Akun</div>
      <li><a href="{{ url('/settings/profile') }}"><span class="icon">⚙️</span> Pengaturan</a></li>
      <li><a href="{{ url('/logout') }}"><span class="icon">🚪</span> Keluar</a></li>
    </ul>

    <div class="sidebar-footer">
      &copy; {{ date('Y') }} Kantor Pertanahan
    </div>
  </aside>

  <div class="main">
    <header class="topbar">
      <div class="topbar-left">
        <button class="hamburger-btn" id="hamburgerBtn" title="Tampilkan/sembunyikan menu"><span></span><span></span><span></span></button>
        <div class="topbar-title">
          Dashboard Admin
          <span class="subtitle">Ringkasan aktivitas permohonan hari ini</span>
        </div>
      </div>

      <div class="topbar-right">
        <button class="topbar-icon-btn" aria-label="Notifikasi">
          🔔
          <span class="dot"></span>
        </button>
        <div class="admin-profile">
          <img src="{{ asset('images/admin.png') }}" alt="Admin">
          <div>
            <div class="name">{{ auth()->user()->name ?? 'Admin' }}</div>
            <div class="role">Administrator</div>
          </div>
        </div>
      </div>
    </header>

    <main class="content">

      {{-- Data dummy sementara (belum tersambung database). --}}
      @php
        $totalPermohonan    = $totalPermohonan    ?? 128;
        $menungguVerifikasi = $menungguVerifikasi ?? 14;
        $selesai            = $selesai            ?? 96;
        $ditolak            = $ditolak            ?? 18;

        $permohonanTerbaru = $permohonanTerbaru ?? [
          ['nomor_berkas' => 'PMH-2026-0128', 'nama_pemohon' => 'Sutrisno', 'jenis_formulir' => 'Formulir Permohonan', 'created_at' => '2026-07-15', 'status' => 'menunggu'],
          ['nomor_berkas' => 'PTSL-2026-0044', 'nama_pemohon' => 'Wahyu Kurniawan', 'jenis_formulir' => 'Formulir PTSL', 'created_at' => '2026-07-15', 'status' => 'diproses'],
          ['nomor_berkas' => 'SPN-2026-0091', 'nama_pemohon' => 'Dewi Anggraini', 'jenis_formulir' => 'Surat Pernyataan', 'created_at' => '2026-07-14', 'status' => 'selesai'],
          ['nomor_berkas' => 'PMH-2026-0127', 'nama_pemohon' => 'Agus Prasetyo', 'jenis_formulir' => 'Formulir Permohonan', 'created_at' => '2026-07-14', 'status' => 'ditolak'],
          ['nomor_berkas' => 'PTSL-2026-0043', 'nama_pemohon' => 'Siti Rahayu', 'jenis_formulir' => 'Formulir PTSL', 'created_at' => '2026-07-13', 'status' => 'diproses'],
          ['nomor_berkas' => 'SPN-2026-0090', 'nama_pemohon' => 'Bambang Wijaya', 'jenis_formulir' => 'Surat Pernyataan', 'created_at' => '2026-07-13', 'status' => 'selesai'],
        ];
      @endphp

      <div class="stat-grid">
        <div class="stat-card">
          <div class="stat-icon total">📥</div>
          <div class="stat-info">
            <div class="stat-value">{{ $totalPermohonan }}</div>
            <div class="stat-label">Total Permohonan</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon pending">⏳</div>
          <div class="stat-info">
            <div class="stat-value">{{ $menungguVerifikasi }}</div>
            <div class="stat-label">Menunggu Verifikasi</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon done">✅</div>
          <div class="stat-info">
            <div class="stat-value">{{ $selesai }}</div>
            <div class="stat-label">Selesai Diproses</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon rejected">❌</div>
          <div class="stat-info">
            <div class="stat-value">{{ $ditolak }}</div>
            <div class="stat-label">Ditolak</div>
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-header">
          <div>
            <h3>Permohonan Terbaru</h3>
            <div class="subtitle">Contoh data sementara (belum tersambung database)</div>
          </div>
          <a href="{{ url('/admin/pengajuan') }}" class="btn-lihat-semua">Lihat Semua</a>
        </div>

        <table>
          <thead>
            <tr>
              <th>No. Berkas</th>
              <th>Nama Pemohon</th>
              <th>Jenis Formulir</th>
              <th>Tanggal Masuk</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($permohonanTerbaru as $item)
              @php
                $item = (object) $item;
                $statusClass = match($item->status) {
                  'menunggu' => 'menunggu',
                  'diproses' => 'diproses',
                  'selesai'  => 'selesai',
                  'ditolak'  => 'ditolak',
                  default    => 'menunggu',
                };
              @endphp
              <tr class="row-clickable" data-href="{{ url('/admin/pengajuan') }}/{{ $item->nomor_berkas }}">
                <td data-label="No. Berkas">{{ $item->nomor_berkas }}</td>
                <td data-label="Nama Pemohon">{{ $item->nama_pemohon }}</td>
                <td data-label="Jenis Formulir">{{ $item->jenis_formulir }}</td>
                <td data-label="Tanggal Masuk">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</td>
                <td data-label="Status">
                  <span class="badge {{ $statusClass }}">{{ ucfirst($item->status) }}</span>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="table-empty">Belum ada data permohonan.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

<script>
  const sidebar = document.getElementById('sidebar');
  const hamburgerBtn = document.getElementById('hamburgerBtn');

  // Di layar kecil, sidebar dimulai dalam kondisi tertutup supaya
  // tidak langsung memenuhi layar saat halaman pertama kali dibuka.
  if (window.innerWidth <= 768) {
    sidebar.classList.add('collapsed');
  }

  hamburgerBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
  });

  // Klik baris tabel (yang punya atribut data-href) untuk buka halaman detail
  document.querySelectorAll('tr.row-clickable[data-href]').forEach(row => {
    row.addEventListener('click', () => {
      window.location = row.dataset.href;
    });
  });
</script>

</body>
</html>