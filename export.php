<?php
include 'koneksi.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_ont.csv');

$output = fopen('php://output', 'w');
fputcsv($output, ['Tanggal','Nama','ONU Type','SN','Error','Keterangan']);

$result = mysqli_query($conn, "SELECT * FROM tb_error ORDER BY id DESC");
while($row = mysqli_fetch_assoc($result)){
    fputcsv($output, $row);
}
fclose($output);
exit();
