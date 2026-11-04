<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo2.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>E-CUTI BBPPTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tampilan2.css">
    <link rel="stylesheet" href="CutiStyle.css">
</head>
<body >
<figure class="text-center">
  <blockquote class="blockquote" >
    <p>Daftar Cuti Pegawai</p>
  </blockquote>
</figure>
<?php include('connect.php'); ?>

<?php
if (isset($_GET['id_cuti'])) {
    $id = $_GET['id_cuti'];
    $sql_edit = mysqli_query($koneksi, "select * from cuti where id_cuti='$id'");
    while ($data = mysqli_fetch_array($sql_edit)) {
        $ed_id_cuti = $data['id_cuti'];
        $ed_nama = $data['nama'];
        $ed_jabatan = $data['jabatan'];
        $ed_unit_kerja = $data['unit_kerja'];
        $ed_nip = $data['nip'];
        $ed_masa_kerja = $data['masa_kerja'];
        $ed_jabatan = $data['jabatan'];
        $ed_alasan = $data['alasan'];
        $ed_lama_cuti = $data['lama_cuti'];
        $ed_waktu = $data['waktu'];
        $ed_awal_tanggal = $data['awal_tanggal'];
        $ed_akhir_tanggal = $data['akhir_tanggal'];
        $ed_catatan = $data['catatan'];
        $ed_alamat = $data['alamat'];
        $ed_no_hp = $data['no_hp'];
    
        ?><div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <form  action="edit.php" method="POST" class="p-4 border rounded shadow bg-white">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">ID Cuti</label>
        <!-- Tampilan ID Cuti untuk user (tidak bisa diubah) -->
<input class="form-control" type="text" placeholder="<?php echo $ed_id_cuti ?>" disabled>

<!-- Hidden field agar dikirim ke PHP -->
<input type="hidden" name="id_cuti" value="<?php echo $ed_id_cuti ?>">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama"  value="<?php echo $ed_nama?>">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
        <input type="text" class="form-control" name="jabatan"  value="<?php echo $ed_jabatan?>">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Unit kerja</label>
        <input type="text" class="form-control" name="unit_kerja" value="<?php echo $ed_unit_kerja?>">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">NIP</label>
        <input type="text" class="form-control" name="nip"  value="<?php echo $ed_nip ?>">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Masa Kerja</label>
        <input type="text" class="form-control" name="masa_kerja"  value="<?php echo $ed_masa_kerja ?>">
        </div>
 <content class="layout">
    <P>Jenis Cuti Yang Diambil</P>
    <div class="mb-3"> 
      <?php
$sql_edit = mysqli_query($koneksi, "SELECT * FROM cuti WHERE id_cuti = '$id'");
$data = mysqli_fetch_assoc($sql_edit);
$ed_jenis_cuti = $data['jenis_cuti']; // WAJIB AMBIL
?>
   <select class="form-select" aria-label="Default select example" name="jenis_cuti">
    <option value="Cuti Tahunan" <?= ($ed_jenis_cuti == "Cuti Tahunan") ? "selected" : "" ?>>Cuti Tahunan</option>
    <option value="Cuti Besar" <?= ($ed_jenis_cuti == "Cuti Besar") ? "selected" : "" ?>>Cuti Besar</option>
    <option value="Cuti Sakit" <?= ($ed_jenis_cuti == "Cuti Sakit") ? "selected" : "" ?>>Cuti Sakit</option>
    <option value="Cuti Melahirkan" <?= ($ed_jenis_cuti == "Cuti Melahirkan") ? "selected" : "" ?>>Cuti Melahirkan</option>
    <option value="Cuti Melahirkan" <?= ($ed_jenis_cuti == "Cuti Karena Alasan Penting") ? "selected" : "" ?>>Cuti Karena Alasan Penting</option>
    <option value="Cuti Melahirkan" <?= ($ed_jenis_cuti == "Cuti Diluar Tanggungan Negara") ? "selected" : "" ?>>Cuti Diluar Tanggungan Negara</option>
</select>
    </content>
    <br>
    <content class="layout">
        <div class="mb-3">
            <p>Alasan Cuti</p>
  <label for="exampleFormControlTextarea1" class="form-label">Alasan Cuti</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="alasan" rows="3" ><?php echo $ed_alasan; ?></textarea>
</div>
    </content>
<content class="layout">
    <p>Lamanya Cuti</p>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Selama</label>
        <input type="text" class="form-control" name="lama_cuti"  value="<?php echo $ed_lama_cuti ?>">
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
  <input type="date" class="form-control" name="awal_tanggal" value="<?php echo $ed_awal_tanggal ?>">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Sampai Tanggal</label>
  <input type="date" class="form-control" name="akhir_tanggal"  value="<?php echo $ed_akhir_tanggal ?>">
</div>
</content>
<content class="layout">
    <p>Catatan Cuti</p>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Sisa Cuti Tahunan</label>
  <input type= "text" class="form-control" name="catatan"  value="<?php echo $ed_catatan ?>">
</div>
</content>
<content class="layout">
    <p>Alamat selama Menjalankan Cuti</p>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3" ><?php echo $ed_alamat ?></textarea>
</div>
<label for="exampleFormControlInput1" class="form-label">NO HP</label>
  <input type="text" class="form-control" name="no_hp"  value="<?php echo $ed_no_hp ?>">
</div>
</content>

<div class="tombol-utama">
<button type="submit" class="btn btn-outline-primary" name="update">Update</button>
</div></div></div></div>
</form>
        <br>
    <?php }
} ?>

<?php
$update_berhasil = false; // buat variabel flag
if (isset($_POST['update'])) {
    $id_cuti = $_POST['id_cuti'];
    $nama = $_POST['nama'];
     $jabatan = $_POST['jabatan'];
        $unit_kerja = $_POST['unit_kerja'];
        $nip = $_POST['nip'];
        $masa_kerja = $_POST['masa_kerja'];
        $jenis_cuti = $_POST['jenis_cuti'];
        $alasan = $_POST['alasan'];
        $lama_cuti = $_POST['lama_cuti'];
        $waktu = $_POST['waktu'] ?? null;
        $awal_tanggal = $_POST['awal_tanggal'];
        $akhir_tanggal = $_POST['akhir_tanggal'];
        $catatan = $_POST['catatan'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $ubah = mysqli_query($koneksi, "UPDATE cuti SET id_cuti='$id_cuti', nama='$nama',jabatan='$jabatan',unit_kerja='$unit_kerja',nip='$nip',masa_kerja='$masa_kerja',
        jenis_cuti='$jenis_cuti',alasan='$alasan',lama_cuti='$lama_cuti',waktu='$waktu'
        ,awal_tanggal='$awal_tanggal',akhir_tanggal='$akhir_tanggal'
        ,catatan='$catatan',alamat='$alamat',no_hp='$no_hp' WHERE id_cuti='$id_cuti'") or die(mysqli_error($koneksi));
  if ($ubah) {
        $update_berhasil = true; // tandai berhasil
    }
}

?>

<div class="section">
<table class="table table-striped">
    <thead>
      <th>No</th>
      <th>ID Cuti</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Unit Kerja</th>
      <th>NIP</th>
      <th>Masa</th>
      <th>Jenis</th>
      <th>Alasan</th>
      <th>Selama</th>
      <th>Waktu</th>
      <th>Mulai Cuti</th>
      <th>Hingga</th>
      <th>Catatan</th>
      <th>Alamat</th>
      <th>No HP</th>    
    <th>Aksi</th>
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
                            <td>".$row['jenis_cuti']."</td>
                            <td>".$row['alasan']."</td>
                            <td class='text-center'>".$row['lama_cuti']."</td>
                            <td>".$row['waktu']."</td>
                            <td>".$row['awal_tanggal']."</td>
                            <td>".$row['akhir_tanggal']."</td>
                            <td>".$row['catatan']."</td>
                            <td>".$row['alamat']."</td>
                            <td>".$row['no_hp']."</td>
                              <td class='text-center'>
                            <a href='edit.php?id_cuti=".$row['id_cuti']."'>
                            <i class='bi bi-pencil-square'></i>
                            </a>
                            </td>
                        </tr>";
                        $no++;
                    }
    ?>
               <?php if ($update_berhasil): ?>
<div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
  ✅ Data berhasil diperbarui!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
    </tbody>
</table>
<div class="d-flex justify-content-end mb-3">
  <div class="col-auto">
 <a href="home.php" class="btn btn-primary">Kembali</a>
  </div>
</div>
</body>
</html>