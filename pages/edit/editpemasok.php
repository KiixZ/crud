<?php
$title = "DATA PEMASOK";
$page = "pemasok";
ob_start();
?>

<?php
include 'koneksi.php';
$idpemasok = $_GET['idpemasok'];
$data = mysqli_query($koneksi, "SELECT * FROM tbpemasok WHERE idpemasok='$idpemasok'");
$d = mysqli_fetch_array($data);
?>

<form method="post" action="editpemasok_aksi.php" class="needs-validation" novalidate>
    <input type="hidden" name="idpemasok" value="<?php echo $d['idpemasok']; ?>">
    <div class="mb-3">
        <label for="namapemasok" class="form-label">Nama Pemasok</label>
        <input type="text" class="form-control" id="namapemasok" name="namapemasok" value="<?php echo $d['namapemasok']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="alamatpemasok" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamatpemasok" name="alamatpemasok" value="<?php echo $d['alamatpemasok']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="teleponpemasok" class="form-label">Telepon</label>
        <input type="tel" class="form-control" id="teleponpemasok" name="teleponpemasok" value="<?php echo $d['teleponpemasok']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'edit_template.php';
?>

