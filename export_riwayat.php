<?php
include('connect.php');

// Set header agar browser mendownload file sebagai Excel
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_c'uti.xls");

echo "<table border='1'>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIP</th>
    <th>Tanggal Cuti</th>
    <th>Sisa Cuti</th>

</tr>";

$no = 1;
$sql = mysqli_query($koneksi, "SELECT * FROM riwayat_cuti ORDER BY nama ASC");
while ($row = mysqli_fetch_array($sql)) {
    echo "<tr>
        <td>".$no++."</td>
        <td>".$row['nama']."</td>
        <td>".$row['nip']."</td>
        <td>".$row['awal_tanggal']."</td>
        <td>".$row['catatan']."</td>
    </tr>";
}
echo "</table>";
?>
