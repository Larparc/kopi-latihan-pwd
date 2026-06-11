<?php
include "../admin/security.php";
include "../koneksi.php";

$id = $_GET['id'] ?? '';

if ($id == '') {
    header("Location: index.php");
    exit;
}

$sql   = "SELECT * FROM courses WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$data  = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="/pwd/latihan_19mei/cs/index.css">
</head>
<body>

<div class="wrap">
    <div class="top">
        <h2>Edit Course</h2>
        <a href="index.php" class="btn-out">Kembali</a>
    </div>

    <form method="POST" action="ubah.php">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="form-group">
            <label>Judul Course</label>
            <input type="text" name="title" value="<?= htmlspecialchars($data['name']) ?>">
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="5"><?= htmlspecialchars($data['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price" value="<?= $data['price'] ?>">
        </div>

        <button type="submit" name="ubah" class="edit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>