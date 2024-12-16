<?php
include 'koneksi.php';

$idpemasok = $_POST['idpemasok'];
$namapemasok = $_POST['namapemasok'];
$alamatpemasok = $_POST['alamatpemasok'];
$teleponpemasok = $_POST['teleponpemasok'];

mysqli_query($koneksi, "UPDATE tbpemasok SET namapemasok='$namapemasok', alamatpemasok='$alamatpemasok', teleponpemasok='$teleponpemasok' WHERE idpemasok='$idpemasok'");

header("location:home.php?page=pemasok");
?>

