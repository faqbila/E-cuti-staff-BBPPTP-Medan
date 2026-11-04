<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>alert("Login terlebih dahulu."); window.location.href = "login_pegawai.php";</script>';
    exit();
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include('connect.php');
$username = $_SESSION['username'];

// Ambil data pegawai berdasarkan username
$sql_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
$data_pegawai = mysqli_fetch_assoc($sql_pegawai);
?>

<?php

if (isset($_POST['tambah'])) {
    include('connect.php');
    $username = $_SESSION['username'];

// Ambil ulang data pegawai dari database, jangan dari $_POST
    $sql_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
    $data_pegawai = mysqli_fetch_assoc($sql_pegawai);

    $nama = $data_pegawai['nama'];
    $jabatan = $data_pegawai['jabatan'];
    $nip = $data_pegawai['username']; 
    $masa_kerja = $data_pegawai['masa_kerja'];
    $catatan = $data_pegawai['catatan'];
   if (empty($nip)) {
        header("Location: Form_Cuti.php?success=0&message=Nama wajib diisi!");
        exit;
    }// karena username = NIP

    $jenis_cuti = $_POST['jenis_cuti'];
    $alasan = $_POST['alasan'];
    $lama_cuti = $_POST['lama_cuti'];
    $waktu = $_POST['waktu'] ?? null;
    $awal_tanggal = $_POST['awal_tanggal'];
    $akhir_tanggal = $_POST['akhir_tanggal'];
    $catatan = $_POST['catatan'];
    $alamat = $_POST['alamat'];
    $no_hp = $data_pegawai['no_hp']; 
    $dibuat_oleh = $_SESSION['username']; // pakai username sebagai "dibuat oleh"

   $sql = mysqli_query($koneksi, "INSERT INTO cuti (
    nama, jabatan, nip, masa_kerja,
    jenis_cuti, alasan, lama_cuti, waktu,
    awal_tanggal, akhir_tanggal, catatan, alamat, no_hp, dibuat_oleh
) VALUES (
    '$nama','$jabatan','$nip','$masa_kerja',
    '$jenis_cuti','$alasan','$lama_cuti','$waktu',
    '$awal_tanggal','$akhir_tanggal','$catatan','$alamat','$no_hp','$dibuat_oleh')");
if ($sql) {
    echo "
    <script>
        // Tunda sedikit agar animasi terlihat
        setTimeout(function() {
            alert('Data cuti berhasil ditambahkan!');
            window.location.href = 'home_user.php';
        }, 300);
    </script>
    ";
    exit();
} else {
   echo "
<script>
    Swal.fire({
        title: 'Sukses!',
        text: 'Data cuti berhasil ditambahkan!',
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'home_user.php';
        }
    });
</script>
";

    exit();
}
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
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
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
    <p>Form Instruksi Kerja Cuti</p>
  </blockquote>
</figure>
<form class="formulir" action="Form_Cuti_User.php" method="POST"><div>
    <content class="layout">
        <p>Data Pegawai </p>
        <div class="mb-3">
  <label for="nama" class="form-label">Nama</label>
  <input type="text" class="form-control" name="nama" value="<?= $data_pegawai['nama'] ?>" readonly>
</div>

<div class="mb-3">
  <label for="jabatan" class="form-label">Jabatan</label>
  <input type="text" class="form-control" name="jabatan" value="<?= $data_pegawai['jabatan'] ?>" readonly>
</div>


<div class="mb-3">
  <label for="nip" class="form-label">NIP</label>
  <input type="text" class="form-control" name="nip" value="<?= $data_pegawai['username'] ?>" readonly>
</div>

<div class="mb-3">
  <label for="masa_kerja" class="form-label">Masa Kerja</label>
  <input type="text" class="form-control" name="masa_kerja" value="<?= $data_pegawai['masa_kerja'] ?>" readonly>
</div>
    </content>
 <content class="layout">
    <P>Jenis Cuti Yang Diambil</P>
    <div class="mb-3"> 
    <select class="form-select" aria-label="Default select example" name="jenis_cuti">
  <option selected value="">Jenis Cuti</option>
  <option value="Cuti Tahunan">Cuti Tahunan</option>
  <option value="Cuti Besar">Cuti Besar</option>
  <option value="Cuti Sakit">Cuti Sakit</option>
  <option value="Cuti Melahirkan">Cuti Melahirkan</option>
  <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
  <option value="Cuti di luar Tanggungan Negara">Cuti di luar Tanggungan Negara</option>
    </select>
    </content>
    <br>
    <content class="layout">
        <div class="mb-3">
            <p>Alasan Cuti</p>
  <label for="exampleFormControlTextarea1" class="form-label">Alasan Cuti</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="alasan" rows="3"></textarea>
</div>
    </content>
<content class="layout">
    <p>Lamanya Cuti</p>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Selama</label>
        <input type="text" class="form-control" name="lama_cuti" placeholder="">
        </div>
      <div class="form-check">
    <input class="form-check-input" type="radio" name="waktu" id="radioHari" value="hari">
    <label class="form-check-label" for="radioHari">Hari</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="waktu" id="radioBulan" value="bulan">
    <label class="form-check-label" for="radioBulan">Bulan</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="waktu" id="radioTahun" value="tahun">
    <label class="form-check-label" for="radioTahun">Tahun</label>
  </div>
<br>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Mulai Tanggal</label>
  <input type="date" class="form-control" name="awal_tanggal" placeholder="Masukan tanggal Awal">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Sampai Tanggal</label>
  <input type="date" class="form-control" name="akhir_tanggal" placeholder="Masukan tanggal Akhir">
</div>
</content>
<content class="layout">
    <p>Catatan Cuti</p>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Sisa Cuti Tahunan</label>
   <input type="text" class="form-control" name="catatan" value="<?= $data_pegawai['sisa_cuti'] ?>" readonly>
</div>
</content>
<content class="layout">
    <p>Alamat selama Menjalankan Cuti</p>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="no_hp" class="form-label">No HP</label>
  <input type="text" class="form-control" name="no_hp" value="<?= $data_pegawai['no_hp'] ?>" readonly>
</div>
</content>
</form>
<div class="tombol-utama">
<button type="submit" class="btn btn-outline-primary me-4" name="tambah">Tambahkan</button>
</div>
<div class="d-flex justify-content-end mb-3">
  <div class="col-auto">
    <button type="button" onclick="resetForm()" class="btn btn-primary me-2 mb-3">Reset Formulir</button>
  </div>
  <div class="col-auto">
 <a href="home_user.php" class="btn btn-outline-danger">Kembali</a>
  </div>
</div>

<script>
  function resetForm() {
  document.querySelector("form").reset();
  }
</script>

<script>
  document.querySelector("form").addEventListener("submit", function (e) {
    const nama = document.getElementsByName("nama")[0].value.trim();

    if (nama === "") {
      alert("Kolom Nama harus diisi!");
      e.preventDefault(); // Hentikan submit ke server
    }
  });
</script>

 </body>
</html>