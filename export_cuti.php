<?php
include('connect.php');

// Set header agar browser mendownload file sebagai Excel
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_c'uti.xls");

echo "<table border='1'>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Unit Kerja</th>
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
    <th>NO HP</th>
</tr>";

$no = 1;
$sql = mysqli_query($koneksi, "SELECT * FROM cuti ORDER BY nama ASC");
while ($row = mysqli_fetch_array($sql)) {
    echo "<tr>
        <td>".$no++."</td>
        <td>".$row['nama']."</td>
        <td>".$row['unit_kerja']."</td>
        <td>".$row['nip']."</td>
        <td>".$row['masa_kerja']."</td>
        <td>".$row['jenis_cuti']."</td>
        <td>".$row['alasan']."</td>
        <td>".$row['lama_cuti']."</td>
        <td>".$row['waktu']."</td>
        <td>".$row['awal_tanggal']."</td>
        <td>".$row['akhir_tanggal']."</td>
        <td>".$row['catatan']."</td>
        <td>".$row['alamat']."</td>
        <td>".$row['no_hp']."</td>
    </tr>";
}
echo "</table>";
?>
