<?php
class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;
    public $totalGaji;

    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;

        // tentukan gaji pokok sesuai golongan
        $gajiPokok = 0;
        if ($golongan == "I") {
            $gajiPokok = 3000000;
        } elseif ($golongan == "II") {
            $gajiPokok = 4000000;
        } elseif ($golongan == "III") {
            $gajiPokok = 5000000;
        }

        // hitung total gaji
        $this->totalGaji = $gajiPokok + ($jamLembur * 20000);
    }

    public function getInfo() {
        return "Nama        : " . $this->nama . "\n" .
               "Golongan    : " . $this->golongan . "\n" .
               "Jam Lembur  : " . $this->jamLembur . "\n" .
               "Total Gaji  : " . $this->totalGaji . "\n";
    }
}

// input dari user lewat CLI
echo "Masukkan Nama     : ";
$nama = trim(fgets(STDIN));

echo "Masukkan Golongan (I/II/III): ";
$golongan = trim(fgets(STDIN));

echo "Masukkan Jam Lembur : ";
$jamLembur = (int)trim(fgets(STDIN));

$karyawan = new Karyawan($nama, $golongan, $jamLembur);

echo "\n===== DATA GAJI KARYAWAN =====\n";
echo $karyawan->getInfo();
?>
