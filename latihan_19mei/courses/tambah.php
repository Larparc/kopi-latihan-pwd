<?php
include "../admin/security.php";
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $title       = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price       = (int) $_POST['price'];

    if ($title == '' || $description == '' || $price <= 0) {
        $error = "Semua field wajib diisi dengan benar.";
    } else {
        $sql   = "INSERT INTO courses (name, description, price) VALUES ('$title', '$description', '$price')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Data gagal disimpan.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Course</title>
    <link rel="stylesheet" href="/pwd/latihan_19mei/cs/index.css">
</head>
<body>

<div class="wrap">
    <div class="top">
        <h2>Tambah Course</h2>
        <a href="index.php" class="btn-out">Kembali</a>
    </div>

    <?php if (isset($error)) : ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Judul Course</label>
            <input type="text" name="title" value="<?= isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '' ?>">
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="5"><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?></textarea>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price" value="<?= isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '' ?>">
        </div>

        <button type="submit" name="simpan" class="edit">Simpan</button>
    </form>
</div>

</body>
</html>