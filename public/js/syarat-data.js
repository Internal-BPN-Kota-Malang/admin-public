// syarat-data.js
// Data persyaratan untuk setiap jenis formulir permohonan.
// Key HARUS SAMA PERSIS dengan atribut data-nama pada kartu di file HTML.
// Edit file ini untuk menambah/mengubah syarat tanpa menyentuh file HTML utama.

const syaratData = {
  "Formulir Permohonan Legalisir Sertipikat": [
    "Isi formulir yang telah disediakan",
    "Sertifikat asli",
    "Fotokopi sertifikat 3 rangkap (maksimal)",
    "Fotokopi KTP + KK pemilik sertifikat",
    "Fotokopi PBB 2026",
    "Surat kuasa asli bermaterai Rp 10.000",
    "Fotokopi KTP + KK penerima kuasa",
    "Hasil gambar geotagging dicetak berwarna, lokasi dan batas-batas (aplikasi GPS Map Camera)",
    "Share lokasi (shareloc)"
  ],

  "Formulir Permohonan Pengurusan Sertipikat": [
    "Blanko pengecekan sertifikat",
    "Sertifikat asli",
    "Fotokopi KTP + KK pemilik",
    "Surat Kuasa Asli bermaterai Rp 10.000 (jika dikuasakan)",
    "Fotokopi KTP + KK penerima kuasa",
    "Surat Pengantar dari Pejabat Pembuat Akta Tanah (PPAT), untuk pengecekan via pendaftaran online PPAT",
    "Hasil gambar geotagging dicetak berwarna, lokasi dan batas-batas (aplikasi GPS Map Camera)",
    "Share lokasi (shareloc)",
    "Legalisir dapat dilakukan di Notaris / Kantor yang mengeluarkan data"
  ],

  "Formulir Permohonan Pengambilan Sertipikat Tanah": [
    "Form Permohonan pengambilan / pencabutan berkas",
    "Fotokopi KTP & KK pemilik",
    "Surat Kuasa Asli bermaterai Rp 10.000 (jika dikuasakan)",
    "Model A asli",
    "Fotokopi KTP + KK penerima kuasa",
    "Untuk lembar tambahan: lampirkan permohonan yang akan ditempel (sertipikat asli), tuliskan PPAT/nama penerima kuasa, nomor HP, dan keperluan penambahan lembar",
    "Permohonan diserahkan di loket informasi untuk mendapatkan tanda terima"
  ],

  "Formulir Permohonan Pendaftaran Tanah": [
    "Blanko Peta Bidang + Permohonan Hak Milik (dibawa ke kelurahan) + Pendaftaran SK",
    "Risalah tanah asli",
    "Bukti pelepasan dan bukti perolehan lainnya asli (jika ada)",
    "Fotokopi KTP + KK pemilik",
    "Fotokopi legalisir PBB 2026",
    "Surat kuasa asli bermaterai Rp 10.000",
    "Fotokopi KTP + KK penerima kuasa",
    "Hasil gambar geotagging dicetak berwarna, lokasi dan batas-batas (aplikasi GPS Map Camera)",
    "Share lokasi (shareloc)",
    "Legalisir dapat dilakukan di Notaris / Kantor yang mengeluarkan data"
  ],

  "Formulir Permohonan Balik Nama Hak atas Tanah": [
    "Blanko balik nama",
    "Sertifikat asli + hasil pengecekan 3x cetak berwarna, beserta SPS dan tanda terima dokumen",
    "Akta peralihan hak asli + fotokopi (Akta Jual Beli / Hibah / Tukar Menukar / APHB / Ikrar Wakaf, sesuai jenis peralihan)",
    "Fotokopi KTP + KK para pihak (penjual & pembeli / pemberi & penerima) 2x",
    "Fotokopi Legalisir Buku Nikah / Akta Nikah (untuk jual beli)",
    "Fotokopi legalisir PBB 2026",
    "BPHTB asli + bukti bayar (di Bapenda)",
    "SSP asli + bukti bayar (di Kantor Pajak Pratama Utara/Selatan)",
    "Fotokopi NPWP pembeli (jika ada)",
    "Materai Rp 10.000 (2 lembar)",
    "Surat Kuasa Asli bermaterai Rp 10.000",
    "Fotokopi KTP + KK penerima kuasa 2x",
    "Hasil gambar geotagging dicetak berwarna, lokasi dan batas-batas (aplikasi GPS Map Camera)",
    "Share lokasi (shareloc)",
    "Legalisir dapat dilakukan di Notaris / Kantor yang mengeluarkan data",
    "Catatan: untuk Balik Nama Waris, sertakan Surat Keterangan Waris/APHW dan fotokopi legalisir Akta Kematian sebagai pengganti akta peralihan; syarat detail dapat berbeda per jenis peralihan, konfirmasi ke loket informasi"
  ],

  "Formulir Permohonan Pemecahan/Penggabungan Bidang Tanah": [
    "Blanko pemecahan/penggabungan diisi lengkap",
    "Hasil tapak kavling (untuk pemecahan)",
    "Hasil pengecekan (jika sertipikat elektronik)",
    "Sertifikat asli + fotokopi",
    "Fotokopi KTP + KK pemilik",
    "Surat Kuasa Asli bermaterai Rp 10.000",
    "Fotokopi KTP + KK penerima kuasa",
    "Fotokopi PBB 2026",
    "Hasil gambar geotagging dicetak berwarna, lokasi dan batas-batas (aplikasi GPS Map Camera)",
    "Share lokasi (shareloc)",
    "Legalisir dapat dilakukan di Notaris / Kantor yang mengeluarkan data",
    "Catatan: untuk pemecahan 5 bidang ke atas, tambahkan Hasil KRK-KKPR (diurus dahulu di PMPTSP) / fotokopi legalisir PKKPR"
  ],

  "Formulir Permohonan Roya Hak Tanggungan": [
    "Blanko roya",
    "Sertifikat asli",
    "Sertifikat Hak Tanggungan asli",
    "Surat roya asli bermaterai Rp 10.000",
    "Fotokopi KTP + KK pemilik",
    "Surat Kuasa Asli bermaterai Rp 10.000",
    "Fotokopi KTP + KK penerima kuasa",
    "Fotokopi PBB 2026",
    "Hasil gambar geotagging dicetak berwarna, lokasi dan batas-batas (aplikasi GPS Map Camera)",
    "Share lokasi (shareloc)",
    "Catatan: untuk Roya Lelang tambahkan fotokopi legalisir Risalah Lelang & Bukti Kwitansi Pelunasan; untuk Roya pemilik meninggal tambahkan fotokopi legalisir SPAW dan Akta Kematian serta KTP/KK seluruh ahli waris"
  ],


  "Formulir Permohonan Pengukuran Bidang Tanah": [
    "Blangko Peta Bidang",
    "Hasil Cekplot",
    "Risalah Tanah (fotokopi blanko konversi + fotokopi bukti perolehan)",
    "Fotokopi KTP + KK pemilik",
    "Surat Kuasa Asli bermaterai Rp 10.000",
    "Fotokopi KTP tetangga batas & saksi",
    "Fotokopi KTP + KK penerima kuasa",
    "Hasil gambar geotagging dicetak berwarna, lokasi dan batas-batas (aplikasi GPS Map Camera)",
    "Share lokasi (shareloc)",
    "Legalisir dapat dilakukan di Notaris / Kantor yang mengeluarkan data"
  ],

};

const defaultSyarat = [
  "Fotokopi KTP (dan KTP kuasa, jika dikuasakan)",
  "Fotokopi KK, bila diperlukan",
  "Sertipikat/bukti kepemilikan tanah",
  "Surat Kuasa bermaterai, jika dikuasakan",
  "Materai Rp 10.000",
  "2 orang saksi, untuk pernyataan tertentu",
  "Bukti bayar pajak terkait (BPHTB/PPh/PBB), jika berlaku",
  "Dokumen pendukung lain sesuai jenis permohonan, info dari petugas loket"
];