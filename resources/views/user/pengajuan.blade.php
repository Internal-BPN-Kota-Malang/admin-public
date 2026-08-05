<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengajuan</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
  :root {
    --brand: #7b2fbe;
    --brand-soft: #f6effa;
  }

  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f5f6fa;
  }

  /* Hero dengan gambar latar */
  .hero {
    min-height: 60vh;
    background-image:
      linear-gradient(180deg, rgba(10,14,20,.45), rgba(10,14,20,.35) 50%, rgba(10,14,20,.6)),
      url('images/malang.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
  }

  .hero-social a {
    width: 32px;
    height: 32px;
    background: rgba(255,255,255,.15);
  }

  .hero-social a:hover { background: rgba(255,255,255,.3); }

  /* Kartu konten utama, ditarik naik menimpa hero */
  .content-card {
    margin-top: -80px;
    border-radius: 24px 24px 0 0;
  }

  /* Tombol layanan: pakai btn-outline Bootstrap + warna brand */
  .btn-layanan {
    --bs-btn-color: var(--brand);
    --bs-btn-border-color: #d8dde3;
    --bs-btn-hover-color: var(--brand);
    --bs-btn-hover-bg: var(--brand-soft);
    --bs-btn-hover-border-color: var(--brand);
    font-weight: 700;
    font-size: .95rem;
    min-height: 56px;
    transition: transform .15s ease, box-shadow .2s ease;
  }

  .btn-layanan:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(123,47,190,.15);
  }

  .btn-layanan i {
    opacity: 0;
    transform: translateX(-4px);
    transition: opacity .2s ease, transform .2s ease;
  }

  .btn-layanan:hover i {
    opacity: 1;
    transform: translateX(0);
  }

  /* Footer */
  .site-footer { background: #dbe7f5; }
  .site-footer a { color: #33475b; text-decoration: none; }
  .site-footer a:hover { color: #1e3a5f; text-decoration: underline; }
  .footer-social a {
    width: 36px; height: 36px;
    background: #c3d6ec; color: #1e3a5f;
  }
  .footer-social a:hover { background: #aecbe8; }
</style>
</head>
<body>

<!-- HERO -->
<section class="hero d-flex align-items-start p-4">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <span class="text-white fw-bold text-uppercase small" style="letter-spacing:1.5px;">Kantor Pertanahan</span>
    <div class="d-flex gap-2 hero-social">
      <a href="#" class="rounded-circle d-flex align-items-center justify-content-center text-white"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="rounded-circle d-flex align-items-center justify-content-center text-white"><i class="bi bi-facebook"></i></a>
      <a href="#" class="rounded-circle d-flex align-items-center justify-content-center text-white"><i class="bi bi-instagram"></i></a>
    </div>
  </div>
</section>

<!-- KONTEN -->
<div class="content-card bg-white shadow-lg mx-auto p-4 p-md-5 text-center" style="max-width:1250px;">
  <h1 class="fw-medium mb-2" style="color:#1e2a3a;">Pengajuan</h1>
  <p class="text-secondary mb-4">Silakan pilih jenis surat/formulir yang ingin diajukan di bawah ini:</p>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3 text-start mx-auto" style="max-width:1150px;">

    <div class="col"><a href="/formulir-permohonan" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Formulir Permohonan <i class="bi bi-arrow-right"></i></a></div>
    <div class="col"><a href="/surat-kuasa" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Surat Kuasa <i class="bi bi-arrow-right"></i></a></div>
    <div class="col"><a href="#" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Surat Pernyataan Keaslian Sertipikat <i class="bi bi-arrow-right"></i></a></div>
    <div class="col"><a href="#" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Surat Pernyataan Pemasangan Tanda Batas <i class="bi bi-arrow-right"></i></a></div>

    <div class="col"><a href="#" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Surat Pernyataan Pelepasan <i class="bi bi-arrow-right"></i></a></div>
    <div class="col"><a href="#" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Surat Pernyataan Penguasaan Fisik untuk Perpanjangan/Pembaruan Hak <i class="bi bi-arrow-right"></i></a></div>
    <div class="col"><a href="#" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Surat Pernyataan Penguasaan Fisik untuk Pemberian Hak Pertama Kali <i class="bi bi-arrow-right"></i></a></div>
    <div class="col"><a href="#" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Surat BPHTB <i class="bi bi-arrow-right"></i></a></div>

    <div class="col"><a href="#" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Surat PPH <i class="bi bi-arrow-right"></i></a></div>
    <div class="col"><a href="/formulir-ptsl" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Formulir PTSL <i class="bi bi-arrow-right"></i></a></div>
    <div class="col"><a href="/surat-pernyataan" class="btn btn-layanan btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center gap-2">Semua Surat Pernyataan <i class="bi bi-arrow-right"></i></a></div>

  </div>
</div>

<!-- FOOTER -->
<footer class="site-footer py-5 px-3 mt-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h3 class="fw-bold text-uppercase small mb-3" style="color:#1e3a5f; letter-spacing:1px;">Kantor Pertanahan</h3>
        <p class="text-secondary">Melayani urusan pertanahan masyarakat secara profesional, transparan, dan online.</p>
      </div>

      <div class="col-md-4">
        <h3 class="fw-bold text-uppercase small mb-3" style="color:#1e3a5f; letter-spacing:1px;">Kontak</h3>
        <p class="d-flex gap-2 mb-2"><i class="bi bi-telephone-fill" style="color:#1e3a5f;"></i> 0341717016</p>
        <p class="d-flex gap-2 mb-2"><i class="bi bi-envelope-fill" style="color:#1e3a5f;"></i> layanan@kantorpertanahan.go.id</p>
        <p class="d-flex gap-2"><i class="bi bi-geo-alt-fill" style="color:#1e3a5f;"></i> Jl. Danau Jonge I No.1, Madyopuro, Kec. Kedungkandang, Kota Malang, Jawa Timur 65138</p>
      </div>

      <div class="col-md-4">
        <h3 class="fw-bold text-uppercase small mb-3" style="color:#1e3a5f; letter-spacing:1px;">Ikuti Kami</h3>
        <div class="d-flex gap-2 footer-social">
          <a href="#" class="rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
          <a href="#" class="rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
    </div>

    <hr class="mt-4" style="border-color:#c3d6ec;">
    <p class="text-center small mb-0" style="color:#4a5f78;">&copy; 2026 Kantor Pertanahan. Seluruh hak cipta dilindungi.</p>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html> 