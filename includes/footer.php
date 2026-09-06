<?php require_once __DIR__ . '/config.php'; ?>
  </main>

  <footer class="footer">
    <div class="container footer-grid">
      <div class="footer-kol">
        <a href="index.php" class="logo"><i class="fa-solid fa-utensils"></i> Dapur<span>Nusantara</span></a>
        <p>Rumah makan masakan Indonesia autentik dengan bahan segar dan resep turun-temurun. Selalu hangat di setiap hidangan.</p>
      </div>
      <div class="footer-kol">
        <h4>Menu</h4>
        <?php foreach ($menuNav as $m): ?><a href="<?= e($m['url']) ?>"><?= e($m['label']) ?></a><?php endforeach; ?>
      </div>
      <div class="footer-kol">
        <h4>Jam Buka</h4>
        <p>Setiap hari<br><b><?= e($kontak['jam']) ?></b></p>
        <p>Takeaway &amp; Delivery</p>
      </div>
      <div class="footer-kol">
        <h4>Kontak</h4>
        <p><i class="fa-solid fa-location-dot"></i> <?= e($kontak['alamat']) ?></p>
        <p><i class="fa-solid fa-phone"></i> <?= e($kontak['telepon']) ?></p>
        <p><i class="fa-solid fa-envelope"></i> <?= e($kontak['email']) ?></p>
      </div>
    </div>
    <div class="footer-bawah">Copyright <?= date('Y') ?> <?= e($namaResto) ?>. Seluruh hak cipta dilindungi.</div>
  </footer>

  <script>window.FOOD_MENU = <?= json_encode($menuMakan, JSON_UNESCAPED_UNICODE) ?>;</script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="assets/script.js"></script>
  <div class="cursor-embar" id="kursorEmber" aria-hidden="true"><span class="titik"><i class="fa-solid fa-utensils"></i></span></div>
  <script>
  (function () {
    if (window.matchMedia('(max-width:768px)').matches) return;
    var k = document.getElementById('kursorEmber'), abu = 0;
    document.addEventListener('mousemove', function (e) {
      k.style.left = e.clientX + 'px'; k.style.top = e.clientY + 'px';
      var s = document.createElement('span'); s.className = 'apil'; s.style.left = '0'; s.style.top = '0';
      s.style.setProperty('--dx', (Math.random()*14-7) + 'px');
      k.appendChild(s); setTimeout(function(){ s.remove(); }, 1200);
      if (abu++ % 3 === 0) { var b = document.createElement('span'); b.className = 'abuk'; b.style.setProperty('--dx', (Math.random()*16-8)+'px'); k.appendChild(b); setTimeout(function(){ b.remove(); }, 1500); }
    });
  })();
  </script>
</body>
</html>