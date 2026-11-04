<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>alert("Login terlebih dahulu."); window.location.href = "login.php";</script>';
    exit();
}
?>
<?php
if (isset($_POST['tambah'])) {
    include('connect.php');

    $username = $_POST['username'];

    if (empty($username)) {
        header("Location: Form_Pegawai.php?success=0&message=Username wajib diisi!");
        exit;
    }
    $password = $_POST['password'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];
    $masa_kerja = $_POST['masa_kerja'];
    $unit_kerja = $_POST['unit_kerja'];
    $no_hp = $_POST['no_hp']; 
    $sisa_cuti = $_POST['sisa_cuti'];
    $dibuat_oleh = $_SESSION['username']; // pakai username sebagai "dibuat oleh"

   $sql = mysqli_query($koneksi, "INSERT INTO pegawai VALUES (
    '$username','$password','$nip','$jabatan','$unit_kerja','$masa_kerja',
    '$no_hp','$sisa_cuti','$dibuat_oleh')");

    if ($sql) {
        header("Location: Form_Pegawai.php?success=1");
    } else {
        header("Location: Form_Pegawai.php?success=0&message=Gagal menyimpan data");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo2.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CUTI BBPPTP</title>
</head>
<body>
    <html>
<head>
    <title>Form Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&family=Poppins:ital,wght@0,300;0,700;1,400;1,500;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CutiStyle.css">
</head>
<figure class="text-center">
  <blockquote class="blockquote" >
    <img src="Logo_Kementerian_Pertanian_Republik_Indonesia.svg" alt="logo Website" width="200" >
    <p>Form Pegawai BBPTP MEDAN</p>
  </blockquote>
</figure>
<form class="formulir" action="Form_Pegawai.php" method="POST"><div>
    <content class="layout">
        <p>Data Pegawai </p>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukan username">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input type="text" class="form-control" name="password" placeholder="Masukan username">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">NIP</label>
        <input type="text" class="form-control" name="nip" placeholder="Masukan username">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
        <input type="text" class="form-control" name="jabatan" placeholder="Masukan username">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Masa Kerja</label>
        <input type="text" class="form-control" name="masa_kerja" placeholder="Masukan username">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Unit Kerja</label>
        <input type="text" class="form-control" name="unit_kerja" placeholder="Masukan username">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">No HP</label>
        <input type="text" class="form-control" name="no_hp" placeholder="Masukan username">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Sisa cuti</label>
        <input type="text" class="form-control" name="sisa_cuti" placeholder="Masukan username">
        </div>
</form>
<div class="tombol-utama">
<button type="submit" class="btn btn-outline-primary me-4" name="tambah">Tambahkan</button>
</div>
<div class="d-flex justify-content-end mb-3">
  <div class="col-auto">
    <button type="button" onclick="resetForm()" class="btn btn-primary me-2 mb-3">Reset Formulir</button>
  </div>
  <div class="col-auto">
 <a href="Pegawai.php" class="btn btn-outline-danger">Kembali</a>
  </div>
</div>

<script>
  function resetForm() {
  document.querySelector("form").reset();
  }
</script>

<script>
  document.querySelector("form").addEventListener("submit", function (e) {
    const nama = document.getElementsByName("username")[0].value.trim();

    if (nama === "") {
      alert("Kolom Nama harus diisi!");
      e.preventDefault(); // Hentikan submit ke server
    }
  });
</script>

 </body>
</html>