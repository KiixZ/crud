<?php
include '../../koneksi.php';

function generateID($koneksi) {
    $query = "SELECT MAX(idadmin) AS max_id FROM tbadmin";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($hasil);
    $max_id = $data['max_id'];

    if ($max_id == "") {
        $id = "ADM001";
    } else {
        $nomor = substr($max_id, 3);
        $nomor++;
        $id = "ADM" . sprintf("%03d", $nomor);
    }

    return $id;
}

$idAdmin = generateID($koneksi);
$namaAdmin = $_POST['namaAdmin'];
$usernameAdmin = $_POST['usernameAdmin'];
$passwordAdmin = $_POST['passwordAdmin'];
$alamatkaryawan = $_POST['alamatKaryawan'];
$teleponkaryawan = $_POST['teleponkaryawan'];

mysqli_query($koneksi, "INSERT INTO tbadmin VALUES ('$idAdmin', '$namaAdmin', '$usernameAdmin','$passwordAdmin', '$alamatkaryawan', '$teleponkaryawan')");

header("location:../../home.php?page=karyawan");
?>

