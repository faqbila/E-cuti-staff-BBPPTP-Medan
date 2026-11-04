<?php
session_start();
include('connect.php');

if (!isset($_GET['username'])) {
    echo "<script>alert('Username tidak ditemukan.'); window.location='pegawai.php';</script>";
    exit();
}

$username = mysqli_real_escape_string($koneksi, $_GET['username']);
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan.'); window.location='pegawai.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4">Detail Data Pegawai</h3>
    <table class="table table-bordered">
        <tr><th>Username (NIP)</th><td><?= $data['username'] ?></td></tr>
        <tr><th>Nama</th><td><?= $data['nama'] ?></td></tr>
        <tr><th>Jabatan</th><td><?= $data['jabatan'] ?></td></tr>
        <tr><th>Masa Kerja</th><td><?= $data['masa_kerja'] ?></td></tr>
        <tr><th>No HP</th><td><?= $data['no_hp'] ?></td></tr>
        <tr><th>Sisa Cuti</th><td><?= $data['sisa_cuti'] ?></td></tr>
        <tr><th>password</th><td><?= $data['password'] ?></td></tr>
        <tr>
            <th>Foto</th>
            <td>
                <?php
                $foto = !empty($data['foto']) ? 'uploads/' . $data['foto'] : 'foto.jpg';
                ?>
                <img src="<?= $foto ?>" alt="Foto" width="200" height="266">
            </td>
        </tr>
    </table>
    <a href="pegawai.php" class="btn btn-secondary">Kembali</a>
   <a href="ubah_profile_pegawai.php?username=<?= $data['username'] ?>" class="btn btn-primary">Ubah Profile</a>
</div>
</body>
</html>
