<?php
include 'koneksi.php';

$idadmin = $_POST['idAdmin'];
$namaAdmin = $_POST['namaAdmin'];
$usernameAdmin = $_POST['usernameAdmin'];
$passwordAdmin = $_POST['passwordAdmin'];
$alamatKaryawan = $_POST['alamatKaryawan'];
$teleponkaryawan = $_POST['teleponkaryawan'];

mysqli_query($koneksi, "UPDATE tbAdmin SET namaAdmin='$namaAdmin', usernameAdmin='$usernameAdmin', passwordAdmin='$passwordAdmin', alamatKaryawan'$alamatKaryawan',teleponkaryawan='$teleponkaryawan' WHERE idAdmin='$idAdmin'");

header("location:../../home.php?page=karyawan");
?>

