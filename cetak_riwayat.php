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
            <th>Tanggal Cuti</th>
            <th>Sisa Cuti</th>
        </tr>
    </thead>
    <tbody>';

$no = 1;
$sql = mysqli_query($koneksi, "SELECT * FROM riwayat_cuti ORDER BY nama ASC, sisa_cuti DESC");
while ($row = mysqli_fetch_array($sql)) {
    $html .= '
    <tr>
        <td>' . $no++ . '</td>
        <td>' . $row['nama'] . '</td>
        <td>' . $row['nip'] . '</td>
        <td>' . $row['awal_tanggal'] . '</td>
        <td>' . $row['sisa_cuti'] . '</td>
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
