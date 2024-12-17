<?php
$title = "DATA KARYAWAN";
$page = "karyawan";
ob_start();

include '../../koneksi.php';
$idAdmin = $_GET['idAdmin'];

$data = mysqli_query($koneksi, "SELECT * FROM tbadmin WHERE idAdmin='$idAdmin'");

if ($data && mysqli_num_rows($data) > 0) {
 $d = mysqli_fetch_array($data);
?>
 <form method="post" action="../../action/edit/editkaryawan_aksi.php" class="needs-validation" novalidate>
 <input type="hidden" name="idAdmin" value="<?php echo $d['idAdmin']; ?>">

 <div class="mb-3">
 <label for="namaAdmin" class="form-label">Nama Karyawan</label>
 <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" value="<?php echo $d['namaAdmin']; ?>" required>
 </div>

 <div class="mb-3">
 <label for="usernameAdmin" class="form-label">usernameAdmin</label>
 <input type="text" class="form-control" id="usernameAdmin" name="usernameAdmin" value="<?php echo $d['usernameAdmin']; ?>" required>
 </div>

 <div class="mb-3">
 <label for="passwordAdmin" class="form-label">password Admin</label>
 <input type="text" class="form-control" id="passwordAdmin" name="passwordAdmin" value="<?php echo $d['passwordAdmin']; ?>" required>
 </div>

 <div class="mb-3">
 <label for="alamatKaryawan" class="form-label">Alamat</label>
 <input type="text" class="form-control" id="alamatKaryawan" name="alamatKaryawan" value="<?php echo $d['alamatKaryawan']; ?>" required>
 </div>

 <div class="mb-3">
 <label for="teleponkaryawan" class="form-label">Telepon</label>
 <input type="tel" class="form-control" id="teleponkaryawan" name="teleponkaryawan" value="<?php echo $d['teleponkaryawan']; ?>" required>
 </div>

 <button type="submit" class="btn btn-primary">SIMPAN</button>
 </form>
<?php
} else {
 echo "Data tidak ditemukan";
}
$content = ob_get_clean();
include 'edit_template.php';
?>