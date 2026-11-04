<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logout Berhasil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }
  </style>
</head>
<body>
<script>
    Swal.fire({
        title: 'Logout Berhasil!',
        text: 'Anda akan diarahkan ke halaman login...',
        icon: 'success',
        showConfirmButton: false,
        timer: 2000,
        didClose: () => {
            // Redirect setelah popup selesai
            document.body.style.opacity = '0';
            setTimeout(() => {
                window.location.href = 'login.php';
            }, 300);
        }
    });

    // Efek animasi saat keluar
    document.body.style.transition = 'opacity 0.2s ease';
</script>
</body>
</html>