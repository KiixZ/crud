<?php
include 'koneksi.php';

$id = $_POST['idpenjualan'];
$tanggal = $_POST['tanggal'];
$idpelanggan = $_POST['idpelanggan'];
$total = $_POST['total'];

mysqli_query($koneksi, "INSERT INTO tbpenjualan VALUES ('$id', '$tanggal', '$idpelanggan', '$total')");

header("location:home.php?page=penjualan");
?>

