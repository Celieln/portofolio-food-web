<?php
/* ============================================================
 * KONFIGURASI SITUS RESTORAN — DapurNusantara
 * ============================================================ */

$namaResto = 'Dapur Nusantara';
$tagline   = 'Masakan Indonesia Autentik';
$promoStrip = 'Gratis ongkir untuk pesanan di atas Rp 200.000 • Buka setiap hari 09.00 - 22.00';

$menuMakanan = $menuMakananDefault = [
    ['id' => 1, 'nama' => 'Nasi Goreng Spesial', 'kategori' => 'Makanan', 'harga' => 35000, 'hargaAsli' => 0, 'label' => 'Terlaris', 'singkat' => 'NGS', 'warna' => ['#f97316', '#ea580c'], 'deskripsi' => 'Nasi goreng dengan ayam suwir, telur, ebi, dan sambal.'],
    ['id' => 2, 'nama' => 'Rendang Daging Sapi', 'kategori' => 'Makanan', 'harga' => 55000, 'hargaAsli' => 0, 'label' => '', 'singkat' => 'RD', 'warna' => ['#92400e', '#78350f'], 'deskripsi' => 'Daging sapi empuk dengan bumbu rendang khas Padang.'],
    ['id' => 3, 'nama' => 'Sate Ayam (10 tusuk)', 'kategori' => 'Makanan', 'harga' => 45000, 'hargaAsli' => 0, 'label' => 'Baru', 'singkat' => 'SA', 'warna' => ['#b45309', '#92400e'], 'deskripsi' => 'Sate ayam bakar dengan bumbu kacang, lontong, dan acar.'],
    ['id' => 4, 'nama' => 'Gado-Gado', 'kategori' => 'Makanan', 'harga' => 30000, 'hargaAsli' => 0, 'label' => '', 'singkat' => 'GG', 'warna' => ['#65a30d', '#4d7c0f'], 'deskripsi' => 'Sayuran segar dengan saus kacang kental dan kerupuk.'],
    ['id' => 5, 'nama' => 'Ayam Bakar Madu', 'kategori' => 'Makanan', 'harga' => 48000, 'hargaAsli' => 58000, 'label' => 'Diskon', 'singkat' => 'ABM', 'warna' => ['#ea580c', '#c2410c'], 'deskripsi' => 'Ayam bakar dengan saus madu, sambal, dan lalapan.'],
    ['id' => 6, 'nama' => 'Soto Ayam Lamongan', 'kategori' => 'Makanan', 'harga' => 32000, 'hargaAsli' => 0, 'label' => 'Terlaris', 'singkat' => 'SL', 'warna' => ['#fbbf24', '#f59e0b'], 'deskripsi' => 'Soto ayam dengan koya sedap, bawang goreng, dan sambal.'],
    ['id' => 7, 'nama' => 'Es Cendol Dawet', 'kategori' => 'Minuman', 'harga' => 18000, 'hargaAsli' => 0, 'label' => '', 'singkat' => 'EC', 'warna' => ['#22c55e', '#15803d'], 'deskripsi' => 'Mak cendol dengan gula merah dan santan segar.'],
    ['id' => 8, 'nama' => 'Jus Alpukat', 'kategori' => 'Minuman', 'harga' => 22000, 'hargaAsli' => 0, 'label' => 'Baru', 'singkat' => 'JA', 'warna' => ['#84cc16', '#4d7c0f'], 'deskripsi' => 'Jus alpukat kental dengan susu kental manis.'],
    ['id' => 9, 'nama' => 'Es Jeruk Peras', 'kategori' => 'Minuman', 'harga' => 15000, 'hargaAsli' => 0, 'label' => '', 'singkat' => 'EJ', 'warna' => ['#facc15', '#eab308'], 'deskripsi' => 'Es jeruk peras manis segar tanpa pemanis buatan.'],
    ['id' => 10, 'nama' => 'Coffee Latte', 'kategori' => 'Minuman', 'harga' => 28000, 'hargaAsli' => 34000, 'label' => 'Diskon', 'singkat' => 'CL', 'warna' => ['#78716c', '#44403c'], 'deskripsi' => 'Espresso dengan susu steamed dan latte art.'],
    ['id' => 11, 'nama' => 'Pisang Goreng Crispy', 'kategori' => 'Camilan', 'harga' => 18000, 'hargaAsli' => 0, 'label' => '', 'singkat' => 'PG', 'warna' => ['#f59e0b', '#d97706'], 'deskripsi' => 'Pisang goreng crispy dengan topping gula dan keju.'],
    ['id' => 12, 'nama' => 'Kentang Goreng Keju', 'kategori' => 'Camilan', 'harga' => 25000, 'hargaAsli' => 0, 'label' => 'Terlaris', 'singkat' => 'KG', 'warna' => ['#eab308', '#ca8a04'], 'deskripsi' => 'Kentang goreng renyah disiram saus keju leleh.'],
];

$kategoriMenu = ['Semua', 'Makanan', 'Minuman', 'Camilan'];
$statusPesanan = ['Baru', 'Diproses', 'Diantar', 'Selesai', 'Dibatalkan'];

$kontak = ['alamat' => 'Jl. Nusantara No. 45, Yogyakarta', 'telepon' => '(0274) 555 123', 'wa' => '6281234567890', 'email' => 'halo@dapurnusantara.id', 'jam' => '09.00 - 22.00'];

$menuNav = [
    ['label' => 'Beranda', 'url' => 'index.php'],
    ['label' => 'Menu', 'url' => 'menu.php'],
    ['label' => 'Pesan', 'url' => 'pesan.php'],
];

$dataDir = __DIR__ . '/../data';
$menuFile = $dataDir . '/menu.json';
$pesananFile = $dataDir . '/pesanan.json';
$reservasiFile = $dataDir . '/reservasi.json';

function e($v) { return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8'); }
function rupiah($n) { return 'Rp ' . number_format((int) $n, 0, ',', '.'); }
function baca_json($file, $default = []) { if (!is_file($file)) return is_array($default) ? $default : []; $d = json_decode(file_get_contents($file), true); return is_array($d) ? $d : $default; }
function tulis_json($file, $data) { $dir = dirname($file); if (!is_dir($dir)) mkdir($dir, 0777, true); file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)); }

$menuMakan = baca_json($menuFile, $menuMakananDefault);

function kartu_menu($m) {
    $badge = '';
    if (!empty($m['label'])) { $cls = $m['label'] === 'Terlaris' ? 'badge-terlaris' : ($m['label'] === 'Baru' ? 'badge-baru' : 'badge-diskon'); $badge = '<span class="badge ' . $cls . '">' . e($m['label']) . '</span>'; }
    $diskon = '';
    if ((int) $m['hargaAsli'] > 0) { $diskon = '<span class="harga-asli">' . rupiah($m['hargaAsli']) . '</span>'; if ($m['label'] !== 'Diskon') { $badge .= '<span class="badge badge-diskon">-' . (int) round((1 - $m['harga'] / $m['hargaAsli']) * 100) . '%</span>'; } }
    $w0 = e($m['warna'][0]); $w1 = e($m['warna'][1]);
    return '<article class="card" data-id="' . (int) $m['id'] . '">'
        . '<div class="card-gambar" style="background:linear-gradient(135deg,' . $w0 . ',' . $w1 . ')"><div class="img-lapis"><span class="img-teks">' . e($m['singkat']) . '</span></div>' . $badge . '</div>'
        . '<div class="card-body"><span class="card-kat">' . e($m['kategori']) . '</span>'
        . '<h3 class="card-nama">' . e($m['nama']) . '</h3>'
        . '<p class="card-desk">' . e($m['deskripsi']) . '</p>'
        . '<div class="harga">' . rupiah($m['harga']) . $diskon . '</div>'
        . '<button class="btn-tambah" data-id="' . (int) $m['id'] . '">Tambah ke Pesanan</button>'
        . '</article>';
}