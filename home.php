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
?>

<!DOCTYPE html>
<html lang="en">
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
<body>

<!-- Sidebar -->
<div class="sidebar">
    <img src="logo2.png" alt="Logo" style="width: 100px; margin-bottom: 15px; margin-left: 60px;">
    <h5 class="text-center">E-CUTI BBPPTP MEDAN</h5>
    <a href="home.php"><i class="bi bi-house"></i> Beranda</a>
    <a href="pegawai.php"><i class="bi bi-person-vcard"></i> Data Pegawai</a>
    <a href="Form_Cuti.php"><i class="bi bi-plus-circle"></i> Tambahkan</a>
    <a href="print_cuti.php"><i class="bi bi-printer"></i> Cetak</a>
    <a href="hapus_cuti.php"><i class="bi bi-trash"></i> Hapus</a>
    <a href="edit_cuti.php"><i class="bi bi-pencil-square"></i> Edit</a>
    <a href="riwayat_cuti.php"><i class="bi bi-clock-history"></i> Riwayat</a>
    <a href="logout.php"><i class="bi bi-box-arrow-left"></i> Log Out</a>
    <a href="export_cuti.php" class="btn btn-success btn-dashboard"><i class="bi bi-file-earmark-x"></i> Ekspor Excel</a>
    <a href="cetak_cuti.php" class="btn btn-success btn-dashboard"><i class="bi bi-filetype-pdf"></i> Ekspor PDF</a>
</div>

<!-- Konten -->
<div class="content">
    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Daftar Pengajuan Cuti</p>
        </blockquote>
    </figure>

    <div class="text-center p-2" style="background:#f1f1f1;">
   <small class="login">Login sebagai: <?php echo $nama; ?></small>
</div>

    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th> 
                    <th>Nama</th>
                    <th>Jabatan</th>                          
                    <th>Mulai Cuti</th>
                    <th>Hingga</th>
                    <th>Dibuat Oleh</th>
                    <th>Waktu Input</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($koneksi, "
                    SELECT cuti.*, pegawai.nama AS nama_pembuat 
                    FROM cuti 
                    LEFT JOIN pegawai ON cuti.dibuat_oleh = pegawai.username 
                  ORDER BY cuti.id_cuti DESC
                ");

                $no = 1;
                while ($row = mysqli_fetch_array($sql)) {
                    echo "
                    <tr>
                        <td>".$no++."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['jabatan']."</td>
                        <td>".$row['awal_tanggal']."</td>
                        <td>".$row['akhir_tanggal']."</td>
                        <td>".($row['nama_pembuat'] ?? $row['dibuat_oleh'])."</td>
                        <td>".date("H:i - d F Y", strtotime($row['waktu_input']))."</td>
                        <td>
                            <a href='detail_cuti.php?id_cuti=".$row['id_cuti']."' class='btn btn-primary btn-sm'>
                                <i class='bi bi-person-vcard-fill'></i> Detail
                            </a>
                        </td>
                        <td>
                            <a href='setujui_cuti.php?id_cuti=".$row['id_cuti']."' class='btn btn-success btn-sm' onclick='return confirm(\"Yakin ingin menyetujui cuti ini?\")'>
                                <i class='bi bi-check2-circle'></i> Setujui
                            </a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
