<?php

#Basic Line
require 'koneksi.php';

$result = mysqli_query($kdb,"SELECT id_tamu, year(tanggal_waktu) AS TAHUN, month(tanggal_waktu) AS BULAN, COUNT( * ) AS JUMLAH from tamu WHERE year(tanggal_waktu) =year(now()) GROUP BY month(tanggal_waktu) ORDER BY id_tamu ASC") or die(mysql_error());

$bln = array();
$bln['name'] = 'Bulan';
$rows['name'] = 'Jumlah Pengunjung';
while ($r = mysqli_fetch_array($result)) {
    $bln['data'][] = $r['BULAN'];
    $rows['data'][] = $r['JUMLAH'];
}
$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysqli_close($kdb);



