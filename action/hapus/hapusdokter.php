<?php
// koneksi database
include '../../koneksi.php';
$id = $_GET['idDokter'];

if (isset($id)) {
 $query = "DELETE FROM tbDokter WHERE idDokter = '$id'";
 $hasil = mysqli_query($koneksi, $query);
 if ($hasil) {
 header("Location: ../../home.php?page=dokter");
 exit;
 } else {
 echo "Gagal menghapus data";
 }
} else {
 echo "ID tidak ditemukan";
}
?>