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
                <p>Riwayat Pengajuan Cuti Pegawai</p>
            </blockquote>
        </figure>
   <div class="d-flex justify-content-between align-items-center p-2" style="background:#f1f1f1;">
   <div class="text-center p-2" style="background:#f1f1f1;">
   <small class="login">Login sebagai: <?php echo $nama; ?></small>
</div>

</div>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Tanggal Cuti</th>
                        <th>Hingga</th>
                        <th>Sisa Cuti</th>
                        <th>Disetujui</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include ('connect.php');
                   $cari = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';

$username = $_SESSION['username'];

$query_user = mysqli_query($koneksi, "SELECT username FROM pegawai WHERE username = '$username'");
$data_user = mysqli_fetch_assoc($query_user);
$nip = $data_user['username'];
$sql = mysqli_query($koneksi, "SELECT * FROM riwayat_cuti WHERE nip = '$nip' ORDER BY awal_tanggal DESC");
 if (!$sql) {
    die("Query error: " . mysqli_error($koneksi));
}

                    $no = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                        echo "
                        <tr>
                            <td>".$no."</td>
                            <td>".$row['nama']."</td>
                            <td>".$row['nip']."</td>
                            <td>".$row['awal_tanggal']."</td>
                            <td>".$row['akhir_tanggal']."</td>
                            <td>".$row['catatan']."</td>
                            <td>".$row['dibuat_oleh']."</td>
                            </tr>";
                        $no++;
                    }
                    if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());


}

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>