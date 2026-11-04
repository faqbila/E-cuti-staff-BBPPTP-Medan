<?php
include 'connect.php';

if (isset($_POST['import'])) {
    $file = $_FILES['file_csv']['tmp_name'];

    if ($_FILES['file_csv']['size'] > 0) {
        $handle = fopen($file, "r");

        $first = true;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Lewati baris header jika ada
            if ($first) { $first = false; continue; }

            $id = mysqli_real_escape_string($koneksi, $data[0]);
            $nama = mysqli_real_escape_string($koneksi, $data[1]); // Bisa di-hash jika mau
            $nip = mysqli_real_escape_string($koneksi, $data[2]);
            $awal_tanggal = mysqli_real_escape_string($koneksi, $data[3]);
            $catatan = mysqli_real_escape_string($koneksi, $data[4]);
            $query = "INSERT INTO riwayat_cuti 
                      ( id, nama, nip, awal_tanggal, catatan)
                      VALUES 
                      ('$id','$nama',  '$nip', '$awal_tanggal','$catatan')";
            mysqli_query($koneksi, $query);
        }

        fclose($handle);
        echo "<script>alert('Data berhasil diimpor'); window.location='riwayat_cuti.php';</script>";
    } else {
        echo "<script>alert('File kosong!'); window.location='riwayat_cuti.php';</script>";
    }
}
?>
