<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Isi Online - Permohonan Legalisir Sertipikat</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,500;8..60,600;8..60,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
    background: #eef1f7;
    color: #22262e;
    min-height: 100vh;
  }

  .page-shell { padding: 48px 20px 80px; }

  .letter-card {
    max-width: 720px;
    margin: 0 auto;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 1px 3px rgba(20,30,60,0.05), 0 16px 40px rgba(20,30,60,0.08);
    overflow: hidden;
  }

  .letter-topbar {
    background: linear-gradient(90deg, #17414f, #2a5a75);
    padding: 22px 44px;
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .letter-topbar .badge-icon {
    width: 34px; height: 34px;
    border-radius: 9px;
    background: rgba(255,255,255,0.15);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .letter-topbar .badge-icon svg { width: 18px; height: 18px; fill: #fff; }
  .letter-topbar .topbar-text .site { font-size: 11.5px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; color: rgba(255,255,255,0.75); }
  .letter-topbar .topbar-text .title { font-size: 14.5px; font-weight: 600; color: #fff; margin-top: 1px; }

  .wrap { padding: 40px 44px 44px; }

  h1 {
    font-family: 'Source Serif 4', Georgia, serif;
    font-size: 23px;
    font-weight: 600;
    color: #16202b;
    margin-bottom: 8px;
    letter-spacing: -0.2px;
  }
  .perihal {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #2a5a75;
    background: #eaf2f6;
    padding: 5px 12px;
    border-radius: 20px;
    margin-bottom: 28px;
  }

  .kepada {
    background: #f7f9fc;
    border-left: 3px solid #2a5a75;
    border-radius: 0 10px 10px 0;
    padding: 16px 20px;
    font-size: 13px;
    color: #3c4653;
    line-height: 1.65;
    margin-bottom: 30px;
  }
  .kepada .label { font-size: 10.5px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #8a95a3; margin-bottom: 6px; }
  .kepada .line-strong { font-weight: 600; color: #16202b; }

  .lead-text {
    font-size: 13.5px;
    color: #3c4653;
    margin-bottom: 22px;
  }

  form { display: block; }

  .field { margin-bottom: 26px; }
  .field label {
    display: block;
    font-size: 12.5px;
    font-weight: 600;
    color: #55606d;
    margin-bottom: 8px;
  }
  .field label .req { color: #d1495b; margin-left: 2px; }

  .field input[type="text"],
  .field input[type="date"],
  .field textarea,
  .field select {
    width: 100%;
    border: none;
    border-bottom: 1.5px solid #dde2ea;
    padding: 6px 2px 10px;
    font-size: 14.5px;
    font-family: inherit;
    color: #16202b;
    background: transparent;
    outline: none;
    transition: border-color 0.2s;
  }
  .field input:focus,
  .field textarea:focus,
  .field select:focus { border-bottom-color: #2a5a75; }
  .field input::placeholder, .field textarea::placeholder { color: #b7bfc9; }
  .field textarea { resize: vertical; min-height: 44px; border: 1.5px solid #dde2ea; border-radius: 8px; padding: 10px 12px; }
  .field textarea:focus { border-color: #2a5a75; }

  .field select {
    appearance: none;
    -webkit-appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%238a95a3'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 2px center;
    background-size: 18px;
    padding-right: 24px;
    cursor: pointer;
  }
  .field select:invalid { color: #b7bfc9; }

  .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 26px; }
  @media (max-width: 560px) { .field-row { grid-template-columns: 1fr; gap: 0; } }

  .radio-inline { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 4px; }
  .radio-inline label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 500;
    color: #3c4653;
    margin-bottom: 0;
    cursor: pointer;
    padding: 9px 14px;
    border: 1.5px solid #dde2ea;
    border-radius: 8px;
    transition: border-color 0.2s, background 0.2s;
  }
  .radio-inline label:has(input:checked) { border-color: #2a5a75; background: #f2f7f9; }
  .radio-inline input[type="radio"] { accent-color: #2a5a75; width: 15px; height: 15px; }

  .section-divider {
    border: none;
    border-top: 1px dashed #e2e6eb;
    margin: 6px 0 30px;
  }
  .section-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    color: #2a5a75;
    margin-bottom: 20px;
  }
  .section-label .num {
    width: 20px; height: 20px;
    border-radius: 50%;
    background: #2a5a75;
    color: #fff;
    font-size: 10.5px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  .conditional-block { display: none; }
  .conditional-block.show { display: block; }

  .closing-text {
    font-size: 13px;
    color: #3c4653;
    line-height: 1.7;
    margin: 28px 0 30px;
  }
  .closing-text .catatan {
    font-size: 11.5px;
    color: #9aa4af;
    margin-top: 7px;
    font-style: italic;
  }

  .error-text {
    color: #d1495b;
    font-size: 11px;
    margin-top: 6px;
    display: none;
  }
  .field.invalid input,
  .field.invalid textarea,
  .field.invalid select { border-bottom-color: #d1495b; }
  .field.invalid textarea { border-color: #d1495b; }
  .field.invalid .error-text { display: block; }

  .consent {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 12px;
    color: #6b7684;
    background: #f7f9fc;
    border-radius: 8px;
    padding: 12px 14px;
    margin: 4px 0 24px;
    line-height: 1.55;
  }
  .consent input { margin-top: 3px; accent-color: #2a5a75; }

  .form-actions { display: flex; gap: 12px; flex-wrap: wrap; align-items: center; }

  .btn-submit {
    background: linear-gradient(90deg, #2a5a75, #17414f);
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 13px 26px;
    font-size: 13.5px;
    font-weight: 600;
    cursor: pointer;
    transition: filter 0.2s, transform 0.15s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }
  .btn-submit:hover { filter: brightness(1.1); }
  .btn-submit:active { transform: translateY(1px); }
  .btn-submit:disabled { opacity: 0.6; cursor: not-allowed; }
  .btn-submit svg { width: 16px; height: 16px; fill: #fff; }

  .btn-cancel {
    background: #fff;
    color: #b5495b;
    border: 1.5px solid #f0d3d8;
    border-radius: 8px;
    padding: 13px 22px;
    font-size: 13.5px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s, border-color 0.2s;
  }
  .btn-cancel:hover { background: #fdf4f5; border-color: #e3aeb6; }

  /* Panel sukses */
  .success-panel { display: none; text-align: center; }
  .success-panel.show { display: block; }
  .success-icon {
    width: 52px; height: 52px; border-radius: 50%;
    background: #e6f3ea; color: #1e8a4c; font-size: 24px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px;
  }
  .success-panel h2 { font-family: 'Source Serif 4', Georgia, serif; font-size: 19px; color: #16202b; margin-bottom: 6px; }
  .success-panel > p { font-size: 13px; color: #6b7684; margin-bottom: 24px; line-height: 1.6; }
  .review-table {
    text-align: left;
    background: #f7f9fc;
    border: 1px solid #eef0f3;
    border-radius: 10px;
    padding: 18px 20px;
    margin-bottom: 24px;
  }
  .review-row {
    display: grid;
    grid-template-columns: 190px 1fr;
    gap: 10px;
    font-size: 12.5px;
    padding: 8px 0;
    border-bottom: 1px dashed #e2e6eb;
  }
  .review-row:last-child { border-bottom: none; }
  .review-label { color: #9aa4af; }
  .review-value { color: #16202b; font-weight: 500; }
  @media (max-width: 560px) { .review-row { grid-template-columns: 1fr; gap: 2px; } }

  .btn-secondary {
    background: #fff;
    color: #2a5a75;
    border: 1.5px solid #c9d8e0;
    border-radius: 8px;
    padding: 11px 20px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
  }
  .btn-secondary:hover { background: #f2f7f9; }

  .form-error-banner {
    display: none;
    background: #fdecec;
    border: 1px solid #f0c4c4;
    color: #a13030;
    font-size: 12.5px;
    border-radius: 8px;
    padding: 12px 14px;
    margin-bottom: 20px;
  }
  .form-error-banner.show { display: block; }

  .spinner {
    width: 14px; height: 14px;
    border: 2px solid rgba(255,255,255,0.4);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin 0.7s linear infinite;
    display: none;
  }
  .spinner.show { display: inline-block; }
  @keyframes spin { to { transform: rotate(360deg); } }

  @media (max-width: 600px) {
    .letter-topbar { padding: 18px 24px; }
    .wrap { padding: 30px 22px 34px; }
  }
</style>
</head>
<body>

<div class="page-shell">
<div class="letter-card">

  <div class="letter-topbar">
    <div class="badge-icon">
      <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
    </div>
    <div class="topbar-text">
      <div class="site">Kantor Pertanahan Kota Malang</div>
      <div class="title">Formulir Isi Online</div>
    </div>
  </div>

  <div class="wrap">

  <!-- ==== FORM ==== -->
  <div id="formWrap">
    <h1>Permohonan Legalisir Sertipikat</h1>
    <div class="perihal">
      <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
      Perihal: Permohonan Legalisir Sertipikat
    </div>

    <div class="kepada">
      <div class="label">Kepada</div>
      <div class="line-strong">Yth. Bapak Kepala Kantor Pertanahan Kota Malang</div>
      <div>U.p. Kepala Sub Bagian Tata Usaha</div>
      <div>Di Malang</div>
    </div>

    <div class="form-error-banner" id="formErrorBanner"></div>

    <form id="legalisirForm" novalidate>

      <div class="section-label"><span class="num">1</span>Data Pemohon</div>
      <div class="lead-text">Yang bertanda tangan di bawah ini:</div>

      <div class="field" data-field="nama_pemohon">
        <label>Nama<span class="req">*</span></label>
        <input type="text" name="nama_pemohon">
        <div class="error-text">Nama wajib diisi.</div>
      </div>

      <div class="field-row">
        <div class="field" data-field="tempat_lahir_pemohon">
          <label>Tempat Lahir<span class="req">*</span></label>
          <input type="text" name="tempat_lahir_pemohon">
          <div class="error-text">Tempat lahir wajib diisi.</div>
        </div>
        <div class="field" data-field="tanggal_lahir_pemohon">
          <label>Tanggal Lahir<span class="req">*</span></label>
          <input type="date" name="tanggal_lahir_pemohon">
          <div class="error-text">Tanggal lahir wajib diisi.</div>
        </div>
      </div>

      <div class="field" data-field="pekerjaan_pemohon">
        <label>Pekerjaan<span class="req">*</span></label>
        <input type="text" name="pekerjaan_pemohon">
        <div class="error-text">Pekerjaan wajib diisi.</div>
      </div>

      <div class="field" data-field="alamat_pemohon">
        <label>Alamat<span class="req">*</span></label>
        <textarea name="alamat_pemohon"></textarea>
        <div class="error-text">Alamat wajib diisi.</div>
      </div>

      <hr class="section-divider">

      <div class="section-label"><span class="num">2</span>Kapasitas Bertindak</div>
      <div class="field" data-field="status_bertindak">
        <label>Dalam hal ini bertindak untuk dan atas nama<span class="req">*</span></label>
        <div class="radio-inline">
          <label><input type="radio" name="status_bertindak" value="diri_sendiri" checked> Diri sendiri</label>
          <label><input type="radio" name="status_bertindak" value="kuasa"> Selaku kuasa dari</label>
        </div>
        <div class="error-text">Pilih salah satu.</div>
      </div>

      <div class="conditional-block" id="kuasaBlock">
        <div class="section-label"><span class="num">2a</span>Data Pihak yang Diwakili</div>

        <div class="field" data-field="nama_diwakili">
          <label>Nama<span class="req">*</span></label>
          <input type="text" name="nama_diwakili">
          <div class="error-text">Nama wajib diisi.</div>
        </div>

        <div class="field-row">
          <div class="field" data-field="tempat_lahir_diwakili">
            <label>Tempat Lahir<span class="req">*</span></label>
            <input type="text" name="tempat_lahir_diwakili">
            <div class="error-text">Tempat lahir wajib diisi.</div>
          </div>
          <div class="field" data-field="tanggal_lahir_diwakili">
            <label>Tanggal Lahir<span class="req">*</span></label>
            <input type="date" name="tanggal_lahir_diwakili">
            <div class="error-text">Tanggal lahir wajib diisi.</div>
          </div>
        </div>

        <div class="field" data-field="pekerjaan_diwakili">
          <label>Pekerjaan<span class="req">*</span></label>
          <input type="text" name="pekerjaan_diwakili">
          <div class="error-text">Pekerjaan wajib diisi.</div>
        </div>

        <div class="field" data-field="alamat_diwakili">
          <label>Alamat<span class="req">*</span></label>
          <textarea name="alamat_diwakili"></textarea>
          <div class="error-text">Alamat wajib diisi.</div>
        </div>
      </div>

      <hr class="section-divider">

      <div class="section-label"><span class="num">3</span>Detail Sertipikat</div>
      <div class="lead-text">Untuk mengajukan permohonan Legalisir Sertipikat:</div>

      <div class="field" data-field="jenis_sertipikat">
        <label>Jenis Sertipikat<span class="req">*</span></label>
        <select name="jenis_sertipikat">
          <option value="" disabled selected>Pilih jenis sertipikat</option>
          <option value="Hak Milik">Hak Milik</option>
          <option value="Hak Guna Bangunan">Hak Guna Bangunan</option>
          <option value="Hak Pakai">Hak Pakai</option>
          <option value="Wakaf">Wakaf</option>
          <option value="Satuan Atas Rumah Susun">Satuan Atas Rumah Susun</option>
        </select>
        <div class="error-text">Pilih jenis sertipikat.</div>
      </div>

      <div class="field-row">
        <div class="field" data-field="nomor_sertipikat">
          <label>Nomor Sertipikat<span class="req">*</span></label>
          <input type="text" name="nomor_sertipikat">
          <div class="error-text">Nomor sertipikat wajib diisi.</div>
        </div>
        <div class="field" data-field="kelurahan">
          <label>Kelurahan<span class="req">*</span></label>
          <input type="text" name="kelurahan">
          <div class="error-text">Kelurahan wajib diisi.</div>
        </div>
      </div>

      <div class="field" data-field="keperluan">
        <label>Yang akan saya pergunakan untuk Permohonan<span class="req">*</span></label>
        <input type="text" name="keperluan" placeholder="Contoh: pengajuan kredit bank">
        <div class="error-text">Keperluan wajib diisi.</div>
      </div>

      <div class="field" data-field="tanggal_pengajuan">
        <label>Tanggal Permohonan<span class="req">*</span></label>
        <input type="date" name="tanggal_pengajuan">
        <div class="error-text">Tanggal permohonan wajib diisi.</div>
      </div>

      <div class="closing-text">
        Demikian permohonan ini saya ajukan untuk dapat diproses sebagaimana mestinya.
        <div class="catatan">*) Coret salah satu — dipilih otomatis sesuai jawaban Anda di atas.</div>
      </div>

      <label class="consent">
        <input type="checkbox" id="consentCheck">
        <span>Saya menyatakan bahwa data yang saya isikan di atas adalah benar dan bertanggung jawab atas isinya.</span>
      </label>

      <div class="form-actions">
        <button type="submit" class="btn-submit" id="submitBtn">
          <span class="spinner" id="submitSpinner"></span>
          <svg viewBox="0 0 24 24" id="submitIcon"><path d="M5 20h14v-2H5v2zm14-9h-4V3H9v8H5l7 7 7-7z"/></svg>
          <span id="submitLabel">Buat &amp; Unduh PDF</span>
        </button>
        <button type="button" class="btn-cancel" id="cancelBtn">Batalkan</button>
      </div>
    </form>
  </div>

  <!-- ==== PANEL SUKSES ==== -->
  <div class="success-panel" id="successPanel">
    <div class="success-icon">✓</div>
    <h2>PDF Berhasil Dibuat</h2>
    <p>File PDF sudah otomatis terunduh. Berikut ringkasan data yang tercantum di formulir.</p>
    <div class="review-table" id="reviewTable"></div>
    <div class="form-actions" style="justify-content:center;">
      <button type="button" class="btn-secondary" onclick="resetForm()">Isi Permohonan Baru</button>
    </div>
  </div>

  </div>

</div>
</div>

<script>
  const form = document.getElementById('legalisirForm');
  const formWrap = document.getElementById('formWrap');
  const successPanel = document.getElementById('successPanel');
  const reviewTable = document.getElementById('reviewTable');
  const kuasaBlock = document.getElementById('kuasaBlock');
  const consentCheck = document.getElementById('consentCheck');
  const cancelBtn = document.getElementById('cancelBtn');
  const submitBtn = document.getElementById('submitBtn');
  const submitSpinner = document.getElementById('submitSpinner');
  const submitIcon = document.getElementById('submitIcon');
  const submitLabel = document.getElementById('submitLabel');
  const formErrorBanner = document.getElementById('formErrorBanner');

  // Ambil route dari data attribute agar mudah diganti tanpa edit JS
  // Isi otomatis oleh Blade: {{ route('pdf.legalisir.generate') }}
  const PDF_ENDPOINT = "{{ route('pdf.legalisir.generate') }}";
  const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').content;

  cancelBtn.addEventListener('click', function () {
    const hasInput = Array.from(form.querySelectorAll('input[type="text"], input[type="date"], textarea, select'))
      .some(el => el.value.trim());
    if (hasInput) {
      const sure = confirm('Batalkan pengisian formulir ini? Semua data yang sudah Anda isi akan dihapus.');
      if (!sure) return;
    }
    resetForm();
  });

  document.querySelectorAll('input[name="status_bertindak"]').forEach(radio => {
    radio.addEventListener('change', () => {
      const isKuasa = document.querySelector('input[name="status_bertindak"]:checked').value === 'kuasa';
      kuasaBlock.classList.toggle('show', isKuasa);
      kuasaBlock.querySelectorAll('input, textarea').forEach(el => el.required = isKuasa);
    });
  });

  function labelFor(name) {
    const map = {
      nama_pemohon: 'Nama Pemohon',
      tempat_lahir_pemohon: 'Tempat Lahir',
      tanggal_lahir_pemohon: 'Tanggal Lahir',
      pekerjaan_pemohon: 'Pekerjaan',
      alamat_pemohon: 'Alamat',
      status_bertindak: 'Bertindak Untuk',
      nama_diwakili: 'Nama yang Diwakili',
      tempat_lahir_diwakili: 'Tempat Lahir (Diwakili)',
      tanggal_lahir_diwakili: 'Tanggal Lahir (Diwakili)',
      pekerjaan_diwakili: 'Pekerjaan (Diwakili)',
      alamat_diwakili: 'Alamat (Diwakili)',
      jenis_sertipikat: 'Jenis Sertipikat',
      nomor_sertipikat: 'Nomor Sertipikat',
      kelurahan: 'Kelurahan',
      keperluan: 'Untuk Permohonan',
      tanggal_pengajuan: 'Tanggal Permohonan'
    };
    return map[name] || name;
  }

  function formatDate(value) {
    if (!value) return '';
    const [y, m, d] = value.split('-');
    return `${d}-${m}-${y}`;
  }

  function setLoading(isLoading) {
    submitBtn.disabled = isLoading;
    submitSpinner.classList.toggle('show', isLoading);
    submitIcon.style.display = isLoading ? 'none' : 'inline';
    submitLabel.textContent = isLoading ? 'Membuat PDF...' : 'Buat & Unduh PDF';
  }

  function showFormError(message) {
    formErrorBanner.textContent = message;
    formErrorBanner.classList.add('show');
  }

  function clearFormError() {
    formErrorBanner.classList.remove('show');
    formErrorBanner.textContent = '';
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    clearFormError();
    let valid = true;

    form.querySelectorAll('.field').forEach(fieldEl => {
      const isHidden = fieldEl.closest('.conditional-block') && !kuasaBlock.classList.contains('show');
      fieldEl.classList.remove('invalid');
      if (isHidden) return;

      const input = fieldEl.querySelector('input[type="text"], input[type="date"], textarea, select');
      const radios = fieldEl.querySelectorAll('input[type="radio"]');

      if (input && !input.value.trim()) {
        fieldEl.classList.add('invalid');
        valid = false;
      }
      if (radios.length && !fieldEl.querySelector('input[type="radio"]:checked')) {
        fieldEl.classList.add('invalid');
        valid = false;
      }
    });

    if (!consentCheck.checked) {
      valid = false;
      consentCheck.closest('.consent').style.color = '#d94f4f';
    } else {
      consentCheck.closest('.consent').style.color = '';
    }

    if (!valid) {
      const firstInvalid = form.querySelector('.invalid');
      if (firstInvalid) firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    const formData = new FormData(form);
    const data = {};
    for (const [key, value] of formData.entries()) data[key] = value;

    // Tampilkan ringkasan dulu di layar
    reviewTable.innerHTML = Object.entries(data).map(([key, value]) => {
      if (!value) return '';
      let displayValue = value;
      if (key.startsWith('tanggal')) displayValue = formatDate(value);
      if (key === 'status_bertindak') displayValue = value === 'kuasa' ? 'Selaku kuasa dari pihak lain' : 'Diri sendiri';
      return `<div class="review-row"><div class="review-label">${labelFor(key)}</div><div class="review-value">${displayValue}</div></div>`;
    }).join('');

    // Kirim ke server untuk digenerate jadi PDF via dompdf
    submitPdf(data);
  });

  async function submitPdf(data) {
    setLoading(true);
    try {
      const response = await fetch(PDF_ENDPOINT, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': CSRF_TOKEN
        },
        body: JSON.stringify(data)
      });

      if (!response.ok) {
        // Coba baca pesan error validasi dari Laravel (422) atau error lain
        let message = 'Terjadi kesalahan saat membuat PDF. Silakan coba lagi.';
        try {
          const errJson = await response.json();
          if (errJson.message) message = errJson.message;
          if (errJson.errors) {
            message = Object.values(errJson.errors).flat().join(' ');
          }
        } catch (_) {}
        throw new Error(message);
      }

      const blob = await response.blob();
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'permohonan-legalisir-sertipikat.pdf';
      document.body.appendChild(a);
      a.click();
      a.remove();
      window.URL.revokeObjectURL(url);

      formWrap.style.display = 'none';
      successPanel.classList.add('show');
      window.scrollTo({ top: 0, behavior: 'smooth' });

    } catch (err) {
      showFormError(err.message || 'Gagal terhubung ke server. Periksa koneksi Anda dan coba lagi.');
    } finally {
      setLoading(false);
    }
  }

  function resetForm() {
    form.reset();
    kuasaBlock.classList.remove('show');
    form.querySelectorAll('.field').forEach(f => f.classList.remove('invalid'));
    successPanel.classList.remove('show');
    clearFormError();
    formWrap.style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
</script>
</body>
</html>