<?php
include 'koneksi.php';

$idkaryawan = $_POST['idkaryawan'];
$namakaryawan = $_POST['namakaryawan'];
$alamatkaryawan = $_POST['alamatkaryawan'];
$teleponkaryawan = $_POST['teleponkaryawan'];

mysqli_query($koneksi, "UPDATE tbkaryawan SET namakaryawan='$namakaryawan', alamatkaryawan='$alamatkaryawan', teleponkaryawan='$teleponkaryawan' WHERE idkaryawan='$idkaryawan'");

header("location:home.php?page=karyawan");
?>

