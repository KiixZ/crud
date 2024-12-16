<?php
$title = "DATA KATEGORI";
$page = "kategori";
ob_start();
?>

<form method="post" action="../../action/tambah/tambahkategori_aksi.php" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="idkategori" class="form-label">ID Kategori</label>
        <input type="text" class="form-control" id="idkategori" name="idkategori" required>
    </div>
    <div class="mb-3">
        <label for="namakategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" id="namakategori" name="namakategori" required>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'tambah_template.php';
?>

