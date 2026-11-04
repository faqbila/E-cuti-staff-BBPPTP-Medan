<?php
require 'koneksi_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&family=Poppins:ital,wght@0,300;0,700;1,400;1,500;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="login.css">

<title>Login</title>
</head>
<body>
    <div class="login">
        <div class="login-form">
            <img src="logo2.png" class="login-logo" alt="">
            <p>E-CUTI BBPPTP MEDAN </p>
            <h1 class="h1">LOGIN ADMIN</h1>
            <form method="post">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Username</label>
        <input type="username" name="username" class="form-control" id="exampleFormControlInput1" placeholder="masukan username">
        </div>
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
            <button type="submit" name="login" class="btn btn-primary">login</button>
        </form>
        <a href="login_pegawai.php">Masuk Sebagai Pegawai</a>
        </div>
    </div>
    
</body>
</html>