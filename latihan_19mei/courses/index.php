<?php
include "../admin/security.php";
include "../koneksi.php";

$sql = "select * from courses";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html> 
<head>
    <title>Management Kelas</title>
    <link rel="stylesheet" href="/pwd/latihan_19mei/cs/index.css">
</head>
<body>

<div class="wrap">
    <div class="top">
        <h2>Management Kelas</h2>
        <a href="../admin/dashboard.php" class="btn-out">Kembali ke Dashboard</a>
        <a href="tambah.php" class="btn-out">Tambah Course</a>
        <a href="../admin/logout.php" class="btn-out">Logout</a>
    </div>

    <table class="tabel">
        <thead>
            <tr>
                <th style="text-align:center">No</th>
                <th>Nama Kelas</th>
                <th>Deskripsi</th>
                <th style="text-align:center">Harga</th>
                <th style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $hasData = false;
            while ($result = mysqli_fetch_array($query)) {
                $hasData = true;
                $id          = $result['id'];
                $name        = $result['name'];
                $description = $result['description'];
                $price       = number_format($result['price'], 0, ',', '.');
            ?>
            <tr>
                <td style="text-align:center"><?= $no ?></td>
                <td><?= $name ?></td>
                <td><?= $description ?></td>
                <td style="text-align:center">Rp <?= $price ?></td>
                <td class="aksi" style="text-align:center">
                    <a href="edit.php?id=<?= $id ?>" class="edit">Edit</a> |
                    <a href="hapus.php?id=<?= $id ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="hapus">Hapus</a>
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