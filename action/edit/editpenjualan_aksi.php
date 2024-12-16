<?php
include 'koneksi.php';

$idpenjualan = $_POST['idpenjualan'];
$tanggal = $_POST['tanggal'];
$idpelanggan = $_POST['idpelanggan'];
$total = $_POST['total'];

mysqli_query($koneksi, "UPDATE tbpenjualan SET tanggal='$tanggal', idpelanggan='$idpelanggan', total='$total' WHERE idpenjualan='$idpenjualan'");

header("location:home.php?page=penjualan");
?>

