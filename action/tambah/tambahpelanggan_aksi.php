<?php
include 'koneksi.php';

$id = $_POST['idpelanggan'];
$namapelanggan = $_POST['namapelanggan'];
$alamatpelanggan = $_POST['alamatpelanggan'];
$teleponpelanggan = $_POST['teleponpelanggan'];

mysqli_query($koneksi, "INSERT INTO tbpelanggan VALUES ('$id', '$namapelanggan', '$alamatpelanggan', '$teleponpelanggan')");

header("location:home.php?page=pelanggan");
?>

