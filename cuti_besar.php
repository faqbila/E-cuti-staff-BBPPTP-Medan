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
  <h4 class="text-center mb-4">Tata Cara Pengajuan Cuti Besar</h4>
  <ol style="font-weight: normal; font-size: 16px; line-height: 1.7;">
    <li> PNS yang telah bekerja paling singkat 5 (lima) tahun sccara terus menerus berhak atas cuti besar paling lama 3 (tiga) bulan.</li>
    <li>PNS yang menggunakan hak atas cuti besar tidak berhak atas cuti tahunan dalam tahun yang bersangkutan.</li>
    Contoh:
Sdr. Aldi NIP, 198001122014011005 telah bekerja secara terus menerus sejak Januari 2014. Pada tanggal 10 Februari 2019 mengajukan permintaan cuti besar selama 3 (tiga) bulan terhitung mulai 1 Maret 2019 sampai dengan 31 Mei 2019. Kemudian pada tanggal 18 Februari 2019 Pejabat Yang Berwenang Memberikan Cuti, memberikan cuti besar sesuai permintaan PNS yang bersangkutan.
Dalam hal demikian maka Sdr. Aldi: <br>
a. Tidak berhak atas cuti tahunan untuk tahun 2019. <br>
b. Cuti besar berikutnya baru dapat diajukan paling Cepat 1 Juni 2024.
<li>PNS yang telah menggunakan hak atas cuti tahunan pada tahun yang bersangkutan maka hak atas cuti besar yang bersangkutan diberikan dengan memperhitungkan hak atas cuti tahunan yang telah digunakan.
    Contoh:
Sdr. Ahmad NIP. 198501122014011009 telah bekerja sccara terus menerus sejak 1 Januari 2014. Pada bulan Maret 2019 yang bersangkutan telah menggunakan hak atas cuti tahunan tahun 2019 selama 12 (dua belas) hari kerja. Pada tanggal 4 November 2019 mengajukan permintaan cuti besar selama 3 (tiga) bulan terhitung mulai 18 November 2019 sampai dengan 18 Februari 2020. Dalam hal Pcjabat Yang Berwenang Memberikan Cuti akan memberikan cuti selama 3 (tiga) bulan maka: <br>
a. Pejabat Yang Berwvenang Memberikan Cuti, saat menetapkan pemberian cuti besar tetap mempertimbangkan cuti tahunan yang sudah digunakan selama 12 (dua belas) hari kerja sebelum mengajukan permintaan cuti besar. <br>
b. Hak atas cuti besar Sdr. Ahmad diberikan paling lama terhitung mulai 18 November 2019 sampai dengan 31 Januari 2020. <br>
c. Sdr, Ahmad masih mempunyai hak atas cuti tahunan pada tahun 2020. <br>
d. Cuti besar berikutnya baru dapat diajukan paling cepat 1 Februari 2025.
</li>
<li>PNS yang menggunakan hak atas cuti besar dan masih mempunyai sisa hak atas cuti tahunan tahun sebelumnya maka dapat menggunakan sisa hak atas cuti tahunan tersebut.</li>
<li>Ketentuan sebagaimana dimaksud pada angka 1, dikecualikan bagi PNS yang masa kerjanya belum 5 (lima) tahun untuk kepentingan agama, yaitu menunaikan ibadah haji pertama kali dengan melampirkan jadwal keberangkatan/kelompok terbang (kloter) yang dikeluarkan oleh instansi yang bertanggung jawab dalam penyelenggaraan haji.</li>
<li>Untuk menggunakan hak atas cuti besar sebagaimana dimaksud pada angka 1, PNS yang bersangkutan mengajukan permintaan secara tertulis kepada Pejabat Yang Berwenang Memberikan Cuti.</li>
<li>Berdasarkan permintaan secara tertulis sebagaimana dimaksud pada angka 6, Pejabat Yang Berwenang Memberikan Cuti memberikan cuti besar kepada PNS yang bersangkutan.</li>
<li>Permintaan dan pemberian cuti besar sebagaimana dimaksud pada angka 6 dan 7 dibuat menurut contoh dengan menggunakan formulir sebagaimana tercantum dalam Anak Lampiran 1.b yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
<li>Hak cuti besar dapat ditangguhkan penggunaannya olch Pejabat Yang Berwenang Memberikan Cuti untuk paling lama 1 (satu) tahun apabila terdapat kepentingan dinas mendesak, kecuali untuk kepentingan agama.</li>
<li>PNS yang menggunakan cuti besar kurang dari 3 (tiga) bulan, maka sisa cuti besar yang menjadi haknya hapus</li>
<li>Selama menggunakan hak atas cuti besar, PNS yang bersangkutan menerima penghasilan PNS.</li>
<li> Penghasilan scbagaimana dimaksud pada angka 11, terdiri atas gaji pokok, tunjangan keluarga, dan tunjangan pangan sampai dengan ditetapkannya Peraturan Pemerintah yang mengatur gaji, tunjangan, dan fasilitas PNS.</li>
</ol>
</div>
  <div class="text-end">
            <a href="home_user.php" class="btn btn-primary">Kembali</a>
            <a href="cuti_sakit.php" class="btn btn-outline-primary">Selanjutnya</a>
        </div>
</body>
</html>