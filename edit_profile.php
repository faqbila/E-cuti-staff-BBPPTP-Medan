<?php
session_start();
include('koneksi_login_pegawai.php');

if (!isset($_SESSION['username'])) {
    header("Location: login_pegawai.php");
    exit();
}
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
                <p>Edit Profile Pegawai</p>
            </blockquote>
        </figure>
    <div class="text-center p-2" style="background:#f1f1f1;">
    <small class="login">Login sebagai: <?php echo $nama; ?></small>
</div>
        <div class="container mt-4">
    <h4 class="text-center mb-4">Biodata Pengguna</h4>
   <div class="row align-items-start">
   <div class="col-md-4 text-center">
    <?php
    $foto = !empty($data['foto']) ? 'uploads/' . $data['foto'] : 'foto.jpg';
    ?>
    <img src="<?php echo $foto; ?>" alt="Foto Pengguna" style="width: 200px; height: 266px; object-fit: cover; border: 1px solid #ccc;">
    <p class="mt-2">Foto 3x4</p>

    <!-- Form Upload Foto -->
    <form action="upload_foto.php" method="post" enctype="multipart/form-data" class="mt-3">
        <div class="mb-2">
            <input type="file" name="foto" id="foto" accept="image/*" required class="form-control form-control-sm">
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Upload Foto</button>
    </form>
</div>

    <div class="col-md-8">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nama</th>
                <td><?php echo $data['nama']; ?></td>
            </tr>
            <tr>
                <th>NIP</th>
                <td><?php echo $data['username']; ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td><?php echo $data['jabatan']; ?></td>
            </tr>
            <tr>
                <th>Masa Kerja</th>
                <td><?php echo $data['masa_kerja']; ?></td>
            </tr>
            <tr>
                <th>No HP</th>
                <td><?php echo $data['no_hp']; ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $data['username']; ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $data['password']; ?></td>
            </tr>
            
        </table>
        <div class="d-flex justify-content-end mb-3">
  <div class="col-auto">
 <a href="ubah_profile.php" class="btn btn-primary">Ubah</a>
  </div>
</div>
    </div>
</div>

</body>
</html>