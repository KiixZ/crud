<?php
include 'koneksi.php';

$idproduk = $_POST['idproduk'];
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$idkategori = $_POST['idkategori'];

mysqli_query($koneksi, "UPDATE tbproduk SET namaproduk='$namaproduk', harga='$harga', stok='$stok', idkategori='$idkategori' WHERE idproduk='$idproduk'");

header("location:home.php?page=produk");
?>

