<?php
include "koneksi.php"
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Kopi Online</title>
    <link rel="stylesheet" href="cs/index.css">
</head>
<body>
    <header>
        <h1 class="head">Kelas kopi Online</h1>
        <p>Belajar menyeduh kopi dan membangun bisnis kopi rumahan</p>
    </header>

    <section>
        <h2>Tentang Program</h2>
        <p>
            Kelas kopi online adalah program pelatihan sederhana untuk pemula yang ingin belajar teknik dasar menyeduh kopi, membuat latte art, dan memahami peluang bisnis kopi rumahan
        </p>
    </section>

    <div class="cards">
        <h1>Pilihan kelas</h1>
        <?php
          $sql = "select * from course";
          $query = mysqli_query($conn, $sql);
          while($result = mysqli_fetch_array($query)){
            ?>
        <div class="card">
          <h3> <?= $result['name'] ?> </h3>
          <p> <?= $result['description'] ?> </p>
          <strong> Rp <?= number_format($result['price'],0,',','.') ?> </strong>
        </div>
        <?php
          }
          ?>
    </div>

    <?php include "frm_pendaftaran.php"; ?>
</body>
</html>