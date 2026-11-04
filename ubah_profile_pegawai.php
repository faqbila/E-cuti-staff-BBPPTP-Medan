<?php
session_start();
include('connect.php');

// Pastikan hanya user login yang bisa akses halaman ini
if (!isset($_SESSION['username'])) {
    echo '<script>alert("Silakan login terlebih dahulu."); window.location="login.php";</script>';
    exit();
}

// Pastikan parameter username ada
if (!isset($_GET['username'])) {
    echo "<script>alert('Username tidak ditemukan.'); window.location='pegawai.php';</script>";
    exit();
}

$username = mysqli_real_escape_string($koneksi, $_GET['username']);

// Ambil data pegawai yang akan diedit
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan.'); window.location='pegawai.php';</script>";
    exit();
}

// Proses update saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama        = $_POST['nama'];
    $jabatan     = $_POST['jabatan'];
    $masa_kerja  = $_POST['masa_kerja'];
    $no_hp       = $_POST['no_hp'];
    $password    = $_POST['password'];

    $update = mysqli_query($koneksi, "UPDATE pegawai SET 
        nama = '$nama',
        jabatan = '$jabatan',
        masa_kerja = '$masa_kerja',
        no_hp = '$no_hp',
        password = '$password'
        WHERE username = '$username'
    ");

    if ($update) {
        echo "<script>
            alert('Data berhasil diperbarui!');
            window.location = 'detail_pegawai.php?username=$username';
        </script>";
        exit();
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h3 class="text-center mb-4">Ubah Data Pegawai</h3>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Masa Kerja</label>
            <input type="text" name="masa_kerja" class="form-control" value="<?= $data['masa_kerja']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="<?= $data['no_hp']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="password" class="form-control" value="<?= $data['password']; ?>" required>
        </div>
        <div class="text-end">
            <a href="pegawai.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </div>
    </form>
</div>
</body>
</html>
