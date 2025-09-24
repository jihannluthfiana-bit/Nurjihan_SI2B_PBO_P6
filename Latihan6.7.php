<?php
class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;
    public $gajiPokok;
    public $totalGaji;

    public function __construct($nama, $golongan, $jamLembur){
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
        $this->gajiPokok = $this->getGajiPokok($golongan);
        $this->totalGaji = $this->gajiPokok + ($jamLembur * 15000);

        echo "Constructor : Data Karyawan '$this->nama' dibuat.\n";
    }

    // method
    public function getGajiPokok($golongan){
        $gaji = [
            "Ib"=>1250000, "Ic"=>1300000, "Id"=>1350000, "IIa"=>2000000, 
            "IIb"=>2100000, "IIc"=>2200000, "IId"=>2300000,
            "IIIa"=>2400000, "IIIb"=>2500000, "IIIc"=>2600000, "IIId"=>2700000,
            "IVa"=>2800000, "IVb"=>2900000, "IVc"=>3000000, "IVd"=>3100000
        ];
        return isset($gaji[$golongan]) ? $gaji[$golongan] : 0;
    }

    public function getInfo(){
        return str_pad($this->nama, 15) .
               str_pad($this->golongan, 10) .
               str_pad($this->jamLembur, 12) .
               "Rp " . number_format($this->totalGaji, 0, ',', '.');
    }

    public function __destruct(){
        echo "Destructor : Data Karyawan '$this->nama' dihapus.\n";
    }
}


echo "Masukkan jumlah karyawan: ";
$jml = (int)trim(fgets(STDIN));

$daftar = [];

for ($i=1; $i <= $jml; $i++){
    echo "\nKaryawan ke-$i\n";
    echo "Nama Karyawan : "; $nama = trim(fgets(STDIN));
    echo "Golongan (contoh IIb, IIIc, IVb): "; $gol = trim(fgets(STDIN));
    echo "Total Jam Lembur : "; $jam = (int)trim(fgets(STDIN));

    $k = new Karyawan($nama, $gol, $jam);
    $daftar[] = $k;
}


echo "\n------------------- DAFTAR GAJI KARYAWAN -------------------\n";
echo str_pad("Nama", 15) . str_pad("Golongan", 10) . str_pad("Lembur", 12) . "Total Gaji\n";
echo "-----------------------------------------------------------\n";

foreach ($daftar as $k){
    echo $k->getInfo() . "\n";
}

echo "-----------------------------------------------------------\n";
?>