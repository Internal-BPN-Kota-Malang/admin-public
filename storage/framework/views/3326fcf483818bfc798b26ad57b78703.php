<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin - Kantor Pertanahan</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<?php
  // Disiapkan di sini (bukan langsung di CSS) supaya tidak ada tanda kutip
  // bertumpuk saat dipakai di background-image.
  $bgImage = asset('images/malang.jpg');
?>
<style>
  :root {
    --ink: #14213a;
    --navy-deep: #0e1f33;
    --navy: #16324d;
    --brass: #a9812f;
    --brass-light: #cba24f;
    --parchment: #f6f3ec;
    --paper: #fffdf9;
    --line: #e1dccd;
    --muted: #767267;
    --error: #a6402a;
    --error-bg: #fbeae5;
    --success: #2f6b4f;
    --success-bg: #e7f2ec;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'Inter', Arial, sans-serif;
    color: var(--ink);
    min-height: 100vh;
    background: var(--parchment);
  }

  .screen {
    min-height: 100vh;
    display: grid;
    grid-template-columns: minmax(0, 0.86fr) minmax(0, 1fr);
  }

  /* ===== PANEL KIRI — identitas instansi ===== */
  .panel-brand {
    position: relative;
    background-image:
      linear-gradient(160deg, rgba(14,31,51,0.92) 0%, rgba(22,50,77,0.88) 55%, rgba(28,63,95,0.85) 100%),
      url("<?php echo e($bgImage); ?>");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #eef2f5;
    padding: 56px 52px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
  }

  /* motif garis kontur, mengingatkan pada peta topografi/kadastral */
  .contour-lines {
    position: absolute;
    inset: 0;
    opacity: 0.16;
    pointer-events: none;
  }
  .contour-lines svg { width: 100%; height: 100%; }

  .brand-top {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .brand-mark {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    border: 1.5px solid rgba(203,162,79,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: rgba(203,162,79,0.14);
    font-family: 'Fraunces', serif;
    font-weight: 600;
    font-size: 14px;
    color: var(--brass-light);
    overflow: hidden;
  }
  .brand-mark img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .brand-name {
    font-size: 12.5px;
    letter-spacing: 1.6px;
    text-transform: uppercase;
    color: rgba(238,242,245,0.72);
    line-height: 1.5;
  }
  .brand-name strong {
    display: block;
    font-size: 14px;
    letter-spacing: 0.6px;
    color: #eef2f5;
  }

  .brand-mid {
    position: relative;
    z-index: 1;
    max-width: 360px;
  }

  .brand-eyebrow {
    font-size: 11.5px;
    letter-spacing: 2.2px;
    text-transform: uppercase;
    color: var(--brass-light);
    margin-bottom: 18px;
  }

  .brand-mid h1 {
    font-family: 'Fraunces', serif;
    font-weight: 600;
    font-size: 34px;
    line-height: 1.22;
    letter-spacing: -0.2px;
    margin-bottom: 18px;
  }

  .brand-mid p {
    font-size: 14.5px;
    line-height: 1.7;
    color: rgba(238,242,245,0.72);
  }

  .brand-bottom {
    position: relative;
    z-index: 1;
    display: flex;
    gap: 28px;
    padding-top: 24px;
    border-top: 1px solid rgba(238,242,245,0.14);
  }

  .coord-item .coord-label {
    font-size: 10.5px;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: rgba(238,242,245,0.5);
    margin-bottom: 4px;
  }
  .coord-item .coord-value {
    font-family: 'Fraunces', serif;
    font-size: 15px;
    color: #eef2f5;
    letter-spacing: 0.3px;
  }

  /* ===== PANEL KANAN — form login ===== */
  .panel-form {
    background: var(--paper);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px 32px;
  }

  .form-wrap { width: 100%; max-width: 372px; }

  .form-heading { margin-bottom: 32px; }

  .form-heading .eyebrow {
    font-size: 11.5px;
    letter-spacing: 1.8px;
    text-transform: uppercase;
    color: var(--brass);
    font-weight: 600;
    margin-bottom: 10px;
  }

  .form-heading h2 {
    font-family: 'Fraunces', serif;
    font-weight: 600;
    font-size: 26px;
    color: var(--ink);
    margin-bottom: 8px;
  }

  .form-heading p {
    font-size: 13.5px;
    color: var(--muted);
    line-height: 1.6;
  }

  .alert {
    border-radius: 8px;
    padding: 12px 14px;
    font-size: 13px;
    margin-bottom: 20px;
    border: 1px solid transparent;
  }
  .alert-error { background: var(--error-bg); color: var(--error); border-color: #f0cec4; }
  .alert-success { background: var(--success-bg); color: var(--success); border-color: #c9e4d5; }

  .field { margin-bottom: 20px; }

  .field label {
    display: block;
    font-size: 12.5px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 8px;
    letter-spacing: 0.1px;
  }

  .input-shell {
    position: relative;
    border: 1px solid var(--line);
    border-radius: 8px;
    background: var(--paper);
    transition: border-color 0.15s, box-shadow 0.15s;
  }
  .input-shell:focus-within {
    border-color: var(--navy);
    box-shadow: 0 0 0 3px rgba(22,50,77,0.08);
  }
  .input-shell.has-error { border-color: var(--error); }
  .input-shell.has-error:focus-within { box-shadow: 0 0 0 3px rgba(166,64,42,0.08); }

  .input-shell input {
    width: 100%;
    border: none;
    background: transparent;
    outline: none;
    font-family: inherit;
    font-size: 14px;
    padding: 12px 14px;
    color: var(--ink);
  }
  .input-shell input::placeholder { color: #b8b3a5; }

  .toggle-password {
    position: absolute;
    right: 6px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    font-size: 12px;
    letter-spacing: 0.3px;
    color: var(--muted);
    padding: 6px 8px;
    font-family: inherit;
    font-weight: 600;
  }
  .toggle-password:hover { color: var(--navy); }

  .field-error {
    font-size: 12px;
    color: var(--error);
    margin-top: 7px;
  }

  .field-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 26px;
  }

  .remember {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: var(--muted);
  }
  .remember input { width: 15px; height: 15px; accent-color: var(--navy); }

  .forgot-link {
    font-size: 13px;
    color: var(--navy);
    text-decoration: none;
    font-weight: 600;
    border-bottom: 1px solid transparent;
  }
  .forgot-link:hover { border-bottom-color: var(--navy); }

  .btn-submit {
    width: 100%;
    background: var(--navy);
    color: #fff;
    border: none;
    padding: 13px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    letter-spacing: 0.2px;
    transition: background 0.15s;
  }
  .btn-submit:hover { background: var(--navy-deep); }
  .btn-submit:focus-visible { outline: 2px solid var(--brass); outline-offset: 2px; }

  .form-footer {
    margin-top: 28px;
    padding-top: 22px;
    border-top: 1px solid var(--line);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .back-link {
    font-size: 13px;
    color: var(--muted);
    text-decoration: none;
  }
  .back-link:hover { color: var(--navy); }

  .copyright {
    font-size: 11.5px;
    color: #b8b3a5;
  }

  @media (max-width: 880px) {
    .screen { grid-template-columns: 1fr; }
    .panel-brand { padding: 40px 28px; min-height: 240px; }
    .brand-mid h1 { font-size: 26px; }
    .panel-form { padding: 40px 24px 56px; }
  }

  @media (prefers-reduced-motion: reduce) {
    * { transition: none !important; }
  }
</style>
</head>
<body>

<div class="screen">

  <!-- ===== PANEL KIRI ===== -->
  <aside class="panel-brand">
    <div class="contour-lines" aria-hidden="true">
      <svg viewBox="0 0 500 900" preserveAspectRatio="xMidYMid slice">
        <g fill="none" stroke="#cba24f" stroke-width="1">
          <path d="M-50,150 C 80,110 150,210 280,170 S 480,90 560,140" />
          <path d="M-50,350 C 90,320 170,390 300,350 S 470,270 560,330" />
          <path d="M-50,550 C 100,520 150,590 290,550 S 470,480 560,530" />
          <path d="M-50,750 C 90,720 160,790 290,750 S 480,690 560,740" />
        </g>
      </svg>
    </div>

    <div class="brand-top">
      <div class="brand-mark">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(file_exists(public_path('images/logo.png'))): ?>
          <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo Kantor Pertanahan">
        <?php else: ?>
          KP
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </div>
      <div class="brand-name">
        Panel Administrasi
        <strong>Kantor Pertanahan</strong>
      </div>
    </div>

    <div class="brand-mid">
      <div class="brand-eyebrow">Akses Terbatas</div>
      <h1>Kelola layanan pertanahan dengan satu pintu masuk.</h1>
      <p>Verifikasi pengajuan, kelola dokumen, dan pantau seluruh permohonan warga dari satu panel administrasi.</p>
    </div>

    <div class="brand-bottom">
      <div class="coord-item">
        <div class="coord-label">Wilayah Kerja</div>
        <div class="coord-value">Malang, Jawa Timur</div>
      </div>
    </div>
  </aside>

  <!-- ===== PANEL KANAN — FORM ===== -->
  <main class="panel-form">
    <div class="form-wrap">

      <div class="form-heading">
        <div class="eyebrow">Masuk</div>
        <h2>Selamat datang kembali</h2>
        <p>Masukkan email dan kata sandi administrator untuk melanjutkan.</p>
      </div>

      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="alert alert-success"><?php echo e(session('status')); ?></div>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="alert alert-error"><?php echo e($errors->first()); ?></div>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      <form method="POST" action="<?php echo e(url('/admin/login')); ?>" novalidate>
        <?php echo csrf_field(); ?>

        <div class="field">
          <label for="email">Email</label>
          <div class="input-shell <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <input
              type="email"
              id="email"
              name="email"
              value="<?php echo e(old('email')); ?>"
              placeholder="nama@kantorpertanahan.go.id"
              required
              autofocus
            >
          </div>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="field-error"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="field">
          <label for="password">Kata Sandi</label>
          <div class="input-shell <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Masukkan kata sandi"
              required
            >
            <button type="button" class="toggle-password" id="togglePassword">Lihat</button>
          </div>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="field-error"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="field-row">
          <label class="remember">
            <input type="checkbox" name="remember">
            Ingat saya
          </label>
        </div>

        <button type="submit" class="btn-submit">Masuk ke Panel Admin</button>
      </form>

      <div class="form-footer">
        <a href="<?php echo e(url('/')); ?>" class="back-link">&larr; Kembali ke beranda</a>
        <span class="copyright">&copy; <?php echo e(date('Y')); ?> Kantor Pertanahan</span>
      </div>

    </div>
  </main>

</div>

<script>
  document.getElementById('togglePassword').addEventListener('click', function () {
    const input = document.getElementById('password');
    const showing = input.type === 'text';
    input.type = showing ? 'password' : 'text';
    this.textContent = showing ? 'Lihat' : 'Sembunyikan';
  });
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\vina_coba\resources\views/admin-login.blade.php ENDPATH**/ ?>