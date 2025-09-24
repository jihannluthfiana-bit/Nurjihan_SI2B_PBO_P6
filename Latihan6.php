<?php
class Belanja {
    public $namabarang;
    public $harga;
    public $jumlah;
    public $total;

    public function __construct($namabarang, $harga, $jumlah){
        $this->namabarang = $namabarang;
        $this->harga = $harga;
        $this->jumlah = $jumlah;
        $this->total = $harga * $jumlah;
        echo "Constructor : Data Belanja '$this->namabarang' dibuat. \n";
    }

    public function getinfo (){
        return $this->namabarang . " (" . $this->harga . " x " . $this->jumlah . ") = " . $this->total;
    }

    public function __destruct (){
        echo "Destructor : Data Belanja  '$this->namabarang' dihapus. \n";
    }
} 

echo "Masukkan jumlah barang belanja yang dibeli : ";
$jml = (int)trim(fgets(STDIN));

$barang = [];
$totalbelanja = 0;

for ($i = 1; $i <= $jml; $i++) {
    echo "\nBarang ke-$i\n";
    echo "Nama barang : "; $namabarang = trim(fgets(STDIN));
    echo "Harga satuan : "; $harga = (int)trim(fgets(STDIN));
    echo "Jumlah : "; $jumlah = (int)trim(fgets(STDIN));

    $mie = new Belanja($namabarang, $harga, $jumlah);
    $barang[] = $mie;
    $totalbelanja += $mie->total;
}

echo "\n----------------------- DAFTAR BELANJA ----------------------\n";
foreach ($barang as $item){
    echo $item->getinfo() . "\n";
}
echo "---------------------------------------------------------------\n";
echo "Total Belanja Adalah : " . $totalbelanja . "\n";
?>
