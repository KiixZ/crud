<?php
include 'koneksi.php';

$idkategori = $_POST['idkategori'];
$namakategori = $_POST['namakategori'];

mysqli_query($koneksi, "UPDATE tbkategori SET namakategori='$namakategori' WHERE idkategori='$idkategori'");

header("location:home.php?page=kategori");
?>

