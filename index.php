<?php
$activePage = 'index.php';
$pageTitle  = 'Beranda';
require_once __DIR__ . '/includes/config.php';
$pageDesc = $namaResto . ' - rumah makan masakan Indonesia autentik. Pilih santap di tempat, takeaway, atau delivery.';
include __DIR__ . '/includes/header.php';
?>

    <div class="brand-strip"><div class="container marquee">
      <span>Bahan Segar</span><i class="fa-solid fa-star"></i><span>Resep Turun Temurun</span><i class="fa-solid fa-star"></i><span>Delivery 30 Menit</span><i class="fa-solid fa-star"></i><span>Halal</span><i class="fa-solid fa-star"></i><span>Bahan Segar</span><i class="fa-solid fa-star"></i><span>Resep Turun Temurun</span><i class="fa-solid fa-star"></i><span>Delivery 30 Menit</span><i class="fa-solid fa-star"></i><span>Halal</span><i class="fa-solid fa-star"></i>
    </div></div>

    <section class="hero">
      <div class="blob blob-1"></div>
      <div class="blob blob-2"></div>
      <div class="container hero-dalam">
        <div class="hero-teks">
          <span class="hero-badge" data-aos="fade-up">Selamat Datang</span>
          <h1 data-aos="fade-up" data-aos-delay="80">Cita Rasa <span class="grad">Otentik</span> Nusantara</h1>
          <p data-aos="fade-up" data-aos-delay="160">Masakan Indonesia autentik dari rempah pilihan. Pesan online, santap di tempat, atau antar ke rumah.</p>
          <div class="hero-aksi" data-aos="fade-up" data-aos-delay="240">
            <a href="menu.php" class="btn hvr-sweep-to-right"><i class="fa-solid fa-utensils"></i> Lihat Menu</a>
            <a href="pesan.php" class="btn btn-ghost hvr-sweep-to-right"><i class="fa-solid fa-basket-shopping"></i> Pesan Sekarang</a>
          </div>
          <div class="hero-stat" data-aos="fade-up" data-aos-delay="320">
            <div><b>120+</b><span>Menu</span></div>
            <div><b>50k+</b><span>Pelanggan</span></div>
            <div><b>4.9<i class="fa-solid fa-star"></i></b><span>Rating</span></div>
          </div>
        </div>
        <div class="hero-visual" data-aos="fade-left" data-aos-delay="200">
          <div class="hero-card utama">
            <span class="promo-label">Paket Spesial</span>
            <h3>Nasi + Lauk + Minum</h3>
            <p>Hanya hari ini mulai dari</p>
            <div class="harga-hero">Rp <em>38.000</em></div>
            <a href="menu.php" class="btn btn-kecil btn-putih hvr-sweep-to-right">Ambil Paket</a>
          </div>
          <div class="hero-badge-card"><i class="fa-solid fa-leaf"></i><div><b>Bahan Segar</b><span>Dipilih setiap pagi</span></div></div>
          <div class="hero-mini-card"><i class="fa-solid fa-motorcycle"></i><div><b>Delivery Cepat</b><span>30 menit sampai</span></div></div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="judul-section" data-aos="fade-up">
          <div><span class="eyebrow">Signature</span><h2>Menu Andalan</h2></div>
          <a href="menu.php" class="link-semua">Lihat Semua <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="menu-grid" id="menu-grid">
          <?php foreach (array_slice($menuMakan, 0, 8) as $i => $m): ?>
          <div data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 60 ?>"><?= kartu_menu($m) ?></div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="promo-band">
      <div class="container promo-band-dalam" data-aos="fade-up">
        <div><span class="eyebrow light">Gratis Ongkir</span><h2>Pesan di atas <em>Rp 200.000</em> ongkir gratis!</h2><p>Berlaku untuk area Yogyakarta dan sekitarnya.</p></div>
        <a href="pesan.php" class="btn btn-putih hvr-sweep-to-right">Pesan Sekarang</a>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="judul-section" data-aos="fade-up"><div><span class="eyebrow">Kategori</span><h2>Jelajahi Menu</h2></div></div>
        <div class="kategori-grid">
          <?php $ik = ['fa-bowl-rice','fa-mug-hot','fa-martini-glass']; $gk = ['gk-1','gk-2','gk-3']; $no=0; foreach (['Makanan','Minuman','Camilan'] as $k): ?>
          <a href="menu.php" class="kategori-card <?= $gk[$no] ?>" data-aos="fade-up" data-aos-delay="<?= $no*60 ?>"><i class="fa-solid <?= $ik[$no] ?>"></i><h3><?= $k ?></h3><span>Lihat →</span></a>
          <?php $no++; endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section tentang-ringkas">
      <div class="container tentang-grid" data-aos="fade-up">
        <div class="ttg-visual"><div class="ttg-gambar"><i class="fa-solid fa-utensils"></i></div><div class="ttg-badge">10+ Th</div></div>
        <div class="ttg-teks">
          <span class="eyebrow">Tentang Kami</span>
          <h2>Rasa keluarga, kualitas terbaik</h2>
          <p>Sejak 2013, Dapur Nusantara menghadirkan masakan rumahan Indonesia yang otentik. Setiap bumbu diracik segar setiap hari oleh koki berpengalaman.</p>
          <ul>
            <li><i class="fa-solid fa-check"></i> 100% bahan segar &amp; halal</li>
            <li><i class="fa-solid fa-check"></i> Cita rasa autentik khas nusantara</li>
            <li><i class="fa-solid fa-check"></i> Takeaway, dine-in, &amp; delivery</li>
          </ul>
          <a href="menu.php" class="btn hvr-sweep-to-right">Mulai Pesan</a>
        </div>
      </div>
    </section>

<?php include __DIR__ . '/includes/footer.php'; ?>