<?php
session_start();
include "connect.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil nama admin dari session
$username_admin = $_SESSION['username'];
$queryAdmin = mysqli_query($koneksi, "SELECT nama FROM login WHERE username = '$username_admin'");
$dataAdmin = mysqli_fetch_assoc($queryAdmin);
$nama_admin = $dataAdmin['nama'];

if (isset($_GET['id_cuti'])) {
    $id_cuti = $_GET['id_cuti'];

    // Ambil data cuti
    $queryCuti = mysqli_query($koneksi, "SELECT * FROM cuti WHERE id_cuti = '$id_cuti'");
    $dataCuti = mysqli_fetch_assoc($queryCuti);

    if ($dataCuti) {
        $nip = $dataCuti['nip'];
        $nama = $dataCuti['nama'];
        $jenis_cuti = $dataCuti['jenis_cuti'];
        $awal = $dataCuti['awal_tanggal'];
        $akhir = $dataCuti['akhir_tanggal'];
        $dibuat_oleh = $dataCuti['dibuat_oleh'];
        $catatan = $dataCuti['catatan'];

        // Hitung durasi cuti
        $durasi = (strtotime($akhir) - strtotime($awal)) / (60 * 60 * 24) + 1;

        // Ambil sisa cuti pegawai
        $queryPegawai = mysqli_query($koneksi, "SELECT sisa_cuti FROM pegawai WHERE nip = '$nip'");
        $dataPegawai = mysqli_fetch_assoc($queryPegawai);

        if ($dataPegawai) {
            $sisa_cuti_lama = $dataPegawai['sisa_cuti'];
            $sisa_cuti_baru = $sisa_cuti_lama;

            // Hanya kurangi jika jenis cuti adalah Cuti Tahunan
            if ($jenis_cuti === 'Cuti Tahunan') {
                $sisa_cuti_baru -= $durasi;

                // Cegah nilai minus
                if ($sisa_cuti_baru < 0) {
                    echo "<script>alert('Sisa cuti tahunan tidak mencukupi.'); window.location='home.php';</script>";
                    exit();
                }

                // Update sisa cuti di pegawai
                $updateSisa = mysqli_query($koneksi, "UPDATE pegawai SET sisa_cuti = '$sisa_cuti_baru' WHERE nip = '$nip'");
            }

            // Simpan ke riwayat_cuti
            $insertRiwayat = mysqli_query($koneksi, "INSERT INTO riwayat_cuti (
                nip, nama, jenis_cuti, awal_tanggal, akhir_tanggal, sisa_cuti_sebelum, sisa_cuti_setelah, catatan, dibuat_oleh, disetujui_oleh
            ) VALUES (
                '$nip', '$nama', '$jenis_cuti', '$awal', '$akhir', '$sisa_cuti_lama', '$sisa_cuti_baru', '$catatan', '$dibuat_oleh', '$nama_admin'
            )");

            if ($insertRiwayat) {
                // Hapus dari tabel cuti setelah disetujui
                $hapus = mysqli_query($koneksi, "DELETE FROM cuti WHERE id_cuti = '$id_cuti'");

                echo "<script>alert('Cuti berhasil disetujui.'); window.location='home.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan riwayat cuti.'); window.location='home.php';</script>";
            }
        }
    }
}
?>
