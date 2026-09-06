<?php
$activePage = 'pesan.php';
$pageTitle  = 'Pesan';
require_once __DIR__ . '/includes/config.php';
$pageDesc = 'Pesan menu favorit ' . $namaResto . ' untuk dine-in, takeaway, atau delivery.';
include __DIR__ . '/includes/header.php';
?>

    <section class="page-head">
      <div class="container">
        <h1>Keranjang Pesanan</h1>
        <p>Tinjau pesanan Anda, pilih metode layanan, lalu selesaikan.</p>
      </div>
    </section>

    <section class="section">
      <div class="container pesan-layout">
        <div class="pesan-list" id="item-pesan"></div>
        <aside class="ringkasan" id="ringkasan">
          <h3>Ringkasan</h3>
          <div class="ro-item"><span>Subtotal</span><b id="subtotal">Rp 0</b></div>
          <div class="ro-item"><span>Ongkir</span><b id="ongkir">-</b></div>
          <p class="info-ongkir" id="info-ongkir"></p>
          <div class="ro-item total"><span>Total</span><b id="total">Rp 0</b></div>
          <button class="btn lebar hvr-sweep-to-right" id="btn-checkout">Checkout</button>
          <a href="menu.php" class="btn btn-ghost lebar hvr-sweep-to-right">Tambah Menu</a>
        </aside>
      </div>
    </section>

    <div class="modal" id="modal-checkout">
      <div class="modal-kotak">
        <h2>Checkout Pesanan</h2>
        <form id="form-checkout" class="form-checkout">
          <label class="field"><span>Nama Lengkap</span><input type="text" id="nama" required placeholder="Nama Anda"></label>
          <label class="field"><span>Telepon</span><input type="tel" id="telepon" required placeholder="08xxxxxxxxxx"></label>
          <label class="field"><span>Alamat (jika delivery)</span><textarea id="alamat" rows="2" placeholder="Alamat pengiriman"></textarea></label>
          <label class="field"><span>Layanan</span>
            <select id="layanan"><option value="Delivery">Delivery</option><option value="Takeaway">Takeaway</option><option value="Dine In">Dine In</option></select>
          </label>
          <button type="submit" class="btn lebar hvr-sweep-to-right">Selesaikan Pesanan</button>
        </form>
      </div>
    </div>

    <div class="modal" id="modal-sukses">
      <div class="modal-kotak">
        <div class="modal-ikon"><i class="fa-solid fa-check"></i></div>
        <h2>Pesanan Berhasil</h2>
        <p>Terima kasih <b id="nama-pelanggan">-</b>!</p>
        <div class="modal-kode">No. Pesanan<b id="kode-pesanan">-</b></div>
        <p>Total <b id="total-bayar">-</b></p>
        <button class="btn lebar" id="tutup-modal">Kembali ke Beranda</button>
      </div>
    </div>

<?php include __DIR__ . '/includes/footer.php'; ?>