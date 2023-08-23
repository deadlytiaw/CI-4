<?php
require('SiswaRpl.php');
$Siswa3 = new SiswaRpl();
$Siswa3->IsiData("K4161", "X PPLG 1", "2006", "Bogor");
$Siswa3->CetakData();
$Siswa3->JudulLaporan("Laporan PKL Bonet");
$Siswa3->CetakData();
?>