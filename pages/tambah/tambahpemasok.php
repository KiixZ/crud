<?php
$title = "DATA PEMASOK";
$page = "pemasok";
ob_start();
?>

<form method="post" action="../../action/tambah/tambahpemasok_aksi.php" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="idpemasok" class="form-label">ID Pemasok</label>
        <input type="text" class="form-control" id="idpemasok" name="idpemasok" required>
    </div>
    <div class="mb-3">
        <label for="namapemasok" class="form-label">Nama Pemasok</label>
        <input type="text" class="form-control" id="namapemasok" name="namapemasok" required>
    </div>
    <div class="mb-3">
        <label for="alamatpemasok" class="form-label">Alamat Pemasok</label>
        <input type="text" class="form-control" id="alamatpemasok" name="alamatpemasok" required>
    </div>
    <div class="mb-3">
        <label for="teleponpemasok" class="form-label">Telepon Pemasok</label>
        <input type="tel" class="form-control" id="teleponpemasok" name="teleponpemasok" required>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'tambah_template.php';
?>

