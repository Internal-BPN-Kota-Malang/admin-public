<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
    @page {
        margin: 55px 65px;
    }
    body {
        font-family: "Times New Roman", Times, serif;
        font-size: 12px;
        color: #000;
        line-height: 1.4;
    }

    /* ===== NOMOR / PERIHAL ===== */
    .nomor-line {
        margin-left: 230px;
        margin-bottom: 2px;
    }
    .perihal-line {
        margin-bottom: 2px;
    }
    .perihal-line .perihal-val {
        font-style: italic;
        text-decoration: underline;
    }

    /* ===== BLOK KEPADA (bertingkat / staircase) ===== */
    .tujuan-block { margin-top: 2px; margin-bottom: 22px; }
    .tujuan-block div { margin: 0; }
    .tujuan-block .lvl0 { margin-left: 0; }
    .tujuan-block .lvl1 { margin-left: 32px; }
    .tujuan-block .lvl2 { margin-left: 64px; }
    .tujuan-block .lvl3 {
        margin-left: 95px;
        font-weight: bold;
        text-decoration: underline;
        letter-spacing: 1px;
    }

    .isi { text-align: justify; margin-bottom: 4px; }
    .lead-text { margin-bottom: 4px; }

    /* ===== TABEL DATA (Nama, TTL, Pekerjaan, Alamat) ===== */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin: 2px 0 16px 0;
    }
    .data-table td {
        vertical-align: top;
        padding: 1px 0;
    }
    .label-col { width: 118px; }
    .colon-col { width: 14px; }
    .dotline {
        display: inline-block;
        width: 100%;
        min-height: 13px;
    }
    .dotline.empty { border-bottom: 1px dotted #000; }
    .dotline.filled { border-bottom: none; }
    .dotline-blank {
        display: block;
        width: 100%;
        min-height: 13px;
        border-bottom: 1px dotted #000;
        margin-top: 1px;
    }

    .catatan {
        font-size: 11px;
        margin-top: 2px;
        margin-bottom: 30px;
    }
    .catatan .catatan-label { text-decoration: underline; }

    /* ===== TANDA TANGAN PEMOHON ===== */
    .ttd-wrap {
        width: 100%;
        border-collapse: collapse;
        margin-top: 4px;
        margin-bottom: 55px;
    }
    .ttd-spacer { width: 60%; }
    .ttd-box {
        width: 280px;
        text-align: center;
        vertical-align: top;
    }
    .ttd-nameline {
        display: block;
        width: 100%;
        border-bottom: 1px dotted #000;
        min-height: 46px;
        margin-top: 4px;
    }

    /* ===== KROS CHEK ===== */
    .kroscek-label { font-weight: bold; margin-bottom: 4px; }
    .kroscek-text {
        text-align: justify;
        font-style: italic;
        margin-bottom: 22px;
    }
    .petugas-wrap {
        width: 100%;
        border-collapse: collapse;
        margin-top: 4px;
    }
    .petugas-spacer { width: 45%; }
    .petugas-box {
        width: 300px;
        text-align: center;
        vertical-align: top;
    }
    .petugas-nameline {
        display: block;
        width: 100%;
        min-height: 46px;
        margin-top: 4px;
    }
</style>
</head>
<body>

    <?php
        $jenisList = ['Hak Milik', 'Hak Guna Bangunan', 'Hak Pakai', 'Wakaf', 'Satuan Atas Rumah Susun'];
        $isKuasa = ($data['status_bertindak'] ?? 'diri_sendiri') === 'kuasa';

        $tglLahirPemohon = !empty($data['tanggal_lahir_pemohon'])
            ? \Carbon\Carbon::parse($data['tanggal_lahir_pemohon'])->translatedFormat('d F Y')
            : '';
        $tglLahirDiwakili = !empty($data['tanggal_lahir_diwakili'])
            ? \Carbon\Carbon::parse($data['tanggal_lahir_diwakili'])->translatedFormat('d F Y')
            : '';
        $tglPengajuan = !empty($data['tanggal_pengajuan'])
            ? \Carbon\Carbon::parse($data['tanggal_pengajuan'])
            : null;

        $ttlPemohon = trim(($data['tempat_lahir_pemohon'] ?? '').($tglLahirPemohon ? ', '.$tglLahirPemohon : ''));
        $namaDiwakili = $isKuasa ? ($data['nama_diwakili'] ?? '') : '';
        $ttlDiwakili = $isKuasa ? trim(($data['tempat_lahir_diwakili'] ?? '').($tglLahirDiwakili ? ', '.$tglLahirDiwakili : '')) : '';
        $pekerjaanDiwakili = $isKuasa ? ($data['pekerjaan_diwakili'] ?? '') : '';
        $alamatDiwakili = $isKuasa ? ($data['alamat_diwakili'] ?? '') : '';
    ?>

    <!-- NOMOR & PERIHAL -->
    <div class="nomor-line">Nomor : &nbsp;/2-35.73.100/ &nbsp;/ <?php echo e(date('Y')); ?></div>
    <div class="perihal-line">Perihal : <span class="perihal-val">Permohonan Legalisir Sertipikat</span></div>

    <!-- BLOK KEPADA BERTINGKAT -->
    <div class="tujuan-block">
        <div class="lvl0">Kepada</div>
        <div class="lvl0">Yth. Bapak Kepala Kantor Pertanahan Kota Malang</div>
        <div class="lvl1">U.p. Kepala Sub Bagian Tata Usaha</div>
        <div class="lvl2">di</div>
        <div class="lvl3">M A L A N G</div>
    </div>

    <div class="lead-text">Dengan hormat,</div>
    <div class="lead-text">Yang bertanda tangan dibawah ini :</div>

    <!-- DATA PEMOHON -->
    <table class="data-table">
        <tr>
            <td class="label-col">Nama</td>
            <td class="colon-col">:</td>
            <td><span class="dotline <?php echo e(empty($data['nama_pemohon']) ? 'empty' : 'filled'); ?>"><?php echo e($data['nama_pemohon'] ?? ''); ?></span></td>
        </tr>
        <tr>
            <td class="label-col">Tempat/Tgl. Lahir</td>
            <td class="colon-col">:</td>
            <td><span class="dotline <?php echo e(empty($ttlPemohon) ? 'empty' : 'filled'); ?>"><?php echo e($ttlPemohon); ?></span></td>
        </tr>
        <tr>
            <td class="label-col">Pekerjaan</td>
            <td class="colon-col">:</td>
            <td><span class="dotline <?php echo e(empty($data['pekerjaan_pemohon']) ? 'empty' : 'filled'); ?>"><?php echo e($data['pekerjaan_pemohon'] ?? ''); ?></span></td>
        </tr>
        <tr>
            <td class="label-col">Alamat</td>
            <td class="colon-col">:</td>
            <td><span class="dotline <?php echo e(empty($data['alamat_pemohon']) ? 'empty' : 'filled'); ?>"><?php echo e($data['alamat_pemohon'] ?? ''); ?></span></td>
        </tr>
        <tr>
            <td class="label-col">&nbsp;</td>
            <td class="colon-col">&nbsp;</td>
            <td><span class="dotline-blank"></span></td>
        </tr>
    </table>

    <div class="isi">
        Dalam hal ini bertindak untuk dan atas nama
        <?php echo $isKuasa ? 'diri sendiri / <u>selaku kuasa dari</u>' : '<u>diri sendiri</u> / selaku kuasa dari'; ?> :
    </div>

    <!-- DATA PEMILIK / PIHAK DIWAKILI -->
    <table class="data-table">
        <tr>
            <td class="label-col">Nama</td>
            <td class="colon-col">:</td>
            <td><span class="dotline <?php echo e(empty($namaDiwakili) ? 'empty' : 'filled'); ?>"><?php echo e($namaDiwakili); ?></span></td>
        </tr>
        <tr>
            <td class="label-col">Tempat/Tgl. Lahir</td>
            <td class="colon-col">:</td>
            <td><span class="dotline <?php echo e(empty($ttlDiwakili) ? 'empty' : 'filled'); ?>"><?php echo e($ttlDiwakili); ?></span></td>
        </tr>
        <tr>
            <td class="label-col">Pekerjaan</td>
            <td class="colon-col">:</td>
            <td><span class="dotline <?php echo e(empty($pekerjaanDiwakili) ? 'empty' : 'filled'); ?>"><?php echo e($pekerjaanDiwakili); ?></span></td>
        </tr>
        <tr>
            <td class="label-col">Alamat</td>
            <td class="colon-col">:</td>
            <td><span class="dotline <?php echo e(empty($alamatDiwakili) ? 'empty' : 'filled'); ?>"><?php echo e($alamatDiwakili); ?></span></td>
        </tr>
        <tr>
            <td class="label-col">&nbsp;</td>
            <td class="colon-col">&nbsp;</td>
            <td><span class="dotline-blank"></span></td>
        </tr>
    </table>

    <div class="isi">
        Untuk mengajukan permohonan Legalisir Sertipikat
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $jenisList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jenis === ($data['jenis_sertipikat'] ?? '')): ?>
                <u><?php echo e($jenis); ?></u>
            <?php else: ?>
                <?php echo e($jenis); ?>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$loop->last): ?> / <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        *) Nomor : <?php echo e(!empty($data['nomor_sertipikat']) ? $data['nomor_sertipikat'] : '....................'); ?>

        / Kelurahan <?php echo e(!empty($data['kelurahan']) ? $data['kelurahan'] : '................................................'); ?>

        yang akan saya pergunakan untuk Permohonan
        <?php echo e(!empty($data['keperluan']) ? $data['keperluan'] : '........................................................................................'); ?>

    </div>

    <div class="catatan">
        <span class="catatan-label">Catatan</span> : *) Coret salah satu
    </div>

    <!-- TANDA TANGAN PEMOHON -->
    <table class="ttd-wrap">
        <tr>
            <td class="ttd-spacer">&nbsp;</td>
            <td class="ttd-box">
                Malang,
                <?php echo e($tglPengajuan ? $tglPengajuan->format('d') : '..........'); ?>

                -
                <?php echo e($tglPengajuan ? $tglPengajuan->format('m') : '..........'); ?>

                -
                <?php echo e($tglPengajuan ? $tglPengajuan->format('Y') : '..........'); ?>

                <br>
                Pemohon,
                <span class="ttd-nameline"><?php echo e($data['nama_pemohon'] ?? ''); ?></span>
            </td>
        </tr>
    </table>

    <!-- BAGIAN KROS CHEK (tetap kosong, diisi manual oleh petugas) -->
    <div>
        <div class="kroscek-label">Kros chek :</div>
        <div class="kroscek-text">
            &ldquo; Setelah dilakukan pengecekan dan penelitian oleh petugas Buku Tanah bahwa Sertipikat yang
            akan dilegalisir tersebut diatas dinyatakan tidak ada masalah atau sesuai dengan Arsip Buku Tanah
            yang ada (bersih) &rdquo;
        </div>

        <table class="petugas-wrap">
            <tr>
                <td class="petugas-spacer">&nbsp;</td>
                <td class="petugas-box">
                    Malang, &nbsp;/&nbsp;/&nbsp; &nbsp;jam : .............................. WIB
                    <span class="petugas-nameline"></span>
                    <strong>&ldquo; Petugas Buku Tanah &rdquo;</strong>
                </td>
            </tr>
        </table>
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\vina_coba\resources\views/pdf/legalisir-sertipikat.blade.php ENDPATH**/ ?>