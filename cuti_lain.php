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
  <h4 class="text-center mb-4">Ketentuan Lain-Lain</h4>
  <ol style="font-weight: normal; font-size: 16px; line-height: 1.7;">
    <li>PNS yang sedang menggunakan hak atas cuti tahunan, cuti besar, cuti karena alasan penting, dan cuti bersama dapat dipanggil kembali bekerja apabila kepentingan dinas mendesak.</li>
    <li>Dalam hal PNS dipanggil kembali bekerja, jangka waktu cuti yang belum dijalankan tetap menjadi hak PNS yang bersangkutan.</li>
    <li>Hak atas cuti tahunan, cuti besar, cuti sakit, cuti melahirkan, dan cuti karena alasan penting yang akan dijalankan di uar negeri, hanya dapat diberikan oleh PPK</li>
    <li>Dalam hal yang mendesak, schingga PNS yang bersangkutan tidak dapat menunggu keputusan dari PPK sebagaimana dimaksud pada angka 3, pejabat yang tertinggi di tempat PNS yang bersangkutan bekerja dapat membcrikan izin scmentara sccara tertulis untuk menggunakan hak atas cuti</li>
    <li>Pemberian izin sementara harus segera diberitahukan kepada PPK.</li>
    <li>PPK setelah menerima pemberitahuan sebagaimana dimaksud pada angka 5 memberikan hak atas cuti kepada PNS yang bersangkutan.</li>
    <li>Ketentuan mengenai cuti sakit, cuti melahirkan, dan cuti karena alasan penting berlaku secara mutatis mutandis terhadap Calon PNS.</li>
    <li>PNS yang sedang menjalankan cuti di luar tanggungan negara pada saat diberlakukannya Peraturan Pemerintah Nomor 11 Tahun 2017 tentang Manajemen Pegawai Negeri Sipil, setelah selesai menjalankan cuti di luar tanggungan negara wajib melaporkan diri secara tertulis kepada instansi induknya paling lama 1 (satu) bulan setelah selesai  menjalankan cuti di luar tanggungan negara</li>
    <li>PNS yang telah selesai menjalankan cuti di luar tanggungan negara dan telah diaktifkan kembali sebagai PNS, dapat mengajukan cuti tahunan apabila telah bekerja secara terus-menerus paling singkat 1 (satu) tahun sejak diaktifkan kembali sebagai PNS. </li>
    <li>Penghasilan lain yang antara lain berupa tunjangan kinerja, tunjangan perbaikan penghasilan dibayarkan kepada PNS yang sedang menjalankan cuti sesuai dengan ķetentuan peraturan perundang-undangan.</li>
</ol>
</div>
  <div class="text-end">
            <a href="home_user.php" class="btn btn-primary">Kembali</a>
        </div>
</body>
</html>