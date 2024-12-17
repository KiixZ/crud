<?php
$title = "DATA KARYAWAN";
$page = "karyawan";
ob_start();
?>

<form method="post" action="../../action/tambah/tambahkaryawan_aksi.php" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="namaAdmin" class="form-label">Nama Karyawan</label>
        <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" required>
    </div>
    <div class="mb-3">
        <label for="usernameAdmin" class="form-label">Username Karyawan</label>
        <input type="text" class="form-control" id="usernameAdmin" name="usernameAdmin" required>
    </div>
    <div class="mb-3">
        <label for="passwordAdmin" class="form-label">password Karyawan</label>
        <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin" required>
    </div>
    <div class="mb-3">
        <label for="alamatKaryawan" class="form-label">Alamat Karyawan</label>
        <input type="text" class="form-control" id="alamatKaryawan" name="alamatKaryawan" required>
    </div>
    <div class="mb-3">
        <label for="teleponkaryawan" class="form-label">Telepon Karyawan</label>
        <input type="tel" class="form-control" id="teleponkaryawan" name="teleponkaryawan" required>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'tambah_template.php';
?>

