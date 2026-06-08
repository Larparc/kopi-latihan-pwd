<?php
include "../security.php";
include "../../koneksi.php";

$sql = "select registrations.*, courses.name as course_title, courses.price as course_price 
        from registrations 
        inner join courses on registrations.course_id = courses.id 
        order by created_at desc";
$query = mysqli_query($conn, $sql);
?>

<link rel="stylesheet" href="../../cs/index.css">

<div class="topbar">
    <a href="../dashboard.php">← Kembali ke Dashboard</a>
</div>

<div class="container">
    <div class="card">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor WhatsApp</th>
                <th>Kelas</th>
                <th>Total Peserta</th>
                <th>Total Harga</th>
                <th>Status Follow Up</th>
                <th>Waktu Pendaftaran</th>
                <th></th>
            </tr>
            <?php
            $no = 1;
            while ($result = mysqli_fetch_assoc($query)) :
                $total_price = $result['course_price'] * $result['participant_count'];
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['full_name']; ?></td>
                <td><?= $result['email']; ?></td>
                <td><?= $result['phone_number']; ?></td>
                <td><?= $result['course_title']; ?></td>
                <td><?= $result['participant_count']; ?></td>
                <td>Rp <?= number_format($total_price, 0, ',', '.'); ?></td>
                <td>
                    <?php if ($result['is_followed_up'] == 1) : ?>
                        <span class="badge-followed">Followed Up</span>
                        <br><small>oleh <?= $result['followed_up_by']; ?> <?= $result['followed_up_at']; ?></small>
                    <?php else : ?>
                        <span class="badge-pending">Pending</span>
                    <?php endif; ?>
                </td>
                <td><?= $result['created_at']; ?></td>
                <td>
                    <?php if ($result['is_followed_up'] == 0) : ?>
                        <a class="btn-followup" href="follow_up.php?id=<?= $result['id']; ?>"
                           onclick="return confirm('Mark this registration as followed up?')">
                            Sudah Follow Up
                        </a>
                    <?php else : ?>
                        <a class="btn-cancel" href="cancel_follow_up.php?id=<?= $result['id']; ?>"
                           onclick="return confirm('Cancel follow up status?')">
                            Cancel Follow Up
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>