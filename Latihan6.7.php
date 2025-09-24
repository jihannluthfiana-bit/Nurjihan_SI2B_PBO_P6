<?php
class Karyawan {
    public $nama;
    public $golongan;
    public $lembur;
    public $gajiPokok;
    private $upahLembur = 15000; // variabel biasa, bukan const

    public function __construct($nama, $golongan, $lembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->lembur = $lembur;
        $this->gajiPokok = $this->getGajiPokok($golongan);

        echo "Constructor : Data Karyawan '$this->nama' dibuat.\n";
    }

    public function getGajiPokok($golongan) {
        $gaji = [
            "Ib"=>1250000, "Ic"=>1300000, "Id"=>1350000,
            "IIa"=>2000000, "IIb"=>2100000, "IIc"=>2200000, "IId"=>2300000,
            "IIIa"=>2400000, "IIIb"=>2500000, "IIIc"=>2600000, "IIId"=>2700000,
            "IVa"=>2800000, "IVb"=>2900000, "IVc"=>3000000, "IVd"=>3100000
        ];
        return isset($gaji[$golongan]) ? $gaji[$golongan] : 0;
    }

    public function getTotalGaji() {
        return $this->gajiPokok + ($this->lembur * $this->upahLembur);
    }

    public function getInfo() {
        return $this->nama . "\t" .
               $this->golongan . "\t" .
               $this->lembur . "\t" .
               "Rp " . number_format($this->getTotalGaji(), 0, ',', '.');
    }

    public function __destruct() {
        echo "Destructor : Data Karyawan '$this->nama' dihapus.\n";
    }
}

echo "Masukkan jumlah karyawan: ";
$jml = (int)trim(fgets(STDIN));

$daftar = [];

for ($i=1; $i <= $jml; $i++) {
    echo "\nKaryawan ke-$i\n";
    echo "Nama Karyawan : "; $nama = trim(fgets(STDIN));
    echo "Golongan (contoh IIb, IIIc, IVb): "; $gol = trim(fgets(STDIN));
    echo "Total Jam Lembur : "; $jam = (int)trim(fgets(STDIN));

    $k = new Karyawan($nama, $gol, $jam);
    $daftar[] = $k;
}

echo "\nNama\tGolongan\tLembur\tTotal Gaji\n";
foreach ($daftar as $k) {
    echo $k->getInfo() . "\n";
}
?>
