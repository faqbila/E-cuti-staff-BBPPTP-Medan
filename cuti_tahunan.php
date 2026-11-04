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
  <h4 class="text-center mb-4">Tata Cara Pengajuan Cuti Tahunan</h4>
  <ol style="font-weight: normal; font-size: 16px; line-height: 1.7;">
    <li>PNS dan Calon PNS yang telah bekerja paling kurang 1 (satu) tahun secara terus menerus berhak atas cuti tahunan.</li>
    <li>Lamanya hak atas cuti tahunan sebagaimana dimaksud pada angka 1 adalah 12 (dua belas) hari kerja.</li>
    <li>Permintaan cuti tahunan dapat diberikan untuk paling kurang 1 (satu) hari kerja.</li>
    <li>Untuk menggunakan hak atas cuti tahunan sebagaimana dimaksud pada angka 1, PNS atau Calon PNS yang bersangkutan mengajukan permintaan secara tertulis kepada Pejabat Yang Berwenang Memberikan Cuti.</li>
    <li>Berdasarkan permintaan secara tertulis sebagaimana dimaksud pada angka 4, Pejabat Yang Berwenang Memberikan Cuti memberikan cuti tahunan kepada PNS atau Calon PNS yang bersangkutan.</li>
    <li>Permintaan dan pemberian cuti sebagaimana dimaksud pada angka 4 dan angka 5 dibuat menurut contoh dengan menggunakan formulir sebagaimana tercantum dalam Anak Lampiran 1.b yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>Dalam hal hak atas cuti tahunan sebagaimana dimaksud pada angka 1 yang akan digunakan di tempat yang sulit perhubungannya maka jangka waktu cuti tahunan tersebut dapat ditambah untuk paling lama 12 (dua belas) hari kalender.</li>
    <li>Hak atas cuti tahunan yang tidak digunakan dalam tahun yang bersangkutan, dapat digunakan dalam tahun berikutnya untuk paling lama 18 (delapan belas) hari kerja termasuk cuti tahunan dalam tahun berjalan</li>
    <li>Sisa hak atas cuti tahunan yang tidak digunakan dalam tahun bersangkutan dapat digunakan pada tahun berikutnya paling banyak 6 (enam) hari kerja.</li>
    <li>Hak atas cuti tahunan sebagaimana dimaksud pada angka 1 yang tidak digunakan dalam tahun berikutnya untuk paling lama 24 (dua puluh empat) hari kerja termasuk hak atas cuti tahunan dalam tahun berjalan.</li>
    <li>Hak atas cuti tahunan yang ditangguhkan sebagaimana dimaksud pada angka 11 dapat digunakan dalam tahun berikutnya selama 24 (dua puluh empat) hari kerja termasuk hak atas cuti tahunan dalam tahun berjalan</li>
    <li>Dalam hal terdapat PNS yang telah menggunakan Hak atas cuti tahunan dan masih terdapat sisa Hak atas cuti tahunan untuk tahun berjalan, dapat ditangguhkan penggunaannya olch Pejabat ang Berwenang Memberikan Cuti untuk tahun berikutnya, apabila terdapat kepentingan dinas mendesak.</li>
    <li>Hak atas sisa cuti tahunan yang ditangguhkan sebagaimana dimaksud pada angka 13 dihitung penuh dalam tahun berikutnya.</li>
    <li>PNS yang menduduki jabatan guru pada sckolah dan jabatan dosen pada perguruan tinggi yang mendapat liburan menurut peraturan perundang-undangan, disamakan dengan PNS yang telah nenggunakan hak cuti tahunan.</li>
    <li>Pemberian cuti tahunan harus memperhatikan kekuatan jumlah pegawai pada unit kerja yang bersangkutan.</li>
</ol>
</div>
  <div class="text-end">
            <a href="home_user.php" class="btn btn-primary">Kembali</a>
            <a href="cuti_besar.php" class="btn btn-outline-primary">Selanjutnya</a>
        </div>
</body>
</html>