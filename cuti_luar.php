<<?php
session_start();

// Proteksi jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: login_pegawai.php");
    exit();
}

// Header anti-cache
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include('koneksi_login_pegawai.php');

include('koneksi_login_pegawai.php');
$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);
$nama = $data['nama'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo2.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
</body>
</html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo2.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CUTI BBPPTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="tampilan2.css">
</head>
<body >

 <!-- Sidebar -->
    <div class="sidebar">
    <img src="logo2.png" alt="Logo" style="width: 100px; margin-bottom: 15px; margin-left: 60px;">
    <h5 class="text-center">E-CUTI BBPPTP MEDAN</h5>
    <a href="home_user.php"><i class="bi bi-house"></i></i> Beranda</a>
    <a href="profil_user.php"><i class="bi bi-person-vcard"></i></i> Profile User</a>
    <a href="Form_Cuti_User.php"><i class="bi bi-plus-circle"></i> Tambahkan</a>
    <a href="riwayat_user.php"><i class="bi bi-clock-history"></i></i> Riwayat</a>
    <a href="edit_profile.php"><i class="bi bi-pencil-square"></i> Edit Profile</a>
    <a href="logout_user.php"><i class="bi bi-box-arrow-left"></i> Log Out</a>
</div>
    <!-- Konten -->
    <div class="content">
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Beranda Pegawai</p>
            </blockquote>
        </figure>
    <div class="text-center p-2" style="background:#f1f1f1;">
   <small class="login">Login sebagai: <?php echo $nama; ?></small>
</div>
      
    <div class="container mt-2">
  <h4 class="text-center mb-4">Tata Cara Pengajuan Cuti di Luar Tanggungan Negara</h4>
  <ol style="font-weight: normal; font-size: 16px; line-height: 1.7;">
    <li> PNS yang telah bekerja paling singkat 5 (lima) tahun secara terus-menerus karena alasan pribadi dan mendesak dapat diberikan cuti di luar tanggungan negara</li>
    <li>Alasan pribadi dan mendesak sebagaimana dimaksud pada angka 1 antara lain sebagai berikut: <br>
        a. mengikuti atau mendampingi suami/isteri tugas negara/tugas belajar di dalam/luar negeri; <br>
        b. mendampingi suami/isteri bekerja di dalam/luar negeri; <br>
        c. menjalani program untuk mendapatkan keturunan; <br>
        d. mendampingi anak yang berkebutuhan khusus; <br>
        e. mendampingi suami/isteri/anak yang memerlukan perawatan khusus; dan/atau <br>
        f. mendampingi/ merawat orang tua/mertua yang sakit/uzur.</li>
    <li>Untuk mengajukan cuti di luar tanggungan negara karena alasan sebagaimana dimaksud pada angka 2 huruf a harus melampirkan surat penugasan atau surat perintah tugas negara/tugas belajar dari pejabat yang berwenang.</li>
    <li>Untuk mengajukan cuti di luar tanggungan negara karena alasan sebagaimana dimaksud pada angka 2 huruf b harus mclampirkan surat kcputusan atausurat penugasan/ pengangkatan dalam jabatan.</li>
    <li>Untuk mengajukan cuti di luar tanggungan negara karena alasan sebagaimana dimaksud pada angka 2 huruf c, huruf d, dan huruf c harus melampirkan surat keterangan dokter spesialis.</li>
    <li>Untuk mengajukan cuti di luar tanggungan negara karena alasan sebagaimana dimaksud pada angka 2 huruf f harus melampirkan surat keterangan dokter.</li>    
    <li>Cuti di luar tanggungan negara dapat diberikan untuk paling lama 3 (tiga) tahun.</li>
    <li>Jangka waktu cuti di luar tanggungan ncgara scbagaimana dimaksud pada angka 7 dapat diperpanjang paling lama 1 (satu) tahun apabila ada alasan-alasan yang penting untuk memperpanjangnya.</li>
    <li>Cuti di luar tanggungan negara mengakibatkan PNS yang bersangkutan diberhentikan dari jabatannya.</li>
    <li>Jabatan yang menjadi lowong karena pemberian cuti di luar tanggungan negara harus diisi.</li>
    <li>Untuk mendapatkan cuti di luar tanggungan negara, PNS yang bersangkutan mengajukan permintaan/permohonan secara tertulis kepada PPK disertai dengan alasan yang dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.b yang mcrupakan bagian tidak tcrpisahkan dari Peraturan Badan ini.</li>
    <li>Berdasarkan permintaan/permohonan secara tertulis sebagaimana dimaksud pada angka 11, PPK atau pejabat lain yang ditunjuk mengajukan permintaan persetujuan kepada Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara yang dibuat rangkap 3 (tiga) menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.d yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li> Dalam hal pcrmintaan/ permohonan cuti disctujui, Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara menandatangani persetujuan sebagaimana dimaksud pada angka 12.</li>
    <li>Dalam hal permintaan/ permohonan cuti ditolak, Kepala Badan Kepcgawaian Negara/Kepala Kantor Regional Badan Kepegawaian Ncgara mengcmbalikan secara tertulis usul persetujuan disertai alasan penolakan.</li>
    <li>Persetujuan Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara sebagaimana dimaksud pada angka 12 diperuntukkan kepada: <br>
        a. Pimpinan Instansi yang bersangkutan; <br>
        b. Kepala Kantor Perbendaharaan Negara/Kepala Badan dan atau Dinas Pengelolaan Keuangan Daerah; dan <br>
        c. Deputi Bidang Mutasi Kepegawaian.</li>
    <li>Cuti di luar tanggungan negara, hanya dapat diberikan dengan keputusan PPK setelah mendapat persetujuan dari Kepala Badan Kepegawaian Negara yang dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.e yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>PPK sebagaimana dimaksud pada angka 12 tidak dapat mendelegasikan kewenangan pemberian cuti di luar tanggungan negara.</li>
    <li>Permohonan cuti di luar tanggungan negara dapat ditolak.</li>
    <li>Selama menjalankan cuti di luar tanggungan negara, PNS yang bersangkutan tidak berhak menerima penghasilan PNS.</li>
    <li>Selama menjalankan cuti di luar tanggungan negara tidak diperhitungkan sebagai masa kerja PNS.</li>
    <li>PNS yang telah menjalankan cuti di luar tanggungan negara untuk paling lama 3 (tiga) tahun tetapi ingin memperpanjang maka yang bersangkutan harus mengajukan permintaan/ permohonan perpanjangan cuti di luar tanggungan negara, disertai dengan alasan-alasan yang penting untuk memperpanjangnya yang dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.f yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>Permintaan/permohonan perpanjangan cuti di luar tanggungan negara harus sudah diajukan paling lambat 3 (tiga) bulan sebelum cuti di luar tanggungan negara berakhir.</li>
    <li>Permintaan/permohonan perpanjangan cuti di luar tanggungan negara dapat dikabulkan atau ditolak berdasarkan pertimbangan Pejabat Yang Berwenang Memberikan Cuti di luar tanggungan negara.</li>
    <li>Berdasarkan ermintaan/permohonan secara tertulis scbagaimana dimaksud pada angka 23, PPK atau pejabat lain yang ditunjuk mengajukan permintaan/permohonan persetujuan perpanjangan cuti kepada Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara yang dibuat rangkap 3 (tiga) menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.g yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>Dalam hal permintaan/permohonan perpanjangan cuti disetujui, Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara menandatangani persetujuan sebagaimana dimaksud pada angka 24,</li>
    <li>Perpanjangan cuti di luar tanggungan negara diberikan dengan keputusan PPK sctelah mendapat persctujuan Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara yang dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.h yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>PNS yang telah selesai menjalankan cuti di luar tanggungan negara wajb melaporkan diri secara tertulis kepada instansi induknya yang dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.i yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>
    <li>Batas waktu melaporkan diri secara tertulis sebagaimana dimaksud pada angka 27, paling lama 1 (satu) bulan sctlah selesai menjalankan cuti di luar tanggungan negara.</li>
    <li>PPK dalam jangka waktu paling lama 1 (satu) bulan setelah menerima laporan sebagaimana dimaksud pada angka 27, wajib mengusulkan persetujuan pengaktifan kembali PNS yang bersangkutan kepada Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara dengan formulir yang dibuat menurut contoh sebagaimana tercantum alam Anak Lampiran 1 yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini</li>
    <li>Dalam hal permohonan pengaktifan kembali PNS sebagaimana dimaksud pada angka 29 disetujui, Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawalân Negara menandatangani persetujuan tersebut.</li>
    <li>PPK berdasarkan persetujuan Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara sebagaimana dimaksud pada angka 30 menetapkan keputusan pengaktifan kembali PNS dalam jabatan yang dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.k yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>    
    <li>Dalam hal PNS yang melaporkan diri sebagaimana dimaksud pada angka 27, tetapi tidak dapat diangkat dalam jabatan pada instansi induknya, disalurkan pada instansi lain.</li>    
    <li>Penyaluran pada instansi lain sebagaimana dimaksud pada angka 32, dilakukan oleh PPK setelah berkoordinasi dengan Kepala Badan Kepegawaian Negara.</li>    
    <li>Koordinasi PPK dengan Kepala Badan Kepegawaian Negara disampaikan dengan mengajukan permintaan penyaluran pegawai yang dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 11 yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>    
    <li>Kepala Badan Kepcgawaian Negara berdasarkan pengajuan penyaluran pegawai sebagaimana dimaksud pada angka 34, menyampaikan ada atau tidak adanya jabatan yang lowong kepada PPK.</li>    
    <li>Dalam hal ape jabatan yang lowong, PPK mengajukan permohonan persetujuan pengaktifan kembali kepada Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara dengan formulir yang dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.j yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>    
    <li>PPK berdasarkan persetujuan Kepala Badan Kepegawaian Negara/Kepala Kantor Regional Badan Kepegawaian Negara sebagaimana dimaksud pada angka 36 menetapkan keputusan pengaktifan kembali PNS sebagaimana dimaksud pada angka 27 dan angka 32 sesuai jabatan yang tersedia.</li>    
    <li>Keputusan pengaktifan kembali sebagaimana dimaksud pada angka 37 dibuat menurut contoh sebagaimana tercantum dalam Anak Lampiran 1.k yang merupakan bagian tidak terpisahkan dari Peraturan Badan ini.</li>    
    <li>PNS yang tidak dapat disalurkan dalam waktu paling lama 1 (satu) tahun diberhentikan dengan hormat sebagai PNS.</li>    
    <li>PNS yang tidak melaporkan diri sccara tertulis dalam jangka waktu paling lama 1 (satu) bulan sebagaimana dimaksud pada angka 27 dan angka 28, diberhentikan dengan hormat sesuai dengan ketentuan peraturan perundang-undangan.</li>    
    <li>PNS yang diberhentikan dengan hormat sebagaimana dimaksud pada angka 39 dan angka 40 dibcrikan hak kepegawaian sesuai peraturan perundang-undangan.</li>       
</ol>
</div>
  <div class="text-end">
            <a href="home_user.php" class="btn btn-primary">Kembali</a>
            <a href="cuti_lain.php" class="btn btn-outline-primary">Selanjutnya</a>
        </div>
</body>
</html>