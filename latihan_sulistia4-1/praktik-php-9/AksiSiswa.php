<?php
    require('Siswa.php');
    $Siswa1 =new Siswa();
    $Siswa1->IsiData("K4121","Sulistia","2006","Bogor");
    $Siswa1->CetakData();

    $Siswa2 =new Siswa();
    $Siswa2->IsiData("K4141", "Anva", "2005", "Jakarta");
    $Siswa2->CetakData();
    //mengakses atribut di luar kelas
        echo"Umur Siswa ".$Siswa2->HitungUmur()."</br>";
?>