<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tentang Kami</title>
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
    .content-card { margin-top: -40px; padding: 40px 20px 60px; }
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
    max-width: 1150px;
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

  .section-wrap {
    max-width: 1150px;
    margin: 0 auto 60px;
  }

  .section-title {
    font-size: 22px;
    font-weight: 700;
    color: #1e2a3a;
    margin-bottom: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-title .dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: linear-gradient(135deg, #17b8c4, #7b2fbe);
  }

  /* Profil instansi */
  .profil-card {
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(30,42,58,0.06);
    padding: 36px;
    display: grid;
    grid-template-columns: 130px 1fr;
    gap: 28px;
    align-items: center;
  }

  .profil-logo {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    background: #fdf6ee;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
  }

  .profil-logo img { width: 100%; height: 100%; object-fit: cover; }
  .profil-logo-fallback {
    font-size: 15px; font-weight: 700; color: #1e3a5f; text-align: center;
  }

  .profil-text p {
    font-size: 14.5px;
    color: #444;
    line-height: 1.75;
    margin-bottom: 12px;
  }
  .profil-text p:last-child { margin-bottom: 0; }

  .visi-misi {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-top: 24px;
  }

  .visi-misi .box {
    background: #f8fafc;
    border-radius: 14px;
    padding: 22px 24px;
  }

  .visi-misi .box h3 {
    font-size: 15px;
    color: #17b8c4;
    margin-bottom: 10px;
    font-weight: 700;
  }

  .visi-misi .box p,
  .visi-misi .box ul {
    font-size: 13.5px;
    color: #444;
    line-height: 1.7;
    padding-left: 18px;
  }

  /* Berita terkini */
  .berita-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
  }

  .berita-card {
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(30,42,58,0.05);
    transition: transform 0.2s, box-shadow 0.2s;
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
  }

  .berita-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 26px rgba(30,42,58,0.12);
  }

  .berita-thumb {
    height: 150px;
    background: linear-gradient(135deg, #17b8c4, #2f5a8a);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 34px;
    color: rgba(255,255,255,0.85);
  }

  .berita-body { padding: 18px 20px 22px; flex: 1; display: flex; flex-direction: column; }

  .berita-tanggal {
    font-size: 11.5px;
    color: #17b8c4;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    margin-bottom: 8px;
  }

  .berita-judul {
    font-size: 15px;
    font-weight: 700;
    color: #1e2a3a;
    line-height: 1.4;
    margin-bottom: 8px;
  }

  .berita-ringkasan {
    font-size: 13px;
    color: #666;
    line-height: 1.6;
    flex: 1;
  }

  .berita-link {
    margin-top: 14px;
    font-size: 12.5px;
    font-weight: 700;
    color: #7b2fbe;
  }

  /* Lokasi / peta */
  .lokasi-wrap {
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(30,42,58,0.06);
    overflow: hidden;
  }

  .lokasi-info {
    padding: 26px 30px;
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eef0f3;
  }

  .lokasi-alamat h3 {
    font-size: 15px;
    color: #1e2a3a;
    margin-bottom: 6px;
    font-weight: 700;
  }

  .lokasi-alamat p {
    font-size: 13.5px;
    color: #555;
    line-height: 1.6;
    max-width: 480px;
  }

  .lokasi-buka {
    display: inline-block;
    background: linear-gradient(90deg, #17b8c4, #2f5a8a);
    color: #fff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    padding: 11px 20px;
    border-radius: 8px;
    transition: filter 0.2s;
    white-space: nowrap;
  }
  .lokasi-buka:hover { filter: brightness(1.08); }

  .lokasi-map iframe {
    width: 100%;
    height: 380px;
    border: none;
    display: block;
  }

  @media (max-width: 700px) {
    .profil-card { grid-template-columns: 1fr; text-align: center; }
    .profil-logo { margin: 0 auto; }
    .visi-misi { grid-template-columns: 1fr; }
    .lokasi-info { flex-direction: column; align-items: flex-start; }
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
  <div class="breadcrumb"><a href="/">Beranda</a><span class="sep">/</span><span class="current">Tentang Kami</span></div>

  <h1>Tentang Kami</h1>
  <p class="subtitle">Mengenal lebih dekat profil, berita terkini, dan lokasi Kantor Pertanahan kami.</p>

  <!-- Profil -->
  <div class="section-wrap">
    <div class="section-title"><span class="dot"></span> Profil Instansi</div>
    <div class="profil-card">
      <div class="profil-logo">
        <img src="logo.png" alt="Logo Kantor Pertanahan" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        <div class="profil-logo-fallback" style="display:none;">Kantor<br>Pertanahan</div>
      </div>
      <div class="profil-text">
        <p>Kantor Pertanahan adalah unit pelayanan yang bertugas menyelenggarakan urusan pertanahan di wilayah kerjanya, meliputi pendaftaran tanah, penerbitan sertipikat, serta pelayanan administrasi pertanahan lainnya bagi masyarakat.</p>
        <p>Kami berkomitmen memberikan pelayanan yang cepat, transparan, dan mudah diakses melalui layanan pengajuan online maupun tatap muka di kantor.</p>

        <div class="visi-misi">
          <div class="box">
            <h3>Visi</h3>
            <p>Menjadi lembaga pertanahan yang terpercaya, modern, dan melayani masyarakat dengan profesional.</p>
          </div>
          <div class="box">
            <h3>Misi</h3>
            <ul>
              <li>Memberikan kepastian hukum hak atas tanah.</li>
              <li>Meningkatkan kualitas pelayanan publik.</li>
              <li>Mendorong digitalisasi layanan pertanahan.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Berita Terkini -->
  <div class="section-wrap">
    <div class="section-title"><span class="dot"></span> Berita Terkini</div>
    <div class="berita-grid" id="beritaGrid">
      <a href="#" class="berita-card">
        <div class="berita-thumb">📰</div>
        <div class="berita-body">
          <div class="berita-tanggal">14 Juli 2026</div>
          <div class="berita-judul">Percepatan Program PTSL di Wilayah Kerja Tahun 2026</div>
          <div class="berita-ringkasan">Kantor Pertanahan menargetkan penyelesaian ribuan bidang tanah melalui program Pendaftaran Tanah Sistematis Lengkap tahun ini.</div>
          <div class="berita-link">Baca selengkapnya →</div>
        </div>
      </a>

      <a href="#" class="berita-card">
        <div class="berita-thumb">🖥️</div>
        <div class="berita-body">
          <div class="berita-tanggal">8 Juli 2026</div>
          <div class="berita-judul">Layanan Pengajuan Surat Kini Bisa Dilakukan Online</div>
          <div class="berita-ringkasan">Masyarakat kini dapat mengajukan berbagai jenis surat pernyataan dan formulir permohonan secara online tanpa perlu datang ke kantor.</div>
          <div class="berita-link">Baca selengkapnya →</div>
        </div>
      </a>

      <a href="#" class="berita-card">
        <div class="berita-thumb">📢</div>
        <div class="berita-body">
          <div class="berita-tanggal">1 Juli 2026</div>
          <div class="berita-judul">Jadwal Pelayanan Selama Libur Nasional</div>
          <div class="berita-ringkasan">Perhatikan penyesuaian jam operasional kantor selama periode libur nasional bulan ini.</div>
          <div class="berita-link">Baca selengkapnya →</div>
        </div>
      </a>
    </div>
  </div>

  <!-- Lokasi -->
  <div class="section-wrap" style="margin-bottom: 0;">
    <div class="section-title"><span class="dot"></span> Lokasi Kantor</div>
    <div class="lokasi-wrap">
      <div class="lokasi-info">
        <div class="lokasi-alamat">
          <h3>Kantor Pertanahan Kota Malang</h3>
          <p>Jl. Danau Jonge I No.1, Madyopuro, Kec. Kedungkandang, Kota Malang, Jawa Timur 65138.</p>
        </div>
        <a href="https://www.google.com/maps/place/Kantor+Pertanahan+Kota+Malang/@-7.9732825,112.6708892,17z" target="_blank" rel="noopener" class="lokasi-buka">Buka di Google Maps</a>
      </div>
      <div class="lokasi-map">
        <iframe
          src="https://www.google.com/maps?q=Kantor+Pertanahan+Kota+Malang&ll=-7.9732825,112.6708892&z=17&output=embed"
          allowfullscreen
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>

</div>

</body>
</html>