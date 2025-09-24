<?php
echo "Nama Kamu Siapa : ";
$input_nama = fopen("php://stdin", "r");
$nama = trim(fgets($input_nama));

echo "Hello, $nama. apa kabar hari ini?";
?>