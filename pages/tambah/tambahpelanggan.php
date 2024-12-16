<?php
$title = "DATA PELANGGAN";
$page = "pelanggan";
ob_start();
?>

<form method="post" action="../../action/tambah/tambahpelanggan_aksi.php" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="idpelanggan" class="form-label">ID Pelanggan</label>
        <input type="text" class="form-control" id="idpelanggan" name="idpelanggan" required>
    </div>
    <div class="mb-3">
        <label for="namapelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" id="namapelanggan" name="namapelanggan" required>
    </div>
    <div class="mb-3">
        <label for="alamatpelanggan" class="form-label">Alamat Pelanggan</label>
        <input type="text" class="form-control" id="alamatpelanggan" name="alamatpelanggan" required>
    </div>
    <div class="mb-3">
        <label for="teleponpelanggan" class="form-label">Telepon Pelanggan</label>
        <input type="tel" class="form-control" id="teleponpelanggan" name="teleponpelanggan" required>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'tambah_template.php';
?>

