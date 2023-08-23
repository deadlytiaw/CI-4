<?php
class Siswa{
    var $nis;       //secara default bernilai public
    public $nama;      //semua file bisa mengakses
    protected $tahun;     //hanya bisa diakses di keas ini dan turunannya
    protected $kota; 

    function __construct(){
        $this->nis="K4131";
        $this->nama="Sulistia";
        $this->tahun="2006";
        $this->kota="Bogor";
        $this->CetakData();
    }

    function IsiData($nis,$nama,$tahun,$kota){
        $this->nis=$nis;
        $this->nama=$nama;
        $this->tahun=$tahun;
        $this->kota=$kota;
    }

    final function CetakData(){        
        echo"NIS Siswa: ".$this->nis."</br>";
        echo"Nama Siswa: ".$this->nama."</br>";
        echo"Tahun Lahir Siswa: ".$this->tahun."</br>";
        echo"Kota Asal Siswa: ".$this->kota."</br>";
        echo"Umur Siswa ".$this->HitungUmur()."</br>";
    }

    protected function HitungUmur(){    
        $umur=date('Y') - $this->tahun;
        return $umur;
    }
}
?>