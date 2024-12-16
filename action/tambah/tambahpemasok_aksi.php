<?php
include 'koneksi.php';

$id = $_POST['idpemasok'];
$namapemasok = $_POST['namapemasok'];
$alamatpemasok = $_POST['alamatpemasok'];
$teleponpemasok = $_POST['teleponpemasok'];

mysqli_query($koneksi, "INSERT INTO tbpemasok VALUES ('$id', '$namapemasok', '$alamatpemasok', '$teleponpemasok')");

header("location:home.php?page=pemasok");
?>

