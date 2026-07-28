<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Pengajuan - Admin</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f6fa; color: #222; }

  .app { display: flex; min-height: 100vh; }

  .sidebar { width: 250px; flex-shrink: 0; background: #1e2a3a; color: #cdd5df; display: flex; flex-direction: column; position: sticky; top: 0; height: 100vh; }
  .sidebar-brand { display: flex; align-items: center; gap: 10px; padding: 22px 20px; border-bottom: 1px solid rgba(255,255,255,0.08); position: relative; }
  .sidebar-brand img { width: 34px; height: 34px; border-radius: 50%; object-fit: cover; background: #fdf6ee; }
  .sidebar-brand span { color: #fff; font-weight: 700; font-size: 14.5px; line-height: 1.3; }
  .sidebar-close-btn { display: none; margin-left: auto; width: 30px; height: 30px; border-radius: 8px; border: none; background: rgba(255,255,255,0.08); color: #fff; font-size: 15px; cursor: pointer; align-items: center; justify-content: center; flex-shrink: 0; }
  .sidebar-close-btn:hover { background: rgba(255,255,255,0.18); }
  .sidebar-nav { flex: 1; padding: 18px 12px; display: flex; flex-direction: column; gap: 4px; overflow-y: auto; }
  .sidebar-section-label { font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #6b7688; padding: 14px 12px 6px; }
  .sidebar-nav a { display: flex; align-items: center; gap: 12px; padding: 11px 14px; border-radius: 8px; color: #cdd5df; text-decoration: none; font-size: 13.5px; font-weight: 600; transition: background 0.2s, color 0.2s; }
  .sidebar-nav a .ic { font-size: 16px; width: 20px; text-align: center; }
  .sidebar-nav a:hover { background: rgba(255,255,255,0.06); color: #fff; }
  .sidebar-nav a.active { background: linear-gradient(90deg, #17b8c4, #2f5a8a); color: #fff; }
  .sidebar-badge { margin-left: auto; background: #e5205a; color: #fff; font-size: 10.5px; font-weight: 700; padding: 2px 7px; border-radius: 10px; }
  .sidebar-footer { padding: 16px; border-top: 1px solid rgba(255,255,255,0.08); }
  .sidebar-user { display: flex; align-items: center; gap: 10px; }
  .sidebar-user-avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, #17b8c4, #7b2fbe); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 13px; flex-shrink: 0; }
  .sidebar-user-name { font-size: 13px; font-weight: 700; color: #fff; }
  .sidebar-user-role { font-size: 11.5px; color: #8b95a5; }
  .sidebar-logout { display: block; margin-top: 12px; font-size: 12.5px; color: #e5205a; text-decoration: none; font-weight: 700; }
  .sidebar-logout:hover { text-decoration: underline; }

  .main { flex: 1; min-width: 0; }
  .topbar { display: flex; align-items: center; justify-content: space-between; background: #fff; padding: 16px 28px; border-bottom: 1px solid #eef0f3; position: sticky; top: 0; z-index: 10; }
  .topbar h1 { font-size: 19px; font-weight: 700; color: #1e2a3a; }
  .topbar .subtitle { font-size: 12.5px; color: #8b95a5; margin-top: 2px; }
  .topbar-right { display: flex; align-items: center; gap: 16px; }
  .topbar-search { position: relative; }
  .topbar-search input { width: 240px; border: 1px solid #d8dde3; border-radius: 8px; padding: 9px 12px 9px 34px; font-size: 13px; outline: none; transition: border-color 0.2s; }
  .topbar-search input:focus { border-color: #17b8c4; }
  .topbar-search::before { content: ''; position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 12px; height: 12px; border: 2px solid #9aa4af; border-radius: 50%; }

  .btn-primary { background: linear-gradient(90deg, #17b8c4, #2f5a8a); color: #fff; border: none; padding: 10px 18px; border-radius: 8px; font-size: 13px; font-weight: 700; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: filter 0.2s, transform 0.15s; }
  .btn-primary:hover { filter: brightness(1.06); transform: translateY(-1px); }

  .content { padding: 26px 28px 60px; }

  .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 28px; }
  .stat-card { background: #fff; border: 1px solid #eef0f3; border-radius: 16px; padding: 20px 22px; box-shadow: 0 3px 14px rgba(20,30,50,0.04); display: flex; align-items: center; gap: 16px; }
  .stat-icon { width: 46px; height: 46px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; color: #fff; flex-shrink: 0; }
  .stat-card:nth-child(1) .stat-icon { background: linear-gradient(135deg, #17b8c4, #0e8b95); }
  .stat-card:nth-child(2) .stat-icon { background: linear-gradient(135deg, #ef9f27, #c97c0c); }
  .stat-card:nth-child(3) .stat-icon { background: linear-gradient(135deg, #1d9e75, #146e52); }
  .stat-card:nth-child(4) .stat-icon { background: linear-gradient(135deg, #e24b4a, #a82f2e); }
  .stat-value { font-size: 22px; font-weight: 800; color: #1e2a3a; line-height: 1.2; }
  .stat-label { font-size: 12.5px; color: #8b95a5; margin-top: 2px; }

  .table-card { background: #fff; border: 1px solid #eef0f3; border-radius: 16px; box-shadow: 0 3px 14px rgba(20,30,50,0.04); overflow: hidden; }
  .table-card-head { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px; padding: 20px 24px; border-bottom: 1px solid #eef0f3; }
  .table-card-head h2 { font-size: 16px; font-weight: 700; color: #1e2a3a; }
  .filter-tabs { display: flex; gap: 8px; flex-wrap: wrap; }
  .filter-tab { font-size: 12.5px; font-weight: 700; padding: 8px 14px; border-radius: 20px; border: 1px solid #e2e6eb; background: #fff; color: #5a6b7d; cursor: pointer; text-decoration: none; display: inline-block; transition: background 0.2s, color 0.2s, border-color 0.2s; }
  .filter-tab.active { background: linear-gradient(90deg, #17b8c4, #2f5a8a); border-color: transparent; color: #fff; }

  table { width: 100%; border-collapse: collapse; }
  thead th { text-align: left; font-size: 11.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; color: #8b95a5; padding: 14px 24px; background: #f8fafc; border-bottom: 1px solid #eef0f3; white-space: nowrap; }
  thead th.th-expand { width: 40px; }
  tbody td { padding: 16px 24px; font-size: 13.5px; color: #333; border-bottom: 1px solid #f2f4f7; vertical-align: middle; }
  tbody tr.row-main:hover { background: #f8fafc; }

  .cell-nama { font-weight: 700; color: #1e2a3a; }
  .cell-no { font-family: monospace; font-size: 12.5px; color: #7a8896; }
  .cell-jenis { color: #444; }

  /* Tombol expand (mata) */
  .btn-expand {
    width: 30px; height: 30px; border-radius: 7px; border: 1px solid #e2e6eb; background: #fff;
    display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 13px; color: #5a6b7d;
    transition: background 0.2s, border-color 0.2s;
  }
  .btn-expand:hover { background: #f5f6fa; border-color: #17b8c4; color: #17b8c4; }
  .btn-expand.is-open { background: #17b8c4; border-color: #17b8c4; color: #fff; }

  /* Status jadi dropdown editable */
  .status-select {
    font-size: 11.5px; font-weight: 700; padding: 6px 10px; border-radius: 20px;
    border: 1.5px solid transparent; cursor: pointer; outline: none; font-family: inherit;
    appearance: none; -webkit-appearance: none;
    background-repeat: no-repeat; background-position: right 8px center; background-size: 10px; padding-right: 26px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23555'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
  }
  .status-select.status-menunggu { background-color: #eef0f3; color: #45505c; }
  .status-select.status-diproses { background-color: #faeeda; color: #854f0b; }
  .status-select.status-selesai  { background-color: #eaf3de; color: #27500a; }
  .status-select.status-ditolak  { background-color: #fcebeb; color: #791f1f; }
  .status-select:focus { border-color: #17b8c4; }

  .row-actions { display: flex; gap: 8px; }
  .icon-btn { width: 30px; height: 30px; border-radius: 7px; border: 1px solid #e2e6eb; background: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 13px; color: #5a6b7d; transition: background 0.2s, border-color 0.2s; text-decoration: none; }
  .icon-btn:hover { background: #f5f6fa; border-color: #17b8c4; color: #17b8c4; }
  .icon-btn.danger:hover { border-color: #e24b4a; color: #e24b4a; }

  /* Baris detail (expand) */
  tr.row-detail { display: none; }
  tr.row-detail.show { display: table-row; }
  tr.row-detail td { background: #f8fafc; padding: 0; border-bottom: 1px solid #eef0f3; }

  .detail-inner {
    padding: 20px 24px 24px 64px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
  }
  .detail-item { font-size: 13px; }
  .detail-item .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; color: #8b95a5; margin-bottom: 4px; }
  .detail-item .value { color: #222; }
  .detail-item .value.empty { color: #b0b8c1; font-style: italic; }
  .detail-item.full { grid-column: 1 / -1; }
  .detail-file-link { display: inline-flex; align-items: center; gap: 6px; color: #17b8c4; text-decoration: none; font-weight: 700; }
  .detail-file-link:hover { text-decoration: underline; }

  @media (max-width: 800px) {
    .detail-inner { grid-template-columns: 1fr; padding-left: 24px; }
  }

  .table-card-foot { display: flex; align-items: center; justify-content: space-between; padding: 16px 24px; font-size: 12.5px; color: #8b95a5; flex-wrap: wrap; gap: 12px; }

  @media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }

  @media (max-width: 900px) {
    .sidebar { position: fixed; left: -260px; z-index: 200; transition: left 0.2s; }
    .sidebar.open { left: 0; }
    .hamburger-admin { display: flex !important; }
    .sidebar-close-btn { display: flex !important; }
    table { display: block; overflow-x: auto; }
    .topbar-search { display: none; }
  }

  .hamburger-admin { display: none; width: 36px; height: 36px; border-radius: 8px; border: 1px solid #e2e6eb; background: #fff; align-items: center; justify-content: center; cursor: pointer; font-size: 16px; position: relative; z-index: 210; }

  .sidebar-backdrop { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 150; }
  .sidebar-backdrop.show { display: block; }
</style>
</head>
<body>

<div class="app">

  <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <img src="logo.png" alt="Logo">
      <span>Kantor Pertanahan<br>Admin Panel</span>
      <button type="button" id="sidebarClose" class="sidebar-close-btn" aria-label="Tutup menu">✕</button>
    </div>

    <nav class="sidebar-nav">
      <div class="sidebar-section-label">Menu</div>
      <a href="{{ route('admin') }}"><span class="ic">📊</span> Dashboard</a>
      <a href="{{ route('admin.pengajuan.index') }}" class="active"><span class="ic">📥</span> Data Pengajuan <span class="sidebar-badge">{{ $stats['total'] ?? 0 }}</span></a>
      <a href="{{ route('admin.formulir') }}"><span class="ic">📄</span> Data Formulir</a>
      <a href="{{ route('admin.pengguna') }}"><span class="ic">👥</span> Data Pengguna</a>

      <div class="sidebar-section-label">Lainnya</div>
      <a href="#"><span class="ic">📰</span> Berita &amp; Pengumuman</a>
      <a href="#"><span class="ic">⚙️</span> Pengaturan</a>
      <a href="/"><span class="ic">🌐</span> Lihat Situs Publik</a>
    </nav>

    <div class="sidebar-footer">
      <div class="sidebar-user">
        <div class="sidebar-user-avatar">AD</div>
        <div>
          <div class="sidebar-user-name">Admin Loket</div>
          <div class="sidebar-user-role">Administrator</div>
        </div>
      </div>
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="sidebar-logout" style="background:none; border:none; cursor:pointer;">Keluar</button>
      </form>
    </div>
  </aside>

  <div class="main">
    <div class="topbar">
      <div style="display:flex; align-items:center; gap:14px;">
        <div class="hamburger-admin" id="hamburgerAdmin">☰</div>
        <div>
          <h1>Data Pengajuan</h1>
          <div class="subtitle">Kelola seluruh pengajuan surat &amp; formulir dari masyarakat</div>
        </div>
      </div>
      <div class="topbar-right">
        <div class="topbar-search">
          <input type="text" id="cariPengajuan" placeholder="Cari nama pemohon..." value="{{ $cari ?? '' }}">
        </div>
      </div>
    </div>

    <div class="content">

      @if (session('success'))
        <div style="background:#eaf3de; color:#27500a; padding:12px 18px; border-radius:10px; font-size:13.5px; font-weight:600; margin-bottom:20px;">
          {{ session('success') }}
        </div>
      @endif

      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon">📥</div>
          <div><div class="stat-value">{{ $stats['total'] }}</div><div class="stat-label">Total Pengajuan</div></div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">⏳</div>
          <div><div class="stat-value">{{ $stats['diproses'] }}</div><div class="stat-label">Sedang Diproses</div></div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">✅</div>
          <div><div class="stat-value">{{ $stats['selesai'] }}</div><div class="stat-label">Selesai</div></div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">✕</div>
          <div><div class="stat-value">{{ $stats['ditolak'] }}</div><div class="stat-label">Ditolak</div></div>
        </div>
      </div>

      <div class="table-card">
        <div class="table-card-head">
          <h2>Daftar Pengajuan</h2>
          <div style="display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
            <div class="filter-tabs">
              <a href="{{ route('admin.pengajuan.index') }}" class="filter-tab {{ ($status ?? 'all') === 'all' ? 'active' : '' }}">Semua</a>
              <a href="{{ route('admin.pengajuan.index', ['status' => 'menunggu']) }}" class="filter-tab {{ ($status ?? '') === 'menunggu' ? 'active' : '' }}">Menunggu</a>
              <a href="{{ route('admin.pengajuan.index', ['status' => 'diproses']) }}" class="filter-tab {{ ($status ?? '') === 'diproses' ? 'active' : '' }}">Diproses</a>
              <a href="{{ route('admin.pengajuan.index', ['status' => 'selesai']) }}" class="filter-tab {{ ($status ?? '') === 'selesai' ? 'active' : '' }}">Selesai</a>
              <a href="{{ route('admin.pengajuan.index', ['status' => 'ditolak']) }}" class="filter-tab {{ ($status ?? '') === 'ditolak' ? 'active' : '' }}">Ditolak</a>
            </div>
            <a href="{{ route('admin.pengajuan.create') }}" class="btn-primary">+ Tambah Pengajuan</a>
          </div>
        </div>

        <table>
          <thead>
            <tr>
              <th class="th-expand"></th>
              <th>No. Registrasi</th>
              <th>Nama Pemohon</th>
              <th>Jenis Surat</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="tabelPengajuan">
            @forelse ($pengajuan as $item)
            <tr class="row-main" data-status="{{ $item->status }}" data-nama="{{ strtolower($item->nama_pemohon) }}">
              <td>
                <button type="button" class="btn-expand" data-target="detail-{{ $item->id }}" title="Lihat detail">👁️</button>
              </td>
              <td class="cell-no">{{ $item->no_registrasi }}</td>
              <td class="cell-nama">{{ $item->nama_pemohon }}</td>
              <td class="cell-jenis">{{ $item->jenis_surat }}</td>
              <td>{{ $item->tanggal_pengajuan->format('d M Y') }}</td>
              <td>
                <form action="{{ route('admin.pengajuan.updateStatus', $item) }}" method="POST" class="form-status">
                  @csrf
                  @method('PATCH')
                  <select name="status" class="status-select status-{{ $item->status }}" onchange="this.className = 'status-select status-' + this.value; this.form.submit();">
                    <option value="menunggu" {{ $item->status === 'menunggu' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                    <option value="diproses" {{ $item->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $item->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ $item->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                  </select>
                </form>
              </td>
              <td class="row-actions">
                <form action="{{ route('admin.pengajuan.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data pengajuan ini secara permanen?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="icon-btn danger" title="Hapus">🗑️</button>
                </form>
              </td>
            </tr>

            <tr class="row-detail" id="detail-{{ $item->id }}">
              <td colspan="7">
                <div class="detail-inner">
                  <div class="detail-item">
                    <div class="label">Email Pemohon</div>
                    <div class="value {{ $item->email_pemohon ? '' : 'empty' }}">{{ $item->email_pemohon ?? 'Tidak diisi' }}</div>
                  </div>
                  <div class="detail-item">
                    <div class="label">No. HP Pemohon</div>
                    <div class="value {{ $item->no_hp_pemohon ? '' : 'empty' }}">{{ $item->no_hp_pemohon ?? 'Tidak diisi' }}</div>
                  </div>
                  <div class="detail-item">
                    <div class="label">Tanggal Pengajuan</div>
                    <div class="value">{{ $item->tanggal_pengajuan->format('d F Y') }}</div>
                  </div>
                  <div class="detail-item full">
                    <div class="label">Keterangan</div>
                    <div class="value {{ $item->keterangan ? '' : 'empty' }}">{{ $item->keterangan ?? 'Tidak ada keterangan tambahan' }}</div>
                  </div>
                  <div class="detail-item">
                    <div class="label">File Dokumen</div>
                    <div class="value">
                      @if ($item->file_path)
                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="detail-file-link">📎 Lihat File</a>
                      @else
                        <span class="empty">Tidak ada file</span>
                      @endif
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center; padding:40px; color:#8b95a5;">Belum ada data pengajuan.</td></tr>
            @endforelse
          </tbody>
        </table>

        <div class="table-card-foot">
          <span>Menampilkan {{ $pengajuan->firstItem() ?? 0 }}–{{ $pengajuan->lastItem() ?? 0 }} dari {{ $pengajuan->total() }} data</span>
          <div>{{ $pengajuan->links() }}</div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  const sidebar = document.getElementById('sidebar');
  const backdrop = document.getElementById('sidebarBackdrop');
  function openSidebar() { sidebar.classList.add('open'); backdrop.classList.add('show'); }
  function closeSidebar() { sidebar.classList.remove('open'); backdrop.classList.remove('show'); }
  document.getElementById('hamburgerAdmin').addEventListener('click', () => {
    sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
  });
  document.getElementById('sidebarClose').addEventListener('click', closeSidebar);
  backdrop.addEventListener('click', closeSidebar);

  const cariInput = document.getElementById('cariPengajuan');
  let cariTimeout;
  cariInput.addEventListener('input', () => {
    clearTimeout(cariTimeout);
    cariTimeout = setTimeout(() => {
      const url = new URL(window.location.href);
      url.searchParams.set('cari', cariInput.value);
      window.location.href = url.toString();
    }, 600);
  });

  // Toggle baris detail saat ikon mata diklik
  document.querySelectorAll('.btn-expand').forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-target');
      const detailRow = document.getElementById(targetId);
      const isOpen = detailRow.classList.contains('show');

      document.querySelectorAll('.row-detail.show').forEach(row => row.classList.remove('show'));
      document.querySelectorAll('.btn-expand.is-open').forEach(b => b.classList.remove('is-open'));

      if (!isOpen) {
        detailRow.classList.add('show');
        btn.classList.add('is-open');
      }
    });
  });
</script>

</body>
</html>