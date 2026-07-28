<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengajuan</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f5f6fa;
    color: #222;
  }

  /* Hero besar dengan efek parallax */
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

  .hero-social {
    display: flex;
    gap: 14px;
  }

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

  /* Kartu putih konten utama */
  .content-card {
    position: relative;
    max-width: 1250px;
    margin: -80px auto 0;
    background: #fff;
    border-radius: 24px 24px 0 0;
    box-shadow: 0 -10px 30px rgba(0,0,0,0.08);
    padding: 50px 32px 70px;
    text-align: center;
    min-height: 60vh;
  }

  .content-card h1 {
    font-size: 30px;
    font-weight: 500;
    color: #1e2a3a;
    margin-bottom: 10px;
  }

  .content-card .subtitle {
    font-size: 15px;
    color: #555;
    margin-bottom: 36px;
  }

  /* Grid tombol layanan */
  .layanan-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px 20px;
    max-width: 1150px;
    margin: 0 auto;
    text-align: left;
  }

  .layanan-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    min-height: 56px;
    padding: 12px 18px;
    border: 1.5px solid #d8dde3;
    border-radius: 10px;
    background: #fff;
    color: #7b2fbe;
    font-size: 14.5px;
    font-weight: 700;
    text-decoration: none;
    line-height: 1.35;
    transition: background 0.2s, border-color 0.2s, transform 0.15s;
  }

  .layanan-btn:hover {
    background: #f6effa;
    border-color: #7b2fbe;
    transform: translateY(-2px);
  }

  @media (max-width: 900px) {
    .layanan-grid { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 768px) {
    .hero {
      background-attachment: scroll;
      min-height: 45vh;
    }
    .content-card { margin-top: -40px; }
  }

  @media (max-width: 520px) {
    .layanan-grid { grid-template-columns: 1fr; }
    .content-card { padding: 36px 18px 50px; }
    .content-card h1 { font-size: 24px; }
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
  <h1>Pengajuan</h1>
  <p class="subtitle">Silakan pilih jenis surat/formulir yang ingin diajukan di bawah ini:</p>

  <div class="layanan-grid">
    <a href="/surat-kuasa" class="layanan-btn">Surat Kuasa</a>
    <a href="#" class="layanan-btn">Surat Pernyataan Keaslian Sertipikat</a>
    <a href="#" class="layanan-btn">Surat Pernyataan Pemasangan Tanda Batas</a>
    <a href="#" class="layanan-btn">Surat Pernyataan Pelepasan</a>

    <a href="#" class="layanan-btn">Surat Pernyataan Penguasaan Fisik untuk Perpanjangan/Pembaruan Hak</a>
    <a href="#" class="layanan-btn">Surat Pernyataan Penguasaan Fisik untuk Pemberian Hak Pertama Kali</a>
    <a href="#" class="layanan-btn">Surat BPHTB</a>
    <a href="#" class="layanan-btn">Surat PPH</a>

    <a href="/formulir-permohonan" class="layanan-btn">Formulir Permohonan</a>
    <a href="/formulir-ptsl" class="layanan-btn">Formulir PTSL</a>
    <a href="/surat-pernyataan" class="layanan-btn">Semua Surat Pernyataan</a>
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

</body>
</html>