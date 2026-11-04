<?php
require 'vendor/autoload.php'; // jika pakai Composer
use Dompdf\Dompdf;

include 'connect.php';

$html = '
<h3 style="text-align:center;">Daftar Pegawai Pengajuan Cuti</h3>
<table border="1" cellpadding="5" cellspacing="0" style="width:100%; font-size:12px;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Masa Kerja</th>
            <th>Jenis Cuti</th>
            <th>Alasan</th>
            <th>Lama Cuti</th>
            <th>Waktu</th>
            <th>Awal Tanggal</th>
            <th>Akhir Tanggal</th>
            <th>Catatan</th>
            <th>Alamat</th>
            <th>No HP</th>
        </tr>
    </thead>
    <tbody>';

$no = 1;
$sql = mysqli_query($koneksi, "SELECT * FROM cuti ORDER BY nama ASC");
while ($row = mysqli_fetch_array($sql)) {
    $html .= '
    <tr>
        <td>' . $no++ . '</td>
        <td>' . $row['nama'] . '</td>
        <td>' . $row['nip'] . '</td>
        <td>' . $row['masa_kerja'] . '</td>
        <td>' . $row['jenis_cuti'] . '</td>
        <td>' . $row['alasan'] . '</td>
        <td>' . $row['lama_cuti'] . '</td>
        <td>' . $row['waktu'] . '</td>
        <td>' . $row['awal_tanggal'] . '</td>
        <td>' . $row['akhir_tanggal'] . '</td>
        <td>' . $row['catatan'] . '</td>
        <td>' . $row['alamat'] . '</td>
        <td>' . $row['no_hp'] . '</td>
    </tr>';
}

$html .= '
    </tbody>
</table>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape'); // Bisa juga 'portrait'
$dompdf->render();
$dompdf->stream("data_cuti.pdf", array("Attachment" => false)); // true untuk download langsung
?>
