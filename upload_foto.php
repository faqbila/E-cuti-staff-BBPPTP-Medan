<?php
session_start();
include('koneksi_login_pegawai.php');

$username = $_SESSION['username'];

if (isset($_FILES['foto'])) {
    $errors = [];
    $file_name = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed_ext = ['jpg', 'jpeg', 'png'];

    if (!in_array($file_ext, $allowed_ext)) {
        $errors[] = "Hanya file JPG, JPEG, atau PNG yang diperbolehkan.";
    }

    if (empty($errors)) {
        $new_filename = $username . '_' . time() . '.' . $file_ext;
        $upload_path = 'uploads/' . $new_filename;

        // Pastikan folder uploads ada
        if (!is_dir('uploads')) {
            mkdir('uploads', 0755, true);
        }

        move_uploaded_file($file_tmp, $upload_path);

        // Simpan nama file ke database
        mysqli_query($koneksi, "UPDATE pegawai SET foto='$new_filename' WHERE username='$username'");

        echo "<script>alert('Foto berhasil diupload'); window.location='edit_profile.php';</script>";
    } else {
        echo implode("<br>", $errors);
    }
}
?>
