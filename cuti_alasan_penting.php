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
  <h4 class="text-center mb-4">Tata Cara Pengajuan Cuti Karena Alasan Penting</h4>
  <ol style="font-weight: normal; font-size: 16px; line-height: 1.7;">
    <li>PNS berhak atas cuti karena alasa penting, apabila; <br>
        a. ibuk, bapak, istri atau suami, anak, adik, kakak, mertua, atau menantu sakit keras atau meninggal dunia; <br>
        b. salah satu seorang keluarga yang dimaksud pada huruf a meninggal dunia, dan menurut peraturan perundang-undangan PNS yang bersangkutan harus mengurus hak-hak dari anggota keluarganya yang meninggal dunia; atau <br>
        c. melangsungkan perkawinan.
    </li>
    <li>Sakit keras sebagaimana dimaksud pada angka 1 huruf a dibuktiikan dengan melampirkan surat keterangan dengan melampirkan rawat inap dari unit Pelayaran Kesehatan.</li>
    <li>PNS laki-laki yang isterinya melahirkan/operasi caesar dapat diberikan cuti karena alasan penting dengan melampirkan surat keterangan rawat inap dari Unit Pelayanan Kesehatan.</li>
    <li>Dalam hal PNS mengalami musibah kebakaran rumah atau bencana alam, dapat diberikan cuti karena alasan penting dengan melampirkan surat keterangan paling rendah dari Ketua Rukun Tetangga.</li>
    <li>PNS yang ditempatkan pada perwakilan Republik Indonesia yang rawan dan/atau berbahaya dapat mengajukan cuti karena alasan penting guna memulihkan kondisi kejiwaan PNS yang bersangkutan</li>
    <li>Lamanya cuti karena alasan penting ditentukan olch Pejabat Yang Berwenang Memberikan Cuti paling lama 1 (satu) bulan.</li>
    <li>Untuk menggunakan hak atas cuti karena alasan penting sebagaimana dimaksud pada angka 1, PNS yang bersangkutan mengajukan permintaan secara tertulis kepada Pejabat Yang Berwenang Memberikan Cuti</li>
    <li>Berdasarkan permintaan secara tertulis sebagaimana dimaksud pada angka 7, Pejabat Yang Berwenang Memberikan Cuti memberikan cuti karena alasan penting kepada PNS yang bersangkutan.</li>
    <li>Permintaan dan pemberian cuti karena alasan penting sebagaimana dimaksud pada angka 7 dan angka 8 dibuat menurut contoh dengan menggunakan formulir sebagaimana tercantum dalam Anak Lampiran 1.b yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>Dalam hal yang mendesak, sehingga PNS yang bersangkutan tidak dapat menunggu keputusan dari Pejabat Yang Berwenang Memberikan Cuti, pejabat yang tertinggi di tempat PNS yang bersangkutan bekerja dapat memberikan izin sementara secara tertulis untuk menggunakan hak atas cuti karena alasan penting.</li>
    <li>Pejabat sebagaimana yang dimaksud pada angka 10 dapat memberikan izin sementara secara tertulis menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.c yang mcrupakan bagian tidak terpisahkan dari Peraturan Badan ini</li>
    <li>Pemberian izin sementara sebagaimana dimaksud pada angka 10 harus segera diberitalukan kepada Pejabat Yang Berwenang Memberikan Cuti.</li>
    <li>Pejabat Yang Berwenang Memberikan Cuti setelah menerima pemberitahuan sebagaimana dimaksud pada angka 12 memberikan hak atas cuti karena alasan penting kepada PNS yang bersangkutan. </li>
    <li>Selama menggunakan hak atas cuti karena alasan penting, PNS yang bersangkutan menerima penghasilan PNS.</li>
    <li> Penghasilan sebagaimana dimaksud pada angka 14, terdiri atas gaji pokok, unjangan keluarga, tunjangan pangan, dan tunjangan jabatan sampai dengan ditetapkannya Peraturan Pemerintah yang mengatur gaji, tunjangan, dan fasilitas PNS</li>
</ol>
</div>
  <div class="text-end">
            <a href="home_user.php" class="btn btn-primary">Kembali</a>
            <a href="cuti_bersama.php" class="btn btn-outline-primary">Selanjutnya</a>
        </div>
</body>
</html>