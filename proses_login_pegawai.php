<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$koneksi = mysqli_connect("localhost", "root", "", "bbpptp");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $querysql = "SELECT * FROM pegawai WHERE username ='$username' AND password ='$password'";
    $cek_db = mysqli_query($koneksi, $querysql);
    $data = mysqli_fetch_array($cek_db);
    $hitung = mysqli_num_rows($cek_db);

    if ($hitung > 0) {
        $_SESSION['username'] = $data['username'];
        header('Location: home_user.php');
        exit();
    } else {
        echo '
        <script>
        alert("Password salah, silakan coba lagi!");
        window.location.href="login_pegawai.php";
        </script>
        ';
    }
}
?>
