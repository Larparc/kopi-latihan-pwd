<?php
include "security.php";

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="/pwd/latihan_19mei/cs/index.css">
</head>
<body>
<section class="dashboard">
<p class="dashboard-p">welcome, <?= $username ?></p>
<a href='../courses/index.php' class="dashboard-a">Management Kelas</a>
<br>
<a href='logout.php' class="dashboard-ah">Logout</a>
</section>
</body>
</html>