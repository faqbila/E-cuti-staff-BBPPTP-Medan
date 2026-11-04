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
  <h4 class="text-center mb-4">Tata Cara Pengajuan Cuti Sakit</h4>
  <ol style="font-weight: normal; font-size: 16px; line-height: 1.7;">
    <li>Setiap PNS yang menderita sakit berhak atas cuti sakit.</li>
    <li>PNS yang sakit 1 (satu) hari menyampaikan surat keterangan sakit secara tertulis kepada atasan langsung dengan melampirkan surat keterangan dokter.</li>
    <li>PNS yang sakit lebih dari 1 (satu) hari sampai dengan 14 (empat belas) hari berhak atas cuti sakit, dengan ketentuan bahwa PNS yang bersangkutan harus mengajukan permintaan secara tertulis kepada Pejabat Yang Berwenang Memberikan Cuti dengan melampirkan surat keterangan dokter.</li>
    <li> PNS yang menderita sakit lebih dari 14 (empat belas) hari berhak atas cuti sakit, dengan ketentuan bahwa PNS yang bersangkutan harus mengajukan permintaan secara tertulis kepada Pejabat Yang Berwenang Memberikan Cuti dengan melampirkan surat ketcrangan dokter pemerintah.</li>
    <li>Dokter pemerintah sebagaimana dimaksud dalam angka 4 merupakan dokter yang berstatus PNS atau dokter yang bekerja pada unit pelayanan keschatan pemerintah.</li>
    <li>Surat Keterangan dokter sebagaimana dimaksud pada angka 3 dan 4 paling sedikit memuat pernyataan tentang perlunya diberikan cuti, lamanya cuti dan ketcrangan lain yang diperlukan.</li>
    <li>Hak atas cuti sakit diberikan untuk waktu paling lama 1 (satu) tahun.</li>
    <li>Jangka waktu cuti sakit sebagaimana dimaksud pada angka 7 dapat ditambah untuk paling lama 6 (enam) bulan apabila diperlukan, berdasarkan surat keterangan tim penguji kesehatan yang ditctapkan oleh menteri yang menyelenggarakan urusan pemerintahan di bidang kesehatan.</li>
    <li>PNS yang tidak sembuh dari penyakitnya dalam jangka waktu sebagaimana dimaksud pada angka 8, harus diuji kembali kesehatanya oleh tim penguji keschatan yang ditetapkan oleh menteri yang menyelenggarakan urusan pemerintahan di bidang kesehatan.</li>
    <li>Apabila berdasarkan hasil pengujian kesehatan sebagaimana dimaksud pada angka 9 PNS belum sembuh cdari penyakitnya, PNS yang bersangkutan diberhentikan dengan hormat dari jabatannya karena sakit dengan mendapat uang tunggu sesuai dengan ketentuan peraturan perundang-undangan.</li>
    <li>PNS yang mengalami gugur kandungan berhak atas cuti sakit untuk paling lama 1 1/2 (satu setengah) bulan.</li>
    <li>Untuk menggunakan hak atas cuti sakit sebagaimana dimaksud pada angka 1, PNS yang bersangkutan mengajukan permintaan secara tertulis kepada Pejabat Yang Benwenang Memberikan Cuti.</li>
    <li>Berdasarkan permintaan sccara tertulis scbagaimana dimaksud pada angka 12, Pejabat Yang Berwenang Memberikan Cuti memberikan cuti sakit kepada PNS yang bersangkutan.</li>
    <li>Permintaan dan pemberian cuti sakit sebagaimana dimaksud pada angka 12 dan angka 13 dibuat menurut contoh dengan menggunakan formulir scbagaimana tercantum dalam Anak Lampiran 1.b yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>PNS yang mengalami kecelakaan dalam dan oleh karena menjalankan tugas kewajibannya sehingga yang bersangkutan perlu mendapat perawatan berhak atas cuti sakit sampai yang bersangkutan sembuh dari penyakitnya.</li>
    <li>Sclama menjalankan cuti sakit, PNS yang bersangkutan menerima penghasilan PNS.</li>
    <li>Penghasilan sebagaimana dimaksud pada angka 16, terdiri atas gaji pokok, tunjangan keluarga, tunjangan pangan dan tunjangan jabatan sampai dengan ditetapkannya Peraturan Pemerintah yang mengatur gaji, tunjangan, dan fasilitas PNS.</li>
</ol>
</div>
  <div class="text-end">
            <a href="home_user.php" class="btn btn-primary">Kembali</a>
            <a href="cuti_melahirkan.php" class="btn btn-outline-primary">Selanjutnya</a>
        </div>
</body>
</html>