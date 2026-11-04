<?php
session_Start();

if(!isset($_SESSION['username'])){
	echo '<script language="javascript">
	alert("Login Dulu Gak sih?"); document.location= "login.php"; </script>';
	exit();
}
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
    <title>E-CUTI BBPPTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
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
    <a href="home.php"><i class="bi bi-arrow-left"></i> Kembali</a>
    <a href="export_cuti.php" class="btn btn-success btn-dashboard"><i class="bi bi-file-earmark-x"></i> Ekspor Excel</a>
    <a href="cetak_cuti.php" class="btn btn-success btn-dashboard"><i class="bi bi-filetype-pdf"></i> Ekspor PDF</a>
</div>

    <!-- Konten -->
    <div class="content">
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Cetak Pengajuan Cuti</p>
            </blockquote>
        </figure>
  <div class="text-center p-2" style="background:#f1f1f1;">
    <small class="login">Login sebagai: <strong><?php echo $_SESSION['username']; ?></strong></small>
</div>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Cuti</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Unit Kerja</th>
                        <th>NIP</th>
                        <th>Masa</th>   
                        <th>Mulai Cuti</th>
                        <th>Hingga</th>
                        <th>No HP</th>
                        <th class='text-center'>Edit</th>
                        <th class='text-center'>Print</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include ('connect.php');
                    $sql = mysqli_query($koneksi, "SELECT * FROM cuti ORDER BY id_cuti DESC");
                    $no = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                        echo "
                        <tr>
                            <td>".$no."</td>
                            <td>".$row['id_cuti']."</td>
                            <td>".$row['nama']."</td>
                            <td>".$row['jabatan']."</td>
                            <td>".$row['unit_kerja']."</td>
                            <td>".$row['nip']."</td>
                            <td>".$row['masa_kerja']."</td>
                            <td>".$row['awal_tanggal']."</td>
                            <td>".$row['akhir_tanggal']."</td>
                            <td>".$row['no_hp']."</td>
                             <td class='text-center'>
                            <a href='edit.php?id_cuti=".$row['id_cuti']."'>
                            <i class='bi bi-box-arrow-up-left'></i>
                            </a>
                            </td>
                            <td class='text-center'>
                            <a href='print.php?nama=".$row['nama']."' target='_blank' title='Cetak Form Cuti'>
                            <i class='bi bi-printer'></i>
                            </a>
                            </td>
                        </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>