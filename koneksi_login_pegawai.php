<?php
$koneksi = mysqli_connect("localhost", "root", "", "bbpptp");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
