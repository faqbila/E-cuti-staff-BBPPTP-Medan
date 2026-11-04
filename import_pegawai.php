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

            $username = mysqli_real_escape_string($koneksi, $data[0]);
            $password = mysqli_real_escape_string($koneksi, $data[1]); // Bisa di-hash jika mau
            $nama = mysqli_real_escape_string($koneksi, $data[2]);
            $nip = mysqli_real_escape_string($koneksi, $data[3]);
            $jabatan = mysqli_real_escape_string($koneksi, $data[4]);
            $masa_kerja = mysqli_real_escape_string($koneksi, $data[5]);
            $no_hp = mysqli_real_escape_string($koneksi, $data[6]);
            $sisa_cuti = mysqli_real_escape_string($koneksi, $data[7]);

            $query = "INSERT INTO pegawai 
                      (username, password, nama, nip, jabatan, masa_kerja, no_hp, sisa_cuti)
                      VALUES 
                      ('$username', '$password', '$nama', '$nip', '$jabatan', '$masa_kerja', '$no_hp', '$sisa_cuti')";
            mysqli_query($koneksi, $query);
        }

        fclose($handle);
        echo "<script>alert('Data berhasil diimpor'); window.location='pegawai.php';</script>";
    } else {
        echo "<script>alert('File kosong!'); window.location='pegawai.php';</script>";
    }
}
?>
