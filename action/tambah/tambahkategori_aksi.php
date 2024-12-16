<?php
include 'koneksi.php';

$id = $_POST['idkategori'];
$namakategori = $_POST['namakategori'];

mysqli_query($koneksi, "INSERT INTO tbkategori VALUES ('$id', '$namakategori')");

header("location:home.php?page=kategori");
?>

