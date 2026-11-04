<?php
session_start();
include('connect.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);
$nama = $data['nama'];
if (!isset($_GET['id_cuti'])) {
    echo "ID cuti tidak ditemukan.";
    exit();
}

$id_cuti = mysqli_real_escape_string($koneksi, $_GET['id_cuti']);
$query = mysqli_query($koneksi, "SELECT * FROM cuti WHERE id_cuti = '$id_cuti'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit();
}
?>
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
    <a href="home.php"><i class="bi bi-house"></i></i> Beranda</a>
    <a href="pegawai.php"><i class="bi bi-person-vcard"></i></i> Data Pegawai</a>
    <a href="Form_Cuti.php"><i class="bi bi-plus-circle"></i> Tambahkan</a>
    <a href="print_cuti.php"><i class="bi bi-printer"></i> Cetak</a>
    <a href="hapus_cuti.php"><i class="bi bi-trash"></i> Hapus</a>
    <a href="edit_cuti.php"><i class="bi bi-pencil-square"></i> Edit</a>
    <a href="riwayat_cuti.php"><i class="bi bi-clock-history"></i></i> Riwayat</a>
    <a href="logout.php"><i class="bi bi-box-arrow-left"></i> Log Out</a>
    <a href="export_cuti.php" class="btn btn-success btn-dashboard"><i class="bi bi-file-earmark-x"></i> Ekspor Excel</a>
    <a href="cetak_cuti.php" class="btn btn-success btn-dashboard"><i class="bi bi-filetype-pdf"></i> Ekspor PDF</a>
</div>
    <!-- Konten -->
    <div class="content">
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Detail Pengajuan Cuti</p>
            </blockquote>
        </figure>
    <div class="text-center p-2" style="background:#f1f1f1;">
    <small class="login">Login sebagai: <strong><?php echo $nama ?></strong></small>
</div>
       <body class="p-4">
    <div class="container mt-4 mb-5">
    <h3 class="text-center mb-4">Biodata Pengajuan Cuti</h3>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th style="width: 30%">Nama</th>
                        <td><?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td><?php echo $data['jabatan']; ?></td>
                    </tr>
                    <tr>
                        <th>NIP</th>
                        <td><?php echo $data['nip']; ?></td>
                    </tr>
                    <tr>
                        <th>Masa Kerja</th>
                        <td><?php echo $data['masa_kerja']; ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Cuti</th>
                        <td><?php echo $data['jenis_cuti']; ?></td>
                    </tr>
                    <tr>
                        <th>Alasan</th>
                        <td><?php echo $data['alasan']; ?></td>
                    </tr>
                    <tr>
                        <th>Lama Cuti</th>
                        <td><?php echo $data['lama_cuti']; ?></td>
                    </tr>
                    <tr>
                        <th>Mulai Cuti</th>
                        <td><?php echo $data['awal_tanggal']; ?></td>
                    </tr>
                    <tr>
                        <th>Hingga</th>
                        <td><?php echo $data['akhir_tanggal']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Selama Cuti</th>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <td><?php echo $data['no_hp']; ?></td>
                    </tr>
                    <tr>
                        <th>Sisa Cuti</th>
                        <td><?php echo $data['catatan']; ?></td>
                    </tr>
                    <tr>
                        <th>Dibuat Oleh</th>
                        <td><?php echo $data['nama']; ?></td>
                    </tr>
                </tbody>
            </table>
<div class="d-flex justify-content-end mb-3 ">
            <div class="text-end">
                <a href="home.php" class="btn btn-primary me-3">← Kembali</a>
            </div>
            <div class="text-end">
                <a href="edit.php" class="btn btn-primary me-3">  <i class='bi bi-pencil-square'></i> Edit</a>
            </div>
            <div class="text-end">
               <a href="setujui_cuti.php?id_cuti=<?php echo $data['id_cuti']; ?>" class="btn btn-success " onclick="return confirm('Yakin ingin menyetujui cuti ini?')">
    <i class="bi bi-check2-circle"></i> Setujui
</a>

            </div>

        </div>
    </div>
</div>


</body>
</html>