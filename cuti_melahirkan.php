<<?php
session_start();

// Proteksi jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: login_pegawai.php");
    exit();
}

// Header anti-cache
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include('koneksi_login_pegawai.php');

include('koneksi_login_pegawai.php');
$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);
$nama = $data['nama'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo2.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
</body>
</html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo2.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CUTI BBPPTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="tampilan2.css">
</head>
<body >

 <!-- Sidebar -->
    <div class="sidebar">
    <img src="logo2.png" alt="Logo" style="width: 100px; margin-bottom: 15px; margin-left: 60px;">
    <h5 class="text-center">E-CUTI BBPPTP MEDAN</h5>
    <a href="home_user.php"><i class="bi bi-house"></i></i> Beranda</a>
    <a href="profil_user.php"><i class="bi bi-person-vcard"></i></i> Profile User</a>
    <a href="Form_Cuti_User.php"><i class="bi bi-plus-circle"></i> Tambahkan</a>
    <a href="riwayat_user.php"><i class="bi bi-clock-history"></i></i> Riwayat</a>
    <a href="edit_profile.php"><i class="bi bi-pencil-square"></i> Edit Profile</a>
    <a href="logout_user.php"><i class="bi bi-box-arrow-left"></i> Log Out</a>
</div>
    <!-- Konten -->
    <div class="content">
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Beranda Pegawai</p>
            </blockquote>
        </figure>
    <div class="text-center p-2" style="background:#f1f1f1;">
   <small class="login">Login sebagai: <?php echo $nama; ?></small>
</div>
      
    <div class="container mt-2">
  <h4 class="text-center mb-4">Tata Cara Pengajuan Cuti Melahirkan</h4>
  <ol style="font-weight: normal; font-size: 16px; line-height: 1.7;">
    <li>Untuk kelahiran anak pertama sampai dengan kelahiran anak ketiga pada saat menjadi PNS berhak atas cuti melahirkan.</li>
    <li>Untuk kelahiran anak keempat dan seterusnya kepada PNS diiberikan cuti besar.</li>
    <li>Cuti besar untuk kelahiran anak keempat dan seterusnya berlaku ketentuan sebagai berikut : <br>
        a. permintaan cuti tersebut tidak dapat ditangguhkan; <br>
        b. mengesampingkan ketentuan telah bekerja paling singkat 5 tahun secara terus-menerus; dan <br>
        c. lamanya cutitersebut sama dengan lamanya cuti melahirkan.</li>
    <li>Lamanya cuti melahirkan sebagaimana dimaksud pada angka 1 adalah 3 (tiga) bulan</li>
    <li>Untuk menggunakan hak atas cuti melahirkan sebagaimana dimaksud pada angka 1, PNS yang bersangkutan mengajukan permintaaan secara tertulis kepada pejabat yang berwenang memberikan cuti</li>
    <li>Berdasarkan permintaan secara tertulis sebagaimana dimaksud pada angka 5, Pejabat yang Berwenang memberikan cuti melahirkan kepada PNS yang bersangkutan</li>
    <li>Permintaan dan pemberian cuti melahirkan sebagaimana dimaksud pada angka 6 dan angka 7 dibuat menurut contoh dengan menggunakan formulir sebagaimana tercantum dalam Anak Lampiran 1.b yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>Dalam hal tertentu PNS dapat mengajukan permintaan cuti melahirkan kurang dari 3 (tiga) bulan.</li>
    <li>Selama menggunakan hak cuti melahirkan, PNS yang bersangkutan menerima penghasilan PNS</li>
    <li>Penghasilan sebagaimana dimaksud pada angka 9, terdiri atas gaji pokok, tunjangan keluarga, tunjangan pangan dan tunjangan jabatan sampai dengan ditetapkannya Peraturan Pemerintah yang mengatur gaji, tunjangan, dan fasilitas PNS.</li>
</ol>
</div>
  <div class="text-end">
            <a href="home_user.php" class="btn btn-primary">Kembali</a>
            <a href="cuti_alasan_penting.php" class="btn btn-outline-primary">Selanjutnya</a>
        </div>
</body>
</html>