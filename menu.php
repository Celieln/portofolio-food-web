<?php
$activePage = 'menu.php';
$pageTitle  = 'Menu';
require_once __DIR__ . '/includes/config.php';
$pageDesc = 'Menu lengkap ' . $namaResto . ' - makanan, minuman, dan camilan.';
include __DIR__ . '/includes/header.php';
?>

    <section class="page-head">
      <div class="container">
        <h1>Menu Kami</h1>
        <p>Semua hidangan lezat dari <?= e($namaResto) ?>.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="toolbar" data-aos="fade-up">
          <div class="filter-kategori" id="filter-kategori" data-aktif="Semua">
            <?php foreach ($kategoriMenu as $k): ?>
            <button class="btn-filter<?= $k === 'Semua' ? ' aktif' : '' ?>" data-kategori="<?= e($k) ?>"><?= e($k) ?></button>
            <?php endforeach; ?>
          </div>
          <input type="search" id="cari-menu" class="cari" placeholder="Cari menu...">
        </div>
        <p class="jumlah-produk" id="jumlah-produk" data-aos="fade-up"></p>
        <div class="menu-grid" id="menu-grid"></div>
      </div>
    </section>

<?php include __DIR__ . '/includes/footer.php'; ?>