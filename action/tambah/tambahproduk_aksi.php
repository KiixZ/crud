<?php
include 'koneksi.php';

$id = $_POST['idproduk'];
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$idkategori = $_POST['idkategori'];

mysqli_query($koneksi, "INSERT INTO tbproduk VALUES ('$id', '$namaproduk', '$harga', '$stok', '$idkategori')");

header("location:home.php?page=produk");
?>

