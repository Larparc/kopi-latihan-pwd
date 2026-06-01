<?php
include "../admin/security.php";
include "../koneksi.php";

$sql = "select * from courses";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>  
    <title>Management Kelas</title>
    <link rel="stylesheet" href="/pwd/latihan_19mei/cs/index.css">
</head>
<body>

<div class="wrap">
    <div class="top">
        <h2>Management Kelas</h2>
        <a href="../admin/logout.php" class="btn-out">Logout</a>
    </div>

    <table class="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $hasData = false;
            while ($result = mysqli_fetch_array($query)) {
                $hasData = true;
                $name        = htmlspecialchars($result['name']);
                $description = htmlspecialchars($result['description']);
                $price       = number_format($result['price'], 0, ',', '.');
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $name ?></td>
                <td><?= $description ?></td>
                <td>Rp <?= $price ?></td>
                <td class="aksi">
                    <a href="#" class="edit">Edit</a>
                    <a href="#" class="hapus">Delete</a>
                </td>
            </tr>
            <?php
                $no++;
            }
            if (!$hasData) {
            ?>
            <tr class="kosong">
                <td colspan="5">Belum ada data kelas.</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
