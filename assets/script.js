(function () {
  "use strict";
  var MENU = window.FOOD_MENU || [];

  function rupiah(n) { return "Rp " + Number(n).toLocaleString("id-ID"); }
  function ambil() { try { var c = JSON.parse(localStorage.getItem("dapurnusantara_cart")); return c && typeof c === "object" ? c : {}; } catch (e) { return {}; } }
  function simpan(c) { localStorage.setItem("dapurnusantara_cart", JSON.stringify(c)); }
  function jumlah() { var c = ambil(), t = 0; for (var k in c) t += Number(c[k]) || 0; return t; }
  function badge() { var b = document.getElementById("cart-badge"); if (!b) return; var t = jumlah(); b.textContent = t; b.style.display = t > 0 ? "inline-flex" : "none"; }
  function cari(id) { for (var i = 0; i < MENU.length; i++) if (MENU[i].id === id) return MENU[i]; return null; }
  var tt = null;
  function toast(t) { var el = document.getElementById("toast"); if (!el) { el = document.createElement("div"); el.id = "toast"; el.className = "toast"; document.body.appendChild(el); } el.textContent = t; el.classList.add("muncul"); if (tt) clearTimeout(tt); tt = setTimeout(function () { el.classList.remove("muncul"); }, 2200); }
  function beli(id) { var c = ambil(); c[id] = (Number(c[id]) || 0) + 1; simpan(c); badge(); toast("Menu ditambahkan ke pesanan"); }

  function kartu(m) {
    var bh = "";
    if (m.label) { var cl = m.label === "Terlaris" ? "badge-terlaris" : m.label === "Baru" ? "badge-baru" : "badge-diskon"; bh = '<span class="badge ' + cl + '">' + m.label + '</span>'; }
    var dk = "";
    if (m.hargaAsli) { dk = '<span class="harga-asli">' + rupiah(m.hargaAsli) + '</span>'; if (m.label !== "Diskon") bh += '<span class="badge badge-diskon">-' + Math.round((1 - m.harga / m.hargaAsli) * 100) + '%</span>'; }
    return '<article class="card" data-id="' + m.id + '">'
      + '<div class="card-gambar" style="background:linear-gradient(135deg,' + m.warna[0] + ',' + m.warna[1] + ')"><div class="img-lapis"><span class="img-teks">' + m.singkat + '</span></div>' + bh + '</div>'
      + '<div class="card-body"><span class="card-kat">' + m.kategori + '</span><h3 class="card-nama">' + m.nama + '</h3><p class="card-desk">' + m.deskripsi + '</p>'
      + '<div class="harga">' + rupiah(m.harga) + dk + '</div><button class="btn-tambah" data-id="' + m.id + '">Tambah ke Pesanan</button></div></article>';
  }

  function renderMenu() {
    var w = document.getElementById("menu-grid");
    if (!w) return;
    var kat = (document.getElementById("filter-kategori") || {}).getAttribute ? document.getElementById("filter-kategori").getAttribute("data-aktif") || "Semua" : "Semua";
    var q = (document.getElementById("cari-menu") || {}).value || "";
    q = q.trim().toLowerCase();
    var daftar = MENU.filter(function (m) { var okK = kat === "Semua" || m.kategori === kat; var okN = !q || m.nama.toLowerCase().indexOf(q) !== -1; return okK && okN; });
    w.innerHTML = daftar.map(kartu).join("");
    var info = document.getElementById("jumlah-produk");
    if (info) info.textContent = daftar.length + " menu ditemukan";
    if (window.AOS) window.AOS.refresh();
  }

  function baris(p, q) {
    return '<div class="item-keranjang" data-id="' + p.id + '"><div class="item-gambar" style="background:linear-gradient(135deg,' + p.warna[0] + ',' + p.warna[1] + ')">' + p.singkat + '</div><div class="item-info"><h4>' + p.nama + '</h4><span class="item-kategori">' + p.kategori + '</span><div class="harga">' + rupiah(p.harga) + '</div><div class="qty"><button class="btn-qty" data-id="' + p.id + '" data-aksi="minus">-</button><span class="qty-angka">' + q + '</span><button class="btn-qty" data-id="' + p.id + '" data-aksi="plus">+</button><button class="btn-hapus" data-id="' + p.id + '" data-aksi="hapus">Hapus</button></div></div></div>';
  }

  function ongkirLayanan(sub) {
    var l = document.getElementById("layanan");
    var mode = l ? l.value : "Delivery";
    return (mode === "Delivery" && sub < 200000) ? 15000 : 0;
  }

  function renderPesan() {
    var w = document.getElementById("item-pesan"), rk = document.getElementById("ringkasan");
    if (!w) return;
    var c = ambil();
    var ids = Object.keys(c).filter(function (id) { return Number(c[id]) > 0; });
    var sub = 0;
    if (!ids.length) { w.innerHTML = '<div class="kosong"><i class="fa-solid fa-basket-shopping"></i><p>Pesanan Anda masih kosong</p><a class="btn" href="menu.php">Lihat Menu</a></div>'; if (rk) rk.style.display = "none"; return; }
    w.innerHTML = ids.map(function (id) { var p = cari(Number(id)); if (!p) return ""; var n = Number(c[id]); sub += p.harga * n; return baris(p, n); }).join("");
    var ongkir = ongkirLayanan(sub);
    var total = sub + ongkir;
    rk.style.display = "block";
    document.getElementById("subtotal").textContent = rupiah(sub);
    document.getElementById("ongkir").textContent = ongkir === 0 ? "Gratis" : rupiah(ongkir);
    document.getElementById("total").textContent = rupiah(total);
    document.getElementById("info-ongkir").textContent = "Gratis ongkir untuk Delivery di atas Rp 200.000";
  }

  function aksi(el) {
    var id = el.getAttribute("data-id"), a = el.getAttribute("data-aksi"), c = ambil();
    if (a === "plus") c[id] = (Number(c[id]) || 0) + 1;
    else if (a === "minus") { c[id] = (Number(c[id]) || 0) - 1; if (c[id] <= 0) delete c[id]; }
    else if (a === "hapus") delete c[id];
    simpan(c); badge(); renderPesan();
  }

  function tanggalKode() { var d = new Date(); var m = d.getMonth() + 1; return "" + d.getFullYear() + (m < 10 ? "0" + m : m) + (d.getDate() < 10 ? "0" + d.getDate() : d.getDate()); }
  function acak(min, max) { return Math.floor(Math.random() * (max - min + 1)) + min; }

  function pasangCheckout() {
    var btn = document.getElementById("btn-checkout");
    if (btn) btn.addEventListener("click", function () { if (jumlah() < 1) { toast("Pesanan masih kosong"); return; } document.getElementById("modal-checkout").classList.add("buka"); });
    var l = document.getElementById("layanan"); if (l) l.addEventListener("change", renderPesan);
    var f = document.getElementById("form-checkout");
    if (f) f.addEventListener("submit", function (ev) {
      ev.preventDefault();
      var nama = document.getElementById("nama").value.trim();
      var telp = document.getElementById("telepon").value.trim();
      var alamat = document.getElementById("alamat").value.trim();
      var layanan = document.getElementById("layanan").value;
      if (!nama || !telp) { toast("Lengkapi nama dan telepon"); return; }
      if (!/^[0-9+\- ]{9,15}$/.test(telp)) { toast("Nomor telepon tidak valid"); return; }
      var c = ambil(), ids = Object.keys(c), items = [], sub = 0;
      ids.forEach(function (id) { var p = cari(Number(id)); if (!p) return; var n = Number(c[id]); sub += p.harga * n; items.push({ id: p.id, nama: p.nama, qty: n, harga: p.harga }); });
      var ongkir = ongkirLayanan(sub), total = sub + ongkir, kode = "DN-" + tanggalKode() + "-" + acak(1000, 9999);
      var sukses = function (kc) {
        localStorage.removeItem("dapurnusantara_cart"); badge();
        document.getElementById("kode-pesanan").textContent = kc;
        document.getElementById("total-bayar").textContent = rupiah(total);
        document.getElementById("nama-pelanggan").textContent = nama;
        document.getElementById("modal-checkout").classList.remove("buka");
        document.getElementById("modal-sukses").classList.add("buka");
        f.reset(); renderPesan();
      };
      try {
        fetch("api/simpan_pesanan.php", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ nama: nama, telepon: telp, alamat: alamat, layanan: layanan, kode: kode, items: items }) })
          .then(function (r) { return r.json(); })
          .then(function (res) { sukses(res && res.ok ? res.kode : kode); })
          .catch(function () { sukses(kode); });
      } catch (e) { sukses(kode); }
    });
    var tm = document.getElementById("tutup-modal");
    if (tm) tm.addEventListener("click", function () { window.location.href = "index.php"; });
  }

  function pasangFilter() {
    var w = document.getElementById("filter-kategori");
    if (!w) return;
    w.addEventListener("click", function (e) {
      var b = e.target.closest(".btn-filter");
      if (!b) return;
      var p = w.querySelector(".btn-filter.aktif");
      if (p) p.classList.remove("aktif");
      b.classList.add("aktif");
      w.setAttribute("data-aktif", b.getAttribute("data-kategori"));
      renderMenu();
    });
  }

  document.addEventListener("click", function (e) {
    var bt = e.target.closest(".btn-tambah");
    if (bt) { beli(bt.getAttribute("data-id")); return; }
    var q = e.target.closest("[data-aksi]");
    if (q) aksi(q);
  });

  document.addEventListener("DOMContentLoaded", function () {
    renderMenu();
    renderPesan();
    pasangFilter();
    pasangCheckout();
    var c = document.getElementById("cari-menu"); if (c) c.addEventListener("input", renderMenu);
    var tg = document.getElementById("menu-toggle"), nav = document.getElementById("nav-menu"); if (tg && nav) tg.addEventListener("click", function () { nav.classList.toggle("buka"); });
    badge();
    if (window.AOS) window.AOS.init({ duration: 700, easing: "ease-out-cubic", once: true, offset: 50 });
  });
})();