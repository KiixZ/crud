<?php
// koneksi database
include '../../koneksi.php';
$id = $_GET['idAdmin'];

if (isset($id)) {
 $query = "DELETE FROM tbadmin WHERE idAdmin = '$id'";
 $hasil = mysqli_query($koneksi, $query);
 if ($hasil) {
 header("Location: ../../home.php?page=karyawan");
 exit;
 } else {
 echo "Gagal menghapus data";
 }
} else {
 echo "ID tidak ditemukan";
}
?>