<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informasi - Cek Status Surat</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f5f6fa;
    color: #222;
  }

  /* Hero strip dengan topbar & parallax */
  .hero {
    position: relative;
    min-height: 70vh;
    display: flex;
    align-items: flex-start;
    padding: 24px 32px;
    background-image:
      linear-gradient(180deg, rgba(10,14,20,0.45) 0%, rgba(10,14,20,0.35) 50%, rgba(10,14,20,0.6) 100%),
      url('malang.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }

  .hero-topbar {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .hero-topbar .site-name {
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #fff;
  }

  .hero-social { display: flex; gap: 14px; }

  .hero-social a {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(255,255,255,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-decoration: none;
    transition: background 0.2s;
  }

  .hero-social a:hover { background: rgba(255,255,255,0.3); }
  .hero-social svg { width: 15px; height: 15px; fill: #fff; }

  @media (max-width: 768px) {
    .hero { background-attachment: scroll; min-height: 45vh; }
  }

  /* Kartu putih konten utama */
  .content-card {
    position: relative;
    max-width: 1250px;
    margin: -80px auto 0;
    background: #fff;
    border-radius: 24px 24px 0 0;
    box-shadow: 0 -10px 30px rgba(0,0,0,0.08);
    padding: 50px 32px 80px;
    min-height: 60vh;
  }

  @media (max-width: 768px) {
    .content-card { margin-top: -40px; }
  }

  .content-card h1 {
    font-size: 32px;
    font-weight: 500;
    color: #1e2a3a;
    text-align: center;
    margin-bottom: 8px;
  }

  .content-card .subtitle {
    font-size: 15px;
    color: #555;
    text-align: center;
    max-width: 700px;
    margin: 0 auto 40px;
  }

  .breadcrumb {
    max-width: 700px;
    margin: 0 auto 24px;
    font-size: 13px;
    color: #7a8896;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .breadcrumb a {
    color: #17b8c4;
    text-decoration: none;
    font-weight: 600;
    background: #eafbfc;
    padding: 4px 12px;
    border-radius: 20px;
    transition: background 0.2s;
  }
  .breadcrumb a:hover { background: #d5f4f6; }
  .breadcrumb .sep { color: #c2cad2; }
  .breadcrumb .current { font-weight: 600; color: #444; }

  /* Form cek status */
  .cek-wrap {
    max-width: 700px;
    margin: 0 auto 40px;
  }

  .cek-card {
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(30,42,58,0.06);
    padding: 40px 36px;
    overflow: hidden;
    position: relative;
  }

  .cek-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 6px;
    background: linear-gradient(90deg, #17b8c4, #7b2fbe);
  }

  .cek-card h2 {
    font-size: 21px;
    color: #1e2a3a;
    margin-bottom: 6px;
    font-weight: 700;
  }

  .cek-card .form-subtitle {
    font-size: 13px;
    color: #7a8896;
    margin-bottom: 28px;
  }

  .field { margin-bottom: 20px; }

  .field label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
  }

  .field select,
  .field input {
    width: 100%;
    border: 1px solid #d8dde3;
    border-radius: 8px;
    padding: 12px 14px;
    font-size: 14px;
    color: #222;
    font-family: inherit;
    outline: none;
    background: #fff;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .field select:focus,
  .field input:focus {
    border-color: #17b8c4;
    box-shadow: 0 0 0 3px rgba(23,184,196,0.12);
  }

  .btn-cek {
    width: 100%;
    background: linear-gradient(90deg, #17b8c4, #2f5a8a);
    color: #fff;
    border: none;
    padding: 14px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.3px;
    cursor: pointer;
    transition: filter 0.2s, transform 0.15s;
  }

  .btn-cek:hover { filter: brightness(1.08); transform: translateY(-1px); }

  .error-msg {
    font-size: 12px;
    color: #d85a30;
    margin-top: 6px;
    display: none;
  }

  /* Hasil status */
  .hasil-wrap {
    max-width: 700px;
    margin: 0 auto 20px;
    display: none;
  }

  .hasil-card {
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(30,42,58,0.06);
    padding: 30px 32px;
    border-left: 6px solid #9aa4af;
  }

  .hasil-card.status-diproses { border-left-color: #ef9f27; }
  .hasil-card.status-selesai { border-left-color: #1d9e75; }
  .hasil-card.status-ditolak { border-left-color: #e24b4a; }
  .hasil-card.status-notfound { border-left-color: #9aa4af; }

  .hasil-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }

  .hasil-jenis {
    font-size: 17px;
    font-weight: 700;
    color: #1e2a3a;
  }

  .status-pill {
    font-size: 12px;
    font-weight: 700;
    padding: 7px 16px;
    border-radius: 20px;
    letter-spacing: 0.3px;
    white-space: nowrap;
  }

  .status-diproses .status-pill { background: #faeeda; color: #854f0b; }
  .status-selesai .status-pill { background: #eaf3de; color: #27500a; }
  .status-ditolak .status-pill { background: #fcebeb; color: #791f1f; }
  .status-notfound .status-pill { background: #f1efe8; color: #444441; }

  .hasil-detail {
    font-size: 13.5px;
    color: #555;
  }

  .hasil-detail div {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #f0f2f5;
  }

  .hasil-detail div:last-child { border-bottom: none; }

  .hasil-detail span:first-child { color: #7a8896; }
  .hasil-detail span:last-child { font-weight: 600; color: #222; text-align: right; }

  .hasil-note {
    margin-top: 16px;
    font-size: 12.5px;
    color: #7a8896;
    line-height: 1.6;
    background: #f8fafc;
    padding: 12px 14px;
    border-radius: 10px;
  }

  @media (max-width: 700px) {
    .content-card { padding: 40px 20px 60px; }
    .content-card h1 { font-size: 24px; }
    .cek-card { padding: 30px 22px; }
  }

  /* ===== Footer biru soft ===== */
  .site-footer {
    background: #dbe7f5;
    color: #1e2a3a;
    padding: 48px 24px 24px;
  }

  .footer-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 32px;
  }

  .footer-col h3 {
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #1e3a5f;
    margin-bottom: 16px;
  }

  .footer-col p,
  .footer-col a {
    display: block;
    font-size: 14px;
    color: #33475b;
    text-decoration: none;
    line-height: 1.7;
  }

  .footer-col a:hover {
    color: #1e3a5f;
    text-decoration: underline;
  }

  .footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 12px;
  }

  .footer-contact-item svg {
    width: 18px;
    height: 18px;
    fill: #1e3a5f;
    flex-shrink: 0;
    margin-top: 2px;
  }

  .footer-social {
    display: flex;
    gap: 12px;
  }

  .footer-social a {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #c3d6ec;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
  }

  .footer-social a:hover { background: #aecbe8; }
  .footer-social svg { width: 16px; height: 16px; fill: #1e3a5f; }

  .footer-bottom {
    max-width: 1100px;
    margin: 36px auto 0;
    padding-top: 20px;
    border-top: 1px solid #c3d6ec;
    text-align: center;
    font-size: 13px;
    color: #4a5f78;
  }

</style>
</head>
<body>

<section class="hero">
  <div class="hero-topbar">
    <div class="site-name">Kantor Pertanahan</div>
    <div class="hero-social">
      <a href="#" aria-label="Twitter"><svg viewBox="0 0 24 24"><path d="M23 4.9c-.8.4-1.7.6-2.6.8 1-.6 1.7-1.5 2-2.6-.9.5-1.9.9-3 1.1-.9-.9-2.1-1.5-3.4-1.5-2.6 0-4.7 2.1-4.7 4.7 0 .4 0 .7.1 1-3.9-.2-7.4-2.1-9.7-4.9-.4.7-.6 1.5-.6 2.3 0 1.6.8 3 2.1 3.9-.8 0-1.5-.2-2.1-.6v.1c0 2.3 1.6 4.2 3.8 4.6-.4.1-.8.2-1.2.2-.3 0-.6 0-.8-.1.6 1.9 2.3 3.2 4.4 3.3-1.6 1.3-3.6 2-5.8 2-.4 0-.8 0-1.1-.1 2.1 1.3 4.5 2.1 7.1 2.1 8.5 0 13.1-7 13.1-13.1v-.6c.9-.6 1.7-1.4 2.3-2.3z"/></svg></a>
      <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z"/></svg></a>
      <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 2 .2 2.4.4.6.2 1 .6 1.5 1 .4.4.7.9 1 1.5.2.4.3 1.2.4 2.4.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 2-.4 2.4-.2.6-.6 1-1 1.5-.4.4-.9.7-1.5 1-.4.2-1.2.3-2.4.4-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-2-.2-2.4-.4-.6-.2-1-.6-1.5-1-.4-.4-.7-.9-1-1.5-.2-.4-.3-1.2-.4-2.4C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.9c.1-1.2.2-2 .4-2.4.2-.6.6-1 1-1.5.4-.4.9-.7 1.5-1 .4-.2 1.2-.3 2.4-.4C8.4 2.2 8.8 2.2 12 2.2zm0 1.8c-3.1 0-3.5 0-4.7.1-1 .1-1.6.2-1.9.3-.5.2-.8.4-1.2.8-.4.4-.6.7-.8 1.2-.1.3-.3.9-.3 1.9-.1 1.2-.1 1.6-.1 4.7s0 3.5.1 4.7c.1 1 .2 1.6.3 1.9.2.5.4.8.8 1.2.4.4.7.6 1.2.8.3.1.9.3 1.9.3 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c1-.1 1.6-.2 1.9-.3.5-.2.8-.4 1.2-.8.4-.4.6-.7.8-1.2.1-.3.3-.9.3-1.9.1-1.2.1-1.6.1-4.7s0-3.5-.1-4.7c-.1-1-.2-1.6-.3-1.9-.2-.5-.4-.8-.8-1.2-.4-.4-.7-.6-1.2-.8-.3-.1-.9-.3-1.9-.3-1.2-.1-1.6-.1-4.7-.1zm0 3.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9zm0 1.8a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4zm5.7-2a1.05 1.05 0 1 1-2.1 0 1.05 1.05 0 0 1 2.1 0z"/></svg></a>
    </div>
  </div>
</section>

<div class="content-card">
  <div class="breadcrumb"><a href="/">Beranda</a><span class="sep">/</span><span class="current">Informasi</span></div>

  <h1>Cek Status Surat</h1>
  <p class="subtitle">Pantau status pengajuan surat Anda dengan memasukkan jenis surat dan nama pemohon.</p>

  <div class="cek-wrap">
    <form class="cek-card" id="formCekStatus">
      <h2>Cek Status Pengajuan</h2>
      <p class="form-subtitle">Masukkan data di bawah untuk melihat status terkini pengajuan surat Anda.</p>

      <div class="field">
        <label for="jenis_surat">Jenis Surat</label>
        <select id="jenis_surat" required>
          <option value="" disabled selected>Pilih jenis surat</option>
          <option value="Surat Kuasa">Surat Kuasa</option>
          <option value="Surat Pernyataan Keaslian Sertipikat">Surat Pernyataan Keaslian Sertipikat</option>
          <option value="Surat Pernyataan Pemasangan Tanda Batas">Surat Pernyataan Pemasangan Tanda Batas</option>
          <option value="Surat Pernyataan Pelepasan">Surat Pernyataan Pelepasan</option>
          <option value="Surat Pernyataan Penguasaan Fisik Bidang Tanah untuk Perpanjangan/Pembaruan Hak">Surat Pernyataan Penguasaan Fisik Bidang Tanah untuk Perpanjangan/Pembaruan Hak</option>
          <option value="Surat Pernyataan Penguasaan Fisik Bidang Tanah untuk Pemberian Hak Pertama Kali">Surat Pernyataan Penguasaan Fisik Bidang Tanah untuk Pemberian Hak Pertama Kali</option>
          <option value="Surat BPHTB">Surat BPHTB</option>
          <option value="Surat PPH">Surat PPH</option>
          <option value="Formulir Permohonan">Formulir Permohonan</option>
          <option value="Formulir PTSL">Formulir PTSL</option>
        </select>
        <div class="error-msg" id="err_jenis">Silakan pilih jenis surat.</div>
      </div>

      <div class="field">
        <label for="nama_pengguna">Nama Yang Mengajukan</label>
        <input type="text" id="nama_pengguna" placeholder="Masukkan nama lengkap sesuai KTP">
        <div class="error-msg" id="err_nama">Nama tidak boleh kosong.</div>
      </div>

      <button type="submit" class="btn-cek">Cek Status</button>
    </form>
  </div>

  <div class="hasil-wrap" id="hasilWrap">
    <div class="hasil-card" id="hasilCard">
      <div class="hasil-top">
        <div class="hasil-jenis" id="hasilJenis">-</div>
        <span class="status-pill" id="hasilPill">-</span>
      </div>
      <div class="hasil-detail" id="hasilDetail"></div>
      <div class="hasil-note" id="hasilNote"></div>
    </div>
  </div>
</div>

<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-col">
      <h3>Kantor Pertanahan</h3>
      <p>Melayani urusan pertanahan masyarakat secara profesional, transparan, dan online.</p>
    </div>

    <div class="footer-col">
      <h3>Kontak</h3>
      <div class="footer-contact-item">
        <svg viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.7 5.1 6.5 6.5l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.5.6.6 0 1 .4 1 1v3.6c0 .6-.4 1-1 1C10.6 21.1 2.9 13.4 2.9 3.9c0-.6.4-1 1-1H7.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.5.1.3 0 .7-.2 1l-2.3 2.3z"/></svg>
        <span>0341717016</span>
      </div>
      <div class="footer-contact-item">
        <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
        <span>layanan@kantorpertanahan.go.id</span>
      </div>
      <div class="footer-contact-item">
        <svg viewBox="0 0 24 24"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg>
        <span>Jl. Danau Jonge I No.1, Madyopuro, Kec. Kedungkandang, Kota Malang, Jawa Timur 65138</span>
      </div>
    </div>

    <div class="footer-col">
      <h3>Ikuti Kami</h3>
      <div class="footer-social">
        <a href="#" aria-label="Twitter"><svg viewBox="0 0 24 24"><path d="M23 4.9c-.8.4-1.7.6-2.6.8 1-.6 1.7-1.5 2-2.6-.9.5-1.9.9-3 1.1-.9-.9-2.1-1.5-3.4-1.5-2.6 0-4.7 2.1-4.7 4.7 0 .4 0 .7.1 1-3.9-.2-7.4-2.1-9.7-4.9-.4.7-.6 1.5-.6 2.3 0 1.6.8 3 2.1 3.9-.8 0-1.5-.2-2.1-.6v.1c0 2.3 1.6 4.2 3.8 4.6-.4.1-.8.2-1.2.2-.3 0-.6 0-.8-.1.6 1.9 2.3 3.2 4.4 3.3-1.6 1.3-3.6 2-5.8 2-.4 0-.8 0-1.1-.1 2.1 1.3 4.5 2.1 7.1 2.1 8.5 0 13.1-7 13.1-13.1v-.6c.9-.6 1.7-1.4 2.3-2.3z"/></svg></a>
        <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z"/></svg></a>
        <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 2 .2 2.4.4.6.2 1 .6 1.5 1 .4.4.7.9 1 1.5.2.4.3 1.2.4 2.4.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 2-.4 2.4-.2.6-.6 1-1 1.5-.4.4-.9.7-1.5 1-.4.2-1.2.3-2.4.4-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-2-.2-2.4-.4-.6-.2-1-.6-1.5-1-.4-.4-.7-.9-1-1.5-.2-.4-.3-1.2-.4-2.4C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.9c.1-1.2.2-2 .4-2.4.2-.6.6-1 1-1.5.4-.4.9-.7 1.5-1 .4-.2 1.2-.3 2.4-.4C8.4 2.2 8.8 2.2 12 2.2zm0 1.8c-3.1 0-3.5 0-4.7.1-1 .1-1.6.2-1.9.3-.5.2-.8.4-1.2.8-.4.4-.6.7-.8 1.2-.1.3-.3.9-.3 1.9-.1 1.2-.1 1.6-.1 4.7s0 3.5.1 4.7c.1 1 .2 1.6.3 1.9.2.5.4.8.8 1.2.4.4.7.6 1.2.8.3.1.9.3 1.9.3 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c1-.1 1.6-.2 1.9-.3.5-.2.8-.4 1.2-.8.4-.4.6-.7.8-1.2.1-.3.3-.9.3-1.9.1-1.2.1-1.6.1-4.7s0-3.5-.1-4.7c-.1-1-.2-1.6-.3-1.9-.2-.5-.4-.8-.8-1.2-.4-.4-.7-.6-1.2-.8-.3-.1-.9-.3-1.9-.3-1.2-.1-1.6-.1-4.7-.1zm0 3.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9zm0 1.8a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4zm5.7-2a1.05 1.05 0 1 1-2.1 0 1.05 1.05 0 0 1 2.1 0z"/></svg></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    &copy; 2026 Kantor Pertanahan. Seluruh hak cipta dilindungi.
  </div>
</footer>

<script>
  /*
    CONTOH DATA (dummy) untuk simulasi tampilan.
    Di Laravel nanti, ganti bagian ini dengan pemanggilan API/database,
    misalnya lewat fetch() ke route seperti:
    GET /api/cek-status?jenis=...&nama=...
  */
  const dummyData = [
    { jenis: 'Surat Kuasa', nama: 'Budi Santoso', status: 'diproses', tanggal: '10 Juli 2026', noRegistrasi: 'SK-2026-0341', keterangan: 'Sedang diverifikasi petugas' },
    { jenis: 'Surat BPHTB', nama: 'Siti Aminah', status: 'selesai', tanggal: '2 Juli 2026', noRegistrasi: 'BPHTB-2026-0119', keterangan: 'Surat sudah bisa diambil di loket' },
    { jenis: 'Formulir PTSL', nama: 'Ahmad Fauzi', status: 'ditolak', tanggal: '5 Juli 2026', noRegistrasi: 'PTSL-2026-0072', keterangan: 'Dokumen persyaratan tidak lengkap' }
  ];

  const form = document.getElementById('formCekStatus');
  const hasilWrap = document.getElementById('hasilWrap');
  const hasilCard = document.getElementById('hasilCard');
  const hasilJenis = document.getElementById('hasilJenis');
  const hasilPill = document.getElementById('hasilPill');
  const hasilDetail = document.getElementById('hasilDetail');
  const hasilNote = document.getElementById('hasilNote');

  const statusLabel = {
    diproses: 'Sedang diproses',
    selesai: 'Selesai',
    ditolak: 'Ditolak',
    notfound: 'Data tidak ditemukan'
  };

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const jenisSelect = document.getElementById('jenis_surat');
    const namaInput = document.getElementById('nama_pengguna');
    const errJenis = document.getElementById('err_jenis');
    const errNama = document.getElementById('err_nama');

    let valid = true;
    if (!jenisSelect.value) {
      errJenis.style.display = 'block';
      valid = false;
    } else {
      errJenis.style.display = 'none';
    }

    if (!namaInput.value.trim()) {
      errNama.style.display = 'block';
      valid = false;
    } else {
      errNama.style.display = 'none';
    }

    if (!valid) return;

    const jenis = jenisSelect.value;
    const nama = namaInput.value.trim().toLowerCase();

    const found = dummyData.find(d =>
      d.jenis.toLowerCase() === jenis.toLowerCase() &&
      d.nama.toLowerCase() === nama
    );

    hasilCard.className = 'hasil-card';

    if (found) {
      hasilCard.classList.add('status-' + found.status);
      hasilJenis.textContent = found.jenis;
      hasilPill.textContent = statusLabel[found.status];
      hasilDetail.innerHTML = `
        <div><span>Nama pemohon</span><span>${found.nama}</span></div>
        <div><span>Nomor registrasi</span><span>${found.noRegistrasi}</span></div>
        <div><span>Tanggal pengajuan</span><span>${found.tanggal}</span></div>
        <div><span>Keterangan</span><span>${found.keterangan}</span></div>
      `;
      hasilNote.textContent = '';
    } else {
      hasilCard.classList.add('status-notfound');
      hasilJenis.textContent = jenisSelect.value;
      hasilPill.textContent = statusLabel.notfound;
      hasilDetail.innerHTML = `
        <div><span>Nama pengguna</span><span>${namaInput.value.trim()}</span></div>
      `;
      hasilNote.textContent = 'Pastikan nama dan jenis surat yang dimasukkan sudah sesuai dengan data saat pengajuan. Jika masih bermasalah, hubungi petugas loket.';
    }

    hasilWrap.style.display = 'block';
    hasilWrap.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
</script>

</body>
</html>