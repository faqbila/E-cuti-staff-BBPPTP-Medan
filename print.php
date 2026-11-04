<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

$imageData = base64_encode(file_get_contents('logo2.jpg'));
$src = 'data:image/jpeg;base64,' . $imageData;

include 'connect.php';

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    $sql = mysqli_query($koneksi, "SELECT * FROM cuti WHERE nama = '$nama' LIMIT 1");
    $data = mysqli_fetch_assoc($sql);
    if (!$data) {
        die("Data tidak ditemukan untuk nama: $nama");
    }
} else {
    die("Nama tidak ditemukan di URL.");
}

ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
        margin: 20px;
        font-family: Arial, sans-serif;
        font-size: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid black;
            padding: 3px;
            vertical-align: top;
            height : 5px;
        }

        .center { text-align: center; }
     
        .judul {
        font-weight: bold;
        text-align : center;
        font-size : 14px;    
        font-family: 'Times New Roman', Times, serif;
        }
        .bold {
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
        }
        .no-border td { border: none; }
        .logo-box {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .logo-box img {
            width: 60px;
            height: 60px;
            display: block;
            margin: auto;
        }
        .logo-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 5px;
        }

        .section {
            margin-top: 3px;
        }

        .right {
            text-align: right;
            line-height: 1.2;
        }

        .cuti-table td {
            font-size: 9px;
        }

        ol {
            padding-left: 16px;
            margin: 0;
        }
        .bedo{
            height: 50px;
        }
    </style>
</head>
<body>
    
<table style="width: 80%; border-collapse: collapse; margin:0 auto 20px auto; ">
  <tr>
    <!-- Gambar Logo Kiri -->
    <td style="width: 80px; vertical-align: top; border: none;">
 <img src="<?= $src ?>" width="110" >
    </td>

    <!-- Judul Kanan -->
    <td style="text-align: center; border: none;">
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <td style="text-align: center; border: 1px solid black; padding: 6px; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 20px; background-color: #f2f2f2; height: 30px; ">
            BBPPTP MEDAN
          </td>
        </tr>
        <tr>
          <td style="text-align: center; border: 1px solid black; padding: 4px; font-weight: bold; font-size: 13px; height: 20px;">
            INSTRUKSI KERJA
          </td>
        </tr>
        <tr>
          <td style="text-align: center; border: 1px solid black; padding: 4px; font-weight: bold; font-size: 13px; background-color: #f2f2f2; height: 20px;">
            CUTI
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>



<!-- KEPADA -->
<div style="text-align: left; font-size: 10px; line-height: 0.5; margin-bottom: 10px;">
    <p style="margin-left: 300;">Kepada</p>
    <p style="margin-left: 300;">Yth.</p>
    <p style="margin-left: 300;">Kepala BBPPTP Medan</p>
    <p style="margin-left: 300;">di-</p>
    <p style="margin-left: 300; text-decoration: underline;">Medan</p>
</div>

<!-- FORM -->
 <p class="judul"  > FORMULIR PERMINTAAN DAN PEMBERIAN CUTI </p>
<table class="cuti-table section">

    <tr><td colspan="4" class="bold">I. DATA PEGAWAI</td></tr>
    <tr><td>Nama</td><td><?= $data['nama'] ?></td><td>NIP</td><td><?= $data['nip'] ?></td></tr>
    <tr><td>Jabatan</td><td><?= $data['jabatan'] ?? '-' ?></td><td>Masa Kerja</td><td><?= $data['masa_kerja'] ?></td></tr>
    <tr><td>Unit Kerja</td><td colspan="3">BBPPTP MEDAN</td></tr>
    </table>

<table class="cuti-table section">
    <tr><td colspan="4" class="bold">II. JENIS CUTI YANG DIAMBIL</td></tr>
    <tr><td colspan="4"><?= $data['jenis_cuti'] ?></td></tr>
</table>

<table class="cuti-table section">
    <tr><td colspan="4" class="bold">III. ALASAN CUTI</td></tr>
    <tr><td colspan="4" style="height: 35px;"><?= $data['alasan'] ?></td></tr>
    </table>

<table class="cuti-table section">
    <tr><td colspan="4" class="bold">IV. LAMANYA CUTI</td></tr>
    <tr>
        <td>Selama</td><td><?= $data['lama_cuti'] ?> hari</td>
        <td> Mulai tanggal <?= date('d-m-Y', strtotime($data['awal_tanggal'])) ?></td><td> s.d <?= date('d-m-Y', strtotime($data['akhir_tanggal'])) ?></td>
    </tr>
    </table>
<table class="cuti-table section">
<!-- Bagian V. CATATAN TAHUNAN -->
<tr>
  <!-- Kolom judul V. CATATAN TAHUNAN -->
  <td colspan="3" class="bold">V. &nbsp;CATATAN TAHUNAN</td>
  <td style="width: 20%;">1.CUTI BESAR</td>
</tr>
<tr>
  <!-- Header kolom kiri -->
  <td style="width: 10%; ">Tahun</td>
  <td style="width: 10%;">Sisa</td>
  <td style="width: 20%;">Keterangan</td>
  <td style="width: 20%;">2.CUTI SAKIT</td>
  
  <!-- Kolom kanan dengan list cuti -->
</tr>
<tr>
  <td style="height: 10px; line-height: 1;">N-2</td>
  <td style="height: 10px; line-height: 1;"></td>
  <td style="height: 10px; line-height: 1;"></td>
  <td style="height: 10px; line-height: 1;">3.CUTI MELAHIRKAN</td>
</tr>
<tr>
  <td style="height: 10px; line-height: 1;">N-1</td>
  <td style="height: 10px; line-height: 1;"></td>
  <td style="height: 10px; line-height: 1;"></td>
  <td style="height: 10px; line-height: 1;">4.CUTI ALASAN PENTING</td>
</tr>
<tr>
  <td style="height: 10px; line-height: 1;">N</td>
  <td style="height: 10px; line-height: 1;"><?= $data['catatan'] ?? '-' ?></td>
  <td style="height: 10px; line-height: 1;"></td>
  <td style="height: 10px; line-height: 1;">5.CUTI DILUAR TANGGUNG NEGARA</td>
</tr>
<tr>
  <td style="height: 10px; line-height: 1;"></td>
  <td style="height: 10px; line-height: 1;"></td>
  <td style="height: 10px; line-height: 1;"></td>
  <td style="height: 10px; line-height: 1;">6.Cuti Tahunan</td>
</tr>

    </table>
<table class="cuti-table section">
  <!-- VI. ALAMAT SELAMA MENJALANKAN CUTI -->
<tr>
  <td colspan="4" class="bold">VI. &nbsp;ALAMAT SELAMA MENJALANKAN CUTI</td>
</tr>
<tr>
  <!-- Kolom 1: Alamat -->
  <td rowspan="2"  style="width:40%;"><?= $data['alamat'] ?></td>
  <!-- Kolom 2: TELP -->
  <td style="text-align: center;">TELP</td>
  <td colspan="2" style="text-align: center;"><?= $data['no_hp'] ?></td>
  <!-- Kolom 3–4: Hormat Saya -->

</tr>
<tr>
  <!-- Baris 2 kolom 2 (di bawah TELP) -->
  <td colspan="1" class="bedo" style="text-align: center; width:12%;"></td>
  <!-- Baris 2 kolom 3–4 (di bawah Hormat Saya) -->
  <td colspan="2" style="text-align : center">Hormat Saya,
    <br> <?= $data['nama'] ?>
<br><br><br><br>NIP.<?= $data['nip'] ?></td>
</tr>
</table>

<table class="cuti-table section">
    <tr><td colspan="4" class="bold">VII. PERTIMBANGAN ATASAN LANGSUNG</td></tr>
     <tr>
        <td class="center">DISETUJUI</td>
        <td class="center">PERUBAHAN****</td>
        <td class="center">DITANGGUHKAN****</td>
        <td class="center">TIDAK DISETUJUI****</td>
    </tr>
    <tr><td class="center"></td>
        <td class="center"></td>
        <td class="center"></td><td style="height: 7px;"></td></tr>
    </tr>
    <tr><td colspan="3"style="border-bottom: none; border-left : none"></td><td style="height: 50px;"></td></tr>
    </table>
<table class="cuti-table section">    
    <tr><td colspan="4" class="bold">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</td></tr>
    <tr>
        <td class="center">DISETUJUI</td>
        <td class="center">PERUBAHAN****</td>
        <td class="center">DITANGGUHKAN****</td>
        <td class="center">TIDAK DISETUJUI****</td>
    </tr>
    <tr><td class="center"></td>
        <td class="center"></td>
        <td class="center"></td><td style="height: 7px;"></td></tr>
    </tr>
    <tr><td colspan="3"style="border-bottom: none; border-left : none; " ></td><td style="height: 50px; width: 30%;"></td></tr>
</table>

<!-- CATATAN -->
<div class="section" style="font-size: 9px;">
    <p><strong>Catatan:</strong></p>
    <table style="width: 100%;">
        <tr><td>***</td><td>Diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti</td></tr>
    </table>
</div>

</body>
</html>

<?php
$html = ob_get_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); // Hanya 1 halaman
$dompdf->render();
$dompdf->stream("form_cuti_{$data['nama']}.pdf", array("Attachment" => false)); 

?>
