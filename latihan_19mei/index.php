<?php
include "header.php";
?>
    <section>
        <h2>Tentang Program</h2>
        <p>
            Kelas kopi online adalah program pelatihan sederhana untuk pemula yang ingin belajar teknik dasar menyeduh kopi, membuat latte art, dan memahami peluang bisnis kopi rumahan
        </p>
    </section>

    <div class="cards">
        <h1>Pilihan kelas</h1>
        <div class="card-grid">
        <?php
          $sql = "select * from courses";
          $query = mysqli_query($conn, $sql);
          while($result = mysqli_fetch_array($query)){
            ?>
        <div class="card">
          <h3><?= $result['name'] ?></h3>
          <p><?= $result['description'] ?></p>
          <strong>Rp <?= number_format($result['price'],0,',','.') ?></strong>
        </div>
        <?php
          }
          ?>
        </div>
    </div>
</body>
</html>