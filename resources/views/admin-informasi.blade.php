<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Informasi - Admin</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f6fa; color: #222; }

  .layout { display: flex; min-height: 100vh; }

  /* ===== SIDEBAR (disamakan dengan halaman admin lainnya) ===== */
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

  .sidebar-nav { list-style: none; padding: 16px 12px; flex: 1; overflow-y: auto; overflow-x: hidden; }

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

  /* ===== MAIN ===== */
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
  .hamburger-btn span { width: 20px; height: 2.5px; background: #1e3a5f; border-radius: 2px; }

  .topbar h1 { font-size: 18px; color: #1e2a3a; }
  .topbar p { font-size: 12px; color: #7a8896; margin-top: 2px; }

  .admin-profile { display: flex; align-items: center; gap: 10px; }
  .admin-profile img { width: 38px; height: 38px; border-radius: 50%; object-fit: cover; background: #eaf0f8; }
  .admin-profile .name { font-size: 13px; font-weight: 700; color: #1e2a3a; line-height: 1.3; }
  .admin-profile .role { font-size: 11px; color: #7a8896; }

  .content { padding: 28px; }

  /* ===== PANEL ===== */
  .panel {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #eef0f3;
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
  .panel-header h2 { font-size: 16px; color: #1e2a3a; }
  .panel-subtitle { font-size: 12px; color: #7a8896; margin-top: 3px; }

  .panel-header-actions { display: flex; gap: 10px; }

  #cariInformasi {
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 9px 12px;
    font-size: 13px;
    width: 200px;
  }
  #cariInformasi:focus { outline: none; border-color: #17b8c4; }

  .btn {
    border: none;
    border-radius: 8px;
    padding: 10px 16px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
  }
  .btn-primary { background: #17b8c4; color: #fff; }
  .btn-primary:hover { background: #129aa5; }
  .btn-secondary { background: #f1f3f6; color: #444; }
  .btn-secondary:hover { background: #e6e9ed; }

  /* ===== GRID KARTU BERITA ===== */
  .berita-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 18px;
    padding: 20px 22px;
  }

  .berita-card {
    border: 1px solid #eef0f3;
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    background: #fff;
    transition: box-shadow 0.2s;
  }
  .berita-card:hover { box-shadow: 0 6px 16px rgba(0,0,0,0.06); }

  .berita-thumb {
    width: 100%;
    height: 130px;
    background: #eef1f5;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  .berita-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
  .berita-thumb .placeholder { font-size: 30px; color: #b7bfc9; }

  .berita-body { padding: 14px 14px 12px; display: flex; flex-direction: column; gap: 6px; flex: 1; }

  .berita-judul { font-weight: 700; color: #1e2a3a; font-size: 14px; line-height: 1.35; }
  .berita-tanggal { font-size: 11.5px; color: #17b8c4; font-weight: 700; }
  .berita-isi {
    font-size: 12.5px;
    color: #7a8896;
    line-height: 1.5;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .aksi-group { display: flex; gap: 8px; margin-top: 8px; }
  .btn-aksi {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    border-radius: 8px;
    border: 1px solid #e2e6eb;
    background: #fff;
    cursor: pointer;
    padding: 8px 10px;
    font-size: 12.5px;
    font-weight: 600;
    font-family: inherit;
  }
  .btn-aksi.ubah { color: #2f5a8a; }
  .btn-aksi.ubah:hover { background: #eaf0f8; border-color: #2f5a8a; }
  .btn-aksi.hapus { color: #d63b3b; }
  .btn-aksi.hapus:hover { background: #fde9e9; border-color: #d63b3b; }

  .empty { padding: 40px; text-align: center; color: #888; font-size: 13.5px; grid-column: 1 / -1; }
  .empty span { display: block; font-size: 28px; margin-bottom: 8px; }

  /* ===== MODAL ===== */
  .modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(10,14,20,0.5);
    align-items: center;
    justify-content: center;
    padding: 20px;
    z-index: 500;
  }
  .modal-overlay.show { display: flex; }

  .modal-box {
    background: #fff;
    border-radius: 14px;
    width: 100%;
    max-width: 440px;
    max-height: 90vh;
    overflow-y: auto;
  }
  .modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 22px;
    border-bottom: 1px solid #f0f2f5;
  }
  .modal-header h3 { font-size: 16px; }
  .modal-close { background: none; border: none; font-size: 20px; cursor: pointer; color: #888; }
  .modal-body { padding: 22px; }
  .modal-footer { display: flex; justify-content: flex-end; gap: 10px; padding: 16px 22px; border-top: 1px solid #f0f2f5; }

  .form-group { margin-bottom: 14px; }
  .form-group label { display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; }
  .form-group input,
  .form-group select,
  .form-group textarea {
    width: 100%;
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 10px 12px;
    font-size: 13.5px;
    font-family: inherit;
  }
  .form-group input:focus,
  .form-group select:focus,
  .form-group textarea:focus { outline: none; border-color: #17b8c4; }
  .form-group textarea { min-height: 100px; resize: vertical; }

  .file-upload-box {
    border: 1.5px dashed #d8dde3;
    border-radius: 8px;
    padding: 14px;
    text-align: center;
    cursor: pointer;
  }
  .file-upload-box:hover { border-color: #17b8c4; background: #f6feff; }
  .file-upload-box input[type="file"] { display: none; }
  .file-upload-box .upload-icon { font-size: 20px; margin-bottom: 4px; }
  .file-upload-box .upload-text { font-size: 12px; color: #7a8896; }
  .file-upload-preview img {
    max-width: 100%;
    max-height: 140px;
    border-radius: 8px;
    display: block;
    margin: 0 auto 8px;
  }
  .btn-hapus-file {
    background: none;
    border: none;
    color: #d63b3b;
    font-size: 11.5px;
    text-decoration: underline;
    cursor: pointer;
  }

  .toast {
    position: fixed;
    bottom: 24px;
    right: 24px;
    background: #1e2a3a;
    color: #fff;
    padding: 12px 20px;
    border-radius: 10px;
    font-size: 13.5px;
    opacity: 0;
    transform: translateY(10px);
    transition: 0.25s;
  }
  .toast.show { opacity: 1; transform: translateY(0); }

  @media (max-width: 960px) {
    .admin-profile .name, .admin-profile .role { display: none; }
  }

  @media (max-width: 700px) {
    .content { padding: 18px; }
    .panel-header { flex-direction: column; align-items: stretch; }
    #cariInformasi { width: 100%; }
    .berita-grid { grid-template-columns: 1fr 1fr; padding: 16px; gap: 12px; }
  }

  @media (max-width: 460px) {
    .berita-grid { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<div class="layout">

  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <img src="{{ asset('images/logo.png') }}" alt="Logo Kantor Pertanahan">
      <span>Kantor Pertanahan<br>Admin Panel</span>
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
      <li><a href="{{ url('/admin/informasi') }}" class="active"><span class="icon">ℹ️</span> Informasi</a></li>
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
        <button class="hamburger-btn" id="hamburgerBtn" title="Tampilkan/sembunyikan menu"><span></span><span></span><span></span></button>
        <div>
          <h1>Kelola Informasi</h1>
          <p>Tambah, ubah, atau hapus pengumuman/berita</p>
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

    <div class="content">
      <div class="panel">
        <div class="panel-header">
          <div>
            <h2>Daftar Informasi</h2>
            <p class="panel-subtitle">Berita/pengumuman ini akan tampil di halaman untuk masyarakat.</p>
          </div>
          <div class="panel-header-actions">
            <input type="text" id="cariInformasi" placeholder="Cari judul berita...">
            <button type="button" class="btn btn-primary" id="btnTambah">+ Tambah Berita</button>
          </div>
        </div>

        <div class="berita-grid" id="beritaGrid"></div>
      </div>
    </div>
  </div>
</div>

<!-- ===== MODAL TAMBAH / EDIT ===== -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">
    <div class="modal-header">
      <h3 id="modalTitle">Tambah Berita</h3>
      <button type="button" class="modal-close" id="modalClose">&times;</button>
    </div>
    <div class="modal-body">
      <form id="formInformasi">
        <input type="hidden" id="informasiId">

        <div class="form-group">
          <label>Gambar Berita</label>
          <div class="file-upload-box" id="fileUploadBox">
            <input type="file" id="fotoInformasi" accept="image/*">
            <div id="fileUploadPlaceholder">
              <div class="upload-icon">📤</div>
              <div class="upload-text">Klik untuk pilih gambar (JPG/PNG)</div>
            </div>
            <div class="file-upload-preview" id="fileUploadPreview" style="display:none;">
              <img id="previewImg" src="" alt="Pratinjau gambar">
              <button type="button" class="btn-hapus-file" id="btnHapusFoto">Hapus gambar, pilih ulang</button>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="judulInformasi">Judul Berita</label>
          <input type="text" id="judulInformasi" placeholder="Contoh: Jadwal Pelayanan Libur Nasional" required>
        </div>
        <div class="form-group">
          <label for="tanggalInformasi">Tanggal Terbit</label>
          <input type="date" id="tanggalInformasi" required>
        </div>
        <div class="form-group">
          <label for="isiInformasi">Isi Berita</label>
          <textarea id="isiInformasi" placeholder="Tulis isi berita yang akan dibaca masyarakat..." required></textarea>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" id="btnBatal">Batal</button>
      <button type="button" class="btn btn-primary" id="btnSimpan">Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
  // Data dummy, belum tersambung database.
  // Nanti diganti data dari Controller + route store/update/destroy.
  // Kolom "foto" sementara disimpan sebagai data URL (base64) karena
  // belum ada penyimpanan file di server.
  let dataList = [
    { id: 1, judul: 'Jadwal Pelayanan Libur Nasional', tanggal: '2026-07-15', isi: 'Kantor tutup pada tanggal libur nasional.', foto: null },
    { id: 2, judul: 'Perpanjangan Layanan PTSL', tanggal: '2026-07-10', isi: 'Program PTSL diperpanjang tahun ini.', foto: null },
    { id: 3, judul: 'Cara Ajukan Permohonan Online', tanggal: '2026-07-01', isi: 'Isi formulir lalu unggah berkas secara digital.', foto: null },
  ];
  let nextId = dataList.length + 1;

  const grid = document.getElementById('beritaGrid');
  const cari = document.getElementById('cariInformasi');

  function formatTanggal(tgl) {
    if (!tgl) return '-';
    return new Date(tgl + 'T00:00:00').toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
  }

  function render() {
    const keyword = cari.value.toLowerCase();
    const filtered = dataList.filter(d => d.judul.toLowerCase().includes(keyword));
    grid.innerHTML = '';

    if (filtered.length === 0) {
      grid.innerHTML = `
        <div class="empty">
          <span>📭</span>
          Belum ada berita. Klik tombol "+ Tambah Berita" di atas untuk membuat yang pertama.
        </div>
      `;
      return;
    }

    filtered.forEach(d => {
      const card = document.createElement('div');
      card.className = 'berita-card';
      card.innerHTML = `
        <div class="berita-thumb">
          ${d.foto
            ? `<img src="${d.foto}" alt="${d.judul}">`
            : `<span class="placeholder">🖼️</span>`}
        </div>
        <div class="berita-body">
          <div class="berita-judul">${d.judul}</div>
          <div class="berita-tanggal">${formatTanggal(d.tanggal)}</div>
          <div class="berita-isi">${d.isi}</div>
          <div class="aksi-group">
            <button type="button" class="btn-aksi ubah" data-action="edit" data-id="${d.id}">✏️ Ubah</button>
            <button type="button" class="btn-aksi hapus" data-action="hapus" data-id="${d.id}">🗑️ Hapus</button>
          </div>
        </div>
      `;
      grid.appendChild(card);
    });
  }

  cari.addEventListener('input', render);

  // ===== MODAL =====
  const modalOverlay = document.getElementById('modalOverlay');
  const modalTitle = document.getElementById('modalTitle');
  const fId = document.getElementById('informasiId');
  const fJudul = document.getElementById('judulInformasi');
  const fTanggal = document.getElementById('tanggalInformasi');
  const fIsi = document.getElementById('isiInformasi');

  // ===== Upload gambar =====
  const fileUploadBox = document.getElementById('fileUploadBox');
  const fotoInput = document.getElementById('fotoInformasi');
  const fileUploadPlaceholder = document.getElementById('fileUploadPlaceholder');
  const fileUploadPreview = document.getElementById('fileUploadPreview');
  const previewImg = document.getElementById('previewImg');
  const btnHapusFoto = document.getElementById('btnHapusFoto');
  let fFoto = null;

  function tampilkanPreview(src) {
    previewImg.src = src;
    fileUploadPlaceholder.style.display = 'none';
    fileUploadPreview.style.display = 'block';
  }

  function resetUploadBox() {
    fFoto = null;
    fotoInput.value = '';
    fileUploadPlaceholder.style.display = 'block';
    fileUploadPreview.style.display = 'none';
  }

  fileUploadBox.addEventListener('click', e => {
    if (e.target === btnHapusFoto) return;
    if (fileUploadPreview.style.display === 'block') return;
    fotoInput.click();
  });

  fotoInput.addEventListener('change', () => {
    const file = fotoInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = () => {
      fFoto = reader.result;
      tampilkanPreview(fFoto);
    };
    reader.readAsDataURL(file);
  });

  btnHapusFoto.addEventListener('click', e => {
    e.stopPropagation();
    resetUploadBox();
  });

  function bukaTambah() {
    modalTitle.textContent = 'Tambah Berita';
    fId.value = '';
    fJudul.value = '';
    fTanggal.value = new Date().toISOString().slice(0, 10);
    fIsi.value = '';
    resetUploadBox();
    modalOverlay.classList.add('show');
    fJudul.focus();
  }

  function bukaEdit(id) {
    const item = dataList.find(d => d.id === id);
    if (!item) return;
    modalTitle.textContent = 'Ubah Berita';
    fId.value = item.id;
    fJudul.value = item.judul;
    fTanggal.value = item.tanggal;
    fIsi.value = item.isi;
    resetUploadBox();
    if (item.foto) {
      fFoto = item.foto;
      tampilkanPreview(item.foto);
    }
    modalOverlay.classList.add('show');
    fJudul.focus();
  }

  function tutupModal() { modalOverlay.classList.remove('show'); }

  document.getElementById('btnTambah').addEventListener('click', bukaTambah);
  document.getElementById('btnBatal').addEventListener('click', tutupModal);
  document.getElementById('modalClose').addEventListener('click', tutupModal);
  modalOverlay.addEventListener('click', e => { if (e.target === modalOverlay) tutupModal(); });

  document.getElementById('btnSimpan').addEventListener('click', () => {
    const judul = fJudul.value.trim();
    const isi = fIsi.value.trim();
    if (!judul) { fJudul.focus(); return; }
    if (!fTanggal.value) { fTanggal.focus(); return; }
    if (!isi) { fIsi.focus(); return; }

    const data = { judul, tanggal: fTanggal.value, isi, foto: fFoto };

    if (fId.value) {
      Object.assign(dataList.find(d => d.id === Number(fId.value)), data);
      showToast('Berita berhasil diperbarui.');
    } else {
      dataList.push({ id: nextId++, ...data });
      showToast('Berita berhasil ditambahkan.');
    }

    tutupModal();
    render();
  });

  // Diperbaiki: sebelumnya mencari class ".btn-icon" padahal tombol
  // di kartu pakai class ".btn-aksi", sehingga Ubah/Hapus tidak berfungsi.
  grid.addEventListener('click', e => {
    const btn = e.target.closest('.btn-aksi');
    if (!btn) return;
    const id = Number(btn.dataset.id);

    if (btn.dataset.action === 'edit') bukaEdit(id);

    if (btn.dataset.action === 'hapus') {
      const item = dataList.find(d => d.id === id);
      if (item && confirm(`Yakin ingin menghapus berita "${item.judul}"?`)) {
        dataList = dataList.filter(d => d.id !== id);
        render();
        showToast('Berita berhasil dihapus.');
      }
    }
  });

  // ===== TOAST =====
  let toastTimeout;
  function showToast(msg) {
    const toast = document.getElementById('toast');
    toast.textContent = msg;
    toast.classList.add('show');
    clearTimeout(toastTimeout);
    toastTimeout = setTimeout(() => toast.classList.remove('show'), 2200);
  }

  // ===== SIDEBAR TOGGLE =====
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

  render();
</script>

</body>
</html>
