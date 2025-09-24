<?php
class KonversiSuhu {
    public $celsius;

    function __construct($celsius) {
        $this->celsius = $celsius;
    }

    function tampilkanHasil() {
        $reamur = (4/5) * $this->celsius;
        $fahrenheit = (9/5) * $this->celsius + 32;
        $kelvin = $this->celsius + 273.15;

        echo "<h2>Konversi Suhu dari Celcius</h2>";
        echo "suhu dalam celcius = {$this->celsius} derajat<br>";
        echo "suhu dalam reamur = {$reamur} derajat<br>";
        echo "suhu dalam fahrenheit = {$fahrenheit} derajat<br>";
        echo "suhu dalam kelvin = {$kelvin} derajat<br><br>";
        echo "<i><u><b>Sekian konversi suhu yang bisa dilakukan<b><u></i>";
    }
}

// contoh penggunaan
$suhu = new KonversiSuhu(36);
$suhu->tampilkanHasil();
?>
