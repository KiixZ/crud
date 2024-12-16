<?php
$title = "DATA KARYAWAN";
$page = "karyawan";
ob_start();
?>

<?php
include '../../koneksi.php';
$idadmin = $_GET['idadmin'];
$data = mysqli_query($koneksi, "SELECT * FROM tbadmin WHERE idadmin='$idadmin'");
$d = mysqli_fetch_array($data);
?>

<form method="post" action="../../action/tambah/editkaryawan_aksi.php" class="needs-validation" novalidate>
    <input type="hidden" name="idadmin" value="<?php echo $d['idAdmin']; ?>">
    <div class="mb-3">
        <label for="namaAdmin" class="form-label">Nama Karyawan</label>
        <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" value="<?php echo $d['namaAdmin']; ?>" required>
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
$content = ob_get_clean();
include 'edit_template.php';
?>

