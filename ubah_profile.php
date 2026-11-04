<?php
session_start();
include('koneksi_login_pegawai.php');

if (!isset($_SESSION['username'])) {
    echo '<script language="javascript">
        alert("Login Dulu Gak sih?"); document.location= "login_pegawai.php"; </script>';
    exit();
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);
$nama = $data['nama'];
// Ambil data lama
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);

// Proses update jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $masa_kerja = $_POST['masa_kerja'];
    $no_hp = $_POST['no_hp'];

    // Update data ke database
    $update = mysqli_query($koneksi, "UPDATE pegawai SET 
        password = '$password',
        nama = '$nama',
        jabatan = '$jabatan',
        masa_kerja = '$masa_kerja',
        no_hp = '$no_hp'
        WHERE username = '$username'
    ");

     if ($update) {
        // Redirect ke profil_user.php dengan parameter updated=1
        header("Location: profil_user.php?updated=1");
        exit();
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Pegawai</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }
  </style>
</head>

<body>
<div class="container mt-4">
    <h3 class="text-center mb-4">Ubah Biodata Pegawai</h3>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="<?php echo $data['jabatan']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Masa Kerja</label>
            <input type="text" name="masa_kerja" class="form-control" value="<?php echo $data['masa_kerja']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" required>
        </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
        </div>
        <div class="text-end">
            <a href="edit_profile.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </div>
        
    </form>
</div>
<!-- Tambahkan di bagian akhir <body> atau sebelum penutup </body> -->

<?php if (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil diperbarui!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>
</body>
</html>
