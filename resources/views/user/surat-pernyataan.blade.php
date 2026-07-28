<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Surat Pernyataan</title>
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
    padding: 50px 32px 70px;
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
    margin: 0 auto 50px;
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
  .breadcrumb a { color: #17b8c4; text-decoration: none; font-weight: 600; }
  .breadcrumb a:hover { text-decoration: underline; }
  .breadcrumb .sep { color: #c2cad3; }

  .content-card .eyebrow {
    text-align: center;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #17b8c4;
    margin-bottom: 10px;
  }

  /* Kartu surat dengan bayangan lembut */
  .surat-list {
    max-width: 1150px;
    margin: 0 auto;
  }

  .surat-item {
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(20,30,50,0.05);
    padding: 44px;
    margin-bottom: 32px;
  }

  .surat-columns {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0;
  }

  .surat-col {
    padding: 0 28px;
  }

  .surat-col + .surat-col {
    border-left: 1px solid #eef0f3;
  }

  .surat-col-icon {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
    color: #fff;
    margin-bottom: 18px;
    box-shadow: 0 6px 14px rgba(0,0,0,0.12);
  }

  .surat-col:nth-child(1) .surat-col-icon { background: linear-gradient(135deg, #17b8c4, #0e8b95); }
  .surat-col:nth-child(2) .surat-col-icon { background: linear-gradient(135deg, #2f5a8a, #1e3a5f); }

  .surat-col h3 {
    font-size: 16px;
    font-weight: 800;
    color: #1e2a3a;
    margin-bottom: 16px;
    letter-spacing: 0.2px;
  }

  .surat-col ol {
    list-style: none;
    padding-left: 0;
    font-size: 13.5px;
    color: #444;
    line-height: 1.5;
    counter-reset: li-count;
  }

  .surat-col ol li {
    position: relative;
    padding: 0 0 12px 22px;
  }

  .surat-col ol li::before {
    content: counter(li-count);
    counter-increment: li-count;
    position: absolute;
    left: 0;
    top: 0;
    width: 16px;
    height: 16px;
    font-size: 10px;
    font-weight: 700;
    color: #7a8896;
    background: #f1f3f6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  @media (max-width: 800px) {
    .surat-columns { grid-template-columns: 1fr; gap: 32px; }
    .surat-col { padding: 0; }
    .surat-col + .surat-col { border-left: none; border-top: 1px solid #eef0f3; padding-top: 28px; }
    .surat-item { padding: 28px 22px; }
    .content-card h1 { font-size: 24px; }
  }

  /* ===== Daftar Dokumen: pencarian, isi online / unduh form kosong ===== */
  .dokumen-section-title {
    max-width: 1150px;
    margin: 0 auto 6px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #7b2fbe;
  }

  .dokumen-section-sub {
    max-width: 1150px;
    margin: 0 auto 20px;
    font-size: 13.5px;
    color: #7a8896;
  }

  .dokumen-search-wrap {
    max-width: 1150px;
    margin: 0 auto 22px;
    position: relative;
  }

  .dokumen-search-wrap svg {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    width: 17px;
    height: 17px;
    fill: #9aa4af;
    pointer-events: none;
  }

  .dokumen-search-input {
    width: 100%;
    border: 1.5px solid #e2e6eb;
    border-radius: 12px;
    padding: 13px 16px 13px 44px;
    font-size: 14px;
    font-family: inherit;
    color: #222;
    background: #fff;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .dokumen-search-input:focus {
    border-color: #7b2fbe;
    box-shadow: 0 0 0 3px rgba(123,47,190,0.1);
  }

  .dokumen-search-clear {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    width: 24px;
    height: 24px;
    border: none;
    background: #f1f3f6;
    border-radius: 50%;
    color: #7a8896;
    font-size: 14px;
    line-height: 1;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
  }

  .dokumen-search-clear:hover { background: #e5e8ec; }

  .dokumen-count {
    max-width: 1150px;
    margin: 0 auto 16px;
    font-size: 12.5px;
    color: #9aa4af;
  }

  .dokumen-grid {
    max-width: 1150px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
  }

  .dokumen-card {
    background: #fff;
    border: 1px solid #eef0f3;
    border-radius: 16px;
    padding: 20px 22px;
    box-shadow: 0 3px 14px rgba(20,30,50,0.04);
    display: flex;
    flex-direction: column;
    gap: 14px;
  }

  .dokumen-card-head {
    display: flex;
    align-items: flex-start;
    gap: 12px;
  }

  .dokumen-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: #f6efff;
    color: #7b2fbe;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
  }

  .dokumen-nama {
    font-size: 14.5px;
    font-weight: 700;
    color: #1e2a3a;
    line-height: 1.4;
    padding-top: 6px;
  }

  .dokumen-nama mark {
    background: #fde68a;
    color: inherit;
    border-radius: 3px;
    padding: 0 1px;
  }

  .dokumen-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }

  .dokumen-btn {
    flex: 1;
    min-width: 130px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    text-decoration: none;
    font-size: 12.5px;
    font-weight: 700;
    padding: 10px 14px;
    border-radius: 8px;
    transition: background 0.2s, border-color 0.2s, transform 0.15s;
  }

  .dokumen-btn svg { width: 14px; height: 14px; }

  .btn-isi-online {
    background: linear-gradient(90deg, #17b8c4, #2f5a8a);
    color: #fff;
  }
  .btn-isi-online:hover { filter: brightness(1.08); transform: translateY(-1px); }

  .btn-unduh {
    background: #fff;
    color: #7b2fbe;
    border: 1.5px solid #d8c3f0;
  }
  .btn-unduh:hover { background: #f6effa; border-color: #7b2fbe; }

  .dokumen-empty {
    max-width: 1150px;
    margin: 0 auto;
    text-align: center;
    padding: 50px 20px;
    color: #9aa4af;
    font-size: 14px;
    display: none;
  }

  .dokumen-empty svg {
    width: 40px;
    height: 40px;
    fill: #d5dae0;
    margin-bottom: 12px;
  }

  @media (max-width: 700px) {
    .dokumen-grid { grid-template-columns: 1fr; }
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
  <div class="breadcrumb"><a href="/pengajuan">Pengajuan</a> &nbsp;/&nbsp; Surat Pernyataan</div>

  <div class="eyebrow">Layanan Pertanahan</div>
  <h1>Surat Pernyataan</h1>
  <p class="subtitle">Berikut persyaratan umum dan daftar dokumen surat pernyataan yang dapat Anda ajukan secara online.</p>

  <div class="surat-list">

    <div class="surat-item">
      <div class="surat-columns">
        <div class="surat-col">
          <div class="surat-col-icon">📋</div>
          <h3>Persyaratan</h3>
          <ol>
            <li>Fotokopi KTP pemohon (dan KTP penerima kuasa jika dikuasakan).</li>
            <li>Fotokopi Kartu Keluarga (KK), jika diperlukan.</li>
            <li>Sertipikat asli/fotokopi sertipikat atau bukti kepemilikan tanah (girik, Letter C, dsb).</li>
            <li>Materai Rp 10.000.</li>
            <li>Disaksikan 2 orang saksi (untuk pernyataan yang memerlukan saksi).</li>
            <li>Bukti pembayaran pajak terkait (BPHTB/PPh), jika berlaku.</li>
          </ol>
        </div>
        <div class="surat-col">
          <div class="surat-col-icon">📄</div>
          <h3>Keterangan</h3>
          <ol>
            <li>Identitas diri pemohon (dan kuasa, jika dikuasakan).</li>
            <li>Data objek tanah: luas, letak, dan penggunaan tanah yang dimohon.</li>
            <li>Pernyataan tanah tidak dalam sengketa.</li>
            <li>Pernyataan penguasaan fisik/kepemilikan tanah secara sah.</li>
          </ol>
        </div>
      </div>
    </div>

  </div>

  <div class="dokumen-section-title">Daftar Dokumen</div>
  <p class="dokumen-section-sub">Cari, isi formulir secara online, atau unduh form kosong untuk diisi manual.</p>

  <div class="dokumen-search-wrap">
    <svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 1 0-.7.7l.27.28v.79l5 5L20.49 19l-5-5zm-6 0a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9z"/></svg>
    <input type="text" class="dokumen-search-input" id="dokumenSearch" placeholder="Cari nama dokumen, misal: balik nama, sertipikat, roya...">
    <button type="button" class="dokumen-search-clear" id="dokumenSearchClear" aria-label="Hapus pencarian">&times;</button>
  </div>

  <p class="dokumen-count" id="dokumenCount"></p>

  <div class="dokumen-grid" id="dokumenGrid">
    <div class="dokumen-card" data-nama="Surat Pernyataan Pengurusan Sertipikat">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Pengurusan Sertipikat</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-pengurusan-sertipikat" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-pengurusan-sertipikat.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Pengambilan Sertipikat Tanah">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Pengambilan Sertipikat Tanah</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-pengambilan-sertipikat" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-pengambilan-sertipikat.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Pendaftaran Tanah">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Pendaftaran Tanah</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-pendaftaran-tanah" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-pendaftaran-tanah.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Balik Nama Hak atas Tanah">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Balik Nama Hak atas Tanah</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-balik-nama" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-balik-nama.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Pemecahan/Penggabungan Bidang Tanah">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Pemecahan/Penggabungan Bidang Tanah</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-pemecahan-penggabungan" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-pemecahan-penggabungan.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Roya Hak Tanggungan">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Roya Hak Tanggungan</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-roya-hak-tanggungan" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-roya-hak-tanggungan.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Peningkatan Hak Atas Tanah">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Peningkatan Hak Atas Tanah</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-peningkatan-hak" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-peningkatan-hak.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Perpanjangan/Pembaruan Hak">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Perpanjangan/Pembaruan Hak</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-perpanjangan-hak" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-perpanjangan-hak.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Pengukuran Bidang Tanah">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Pengukuran Bidang Tanah</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-pengukuran-bidang" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-pengukuran-bidang.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>

    <div class="dokumen-card" data-nama="Surat Pernyataan Lainnya">
      <div class="dokumen-card-head">
        <div class="dokumen-icon">🔖</div>
        <div class="dokumen-nama">Surat Pernyataan Lainnya</div>
      </div>
      <div class="dokumen-actions">
        <a href="/isi-online/pernyataan-lainnya" class="dokumen-btn btn-isi-online">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25zM20.7 7.04a1 1 0 0 0 0-1.42l-2.34-2.34a1 1 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/></svg>
          Isi Online
        </a>
        <a href="/unduh-form/pernyataan-lainnya.pdf" class="dokumen-btn btn-unduh" download>
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          Unduh Form
        </a>
      </div>
    </div>
  </div>

  <div class="dokumen-empty" id="dokumenEmpty">
    <svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 1 0-.7.7l.27.28v.79l5 5L20.49 19l-5-5zm-6 0a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9z"/></svg>
    <div>Tidak ada dokumen yang cocok dengan pencarian Anda.</div>
  </div>
</div>

<footer class="site-footer" style="background:#dbe7f5;color:#1e2a3a;padding:48px 24px 24px;margin-top:20px;">
  <div style="max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:32px;">
    <div>
      <h3 style="font-size:15px;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:#1e3a5f;margin-bottom:16px;">Kantor Pertanahan</h3>
      <p style="font-size:14px;color:#33475b;line-height:1.7;">Melayani urusan pertanahan masyarakat secara profesional, transparan, dan online.</p>
    </div>

    <div>
      <h3 style="font-size:15px;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:#1e3a5f;margin-bottom:16px;">Kontak</h3>
      <div style="display:flex;align-items:flex-start;gap:10px;margin-bottom:12px;font-size:14px;color:#33475b;">
        <svg style="width:18px;height:18px;fill:#1e3a5f;flex-shrink:0;margin-top:2px;" viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.7 5.1 6.5 6.5l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.5.6.6 0 1 .4 1 1v3.6c0 .6-.4 1-1 1C10.6 21.1 2.9 13.4 2.9 3.9c0-.6.4-1 1-1H7.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.5.1.3 0 .7-.2 1l-2.3 2.3z"/></svg>
        <span>(0341) 123-4567</span>
      </div>
      <div style="display:flex;align-items:flex-start;gap:10px;margin-bottom:12px;font-size:14px;color:#33475b;">
        <svg style="width:18px;height:18px;fill:#1e3a5f;flex-shrink:0;margin-top:2px;" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
        <span>layanan@kantorpertanahan.go.id</span>
      </div>
      <div style="display:flex;align-items:flex-start;gap:10px;font-size:14px;color:#33475b;">
        <svg style="width:18px;height:18px;fill:#1e3a5f;flex-shrink:0;margin-top:2px;" viewBox="0 0 24 24"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg>
        <span>Jl. Raya Pertanahan No. 10, Malang, Jawa Timur</span>
      </div>
    </div>

    <div>
      <h3 style="font-size:15px;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:#1e3a5f;margin-bottom:16px;">Ikuti Kami</h3>
      <div style="display:flex;gap:12px;">
        <a href="#" style="width:36px;height:36px;border-radius:50%;background:#c3d6ec;display:flex;align-items:center;justify-content:center;"><svg style="width:16px;height:16px;fill:#1e3a5f;" viewBox="0 0 24 24"><path d="M23 4.9c-.8.4-1.7.6-2.6.8 1-.6 1.7-1.5 2-2.6-.9.5-1.9.9-3 1.1-.9-.9-2.1-1.5-3.4-1.5-2.6 0-4.7 2.1-4.7 4.7 0 .4 0 .7.1 1-3.9-.2-7.4-2.1-9.7-4.9-.4.7-.6 1.5-.6 2.3 0 1.6.8 3 2.1 3.9-.8 0-1.5-.2-2.1-.6v.1c0 2.3 1.6 4.2 3.8 4.6-.4.1-.8.2-1.2.2-.3 0-.6 0-.8-.1.6 1.9 2.3 3.2 4.4 3.3-1.6 1.3-3.6 2-5.8 2-.4 0-.8 0-1.1-.1 2.1 1.3 4.5 2.1 7.1 2.1 8.5 0 13.1-7 13.1-13.1v-.6c.9-.6 1.7-1.4 2.3-2.3z"/></svg></a>
        <a href="#" style="width:36px;height:36px;border-radius:50%;background:#c3d6ec;display:flex;align-items:center;justify-content:center;"><svg style="width:16px;height:16px;fill:#1e3a5f;" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z"/></svg></a>
        <a href="#" style="width:36px;height:36px;border-radius:50%;background:#c3d6ec;display:flex;align-items:center;justify-content:center;"><svg style="width:16px;height:16px;fill:#1e3a5f;" viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 2 .2 2.4.4.6.2 1 .6 1.5 1 .4.4.7.9 1 1.5.2.4.3 1.2.4 2.4.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 2-.4 2.4-.2.6-.6 1-1 1.5-.4.4-.9.7-1.5 1-.4.2-1.2.3-2.4.4-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-2-.2-2.4-.4-.6-.2-1-.6-1.5-1-.4-.4-.7-.9-1-1.5-.2-.4-.3-1.2-.4-2.4C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.9c.1-1.2.2-2 .4-2.4.2-.6.6-1 1-1.5.4-.4.9-.7 1.5-1 .4-.2 1.2-.3 2.4-.4C8.4 2.2 8.8 2.2 12 2.2zm0 1.8c-3.1 0-3.5 0-4.7.1-1 .1-1.6.2-1.9.3-.5.2-.8.4-1.2.8-.4.4-.6.7-.8 1.2-.1.3-.3.9-.3 1.9-.1 1.2-.1 1.6-.1 4.7s0 3.5.1 4.7c.1 1 .2 1.6.3 1.9.2.5.4.8.8 1.2.4.4.7.6 1.2.8.3.1.9.3 1.9.3 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c1-.1 1.6-.2 1.9-.3.5-.2.8-.4 1.2-.8.4-.4.6-.7.8-1.2.1-.3.3-.9.3-1.9.1-1.2.1-1.6.1-4.7s0-3.5-.1-4.7c-.1-1-.2-1.6-.3-1.9-.2-.5-.4-.8-.8-1.2-.4-.4-.7-.6-1.2-.8-.3-.1-.9-.3-1.9-.3-1.2-.1-1.6-.1-4.7-.1zm0 3.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9zm0 1.8a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4zm5.7-2a1.05 1.05 0 1 1-2.1 0 1.05 1.05 0 0 1 2.1 0z"/></svg></a>
      </div>
    </div>
  </div>

  <div style="max-width:1100px;margin:36px auto 0;padding-top:20px;border-top:1px solid #c3d6ec;text-align:center;font-size:13px;color:#4a5f78;">
    &copy; 2026 Kantor Pertanahan. Seluruh hak cipta dilindungi.
  </div>
</footer>

<script>
  const searchInput = document.getElementById('dokumenSearch');
  const clearBtn = document.getElementById('dokumenSearchClear');
  const grid = document.getElementById('dokumenGrid');
  const cards = Array.from(grid.querySelectorAll('.dokumen-card'));
  const emptyState = document.getElementById('dokumenEmpty');
  const countLabel = document.getElementById('dokumenCount');
  const totalCount = cards.length;

  function escapeRegExp(str) {
    return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  }

  function highlight(text, query) {
    if (!query) return text;
    const regex = new RegExp('(' + escapeRegExp(query) + ')', 'ig');
    return text.replace(regex, '<mark>$1</mark>');
  }

  function updateCount(visible) {
    if (visible === totalCount) {
      countLabel.textContent = totalCount + ' dokumen tersedia';
    } else {
      countLabel.textContent = 'Menampilkan ' + visible + ' dari ' + totalCount + ' dokumen';
    }
  }

  function runSearch() {
    const query = searchInput.value.trim();
    const queryLower = query.toLowerCase();
    let visibleCount = 0;

    clearBtn.style.display = query ? 'flex' : 'none';

    cards.forEach(card => {
      const nama = card.getAttribute('data-nama');
      const namaEl = card.querySelector('.dokumen-nama');
      const match = nama.toLowerCase().includes(queryLower);

      if (match) {
        card.style.display = '';
        namaEl.innerHTML = highlight(nama, query);
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    grid.style.display = visibleCount > 0 ? 'grid' : 'none';
    emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    updateCount(visibleCount);
  }

  searchInput.addEventListener('input', runSearch);

  clearBtn.addEventListener('click', function () {
    searchInput.value = '';
    searchInput.focus();
    runSearch();
  });

  updateCount(totalCount);
</script>

</body>
</html>