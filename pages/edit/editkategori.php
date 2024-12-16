<?php
$title = "DATA KATEGORI";
$page = "kategori";
ob_start();
?>

<?php
include 'koneksi.php';
$idkategori = $_GET['idkategori'];
$data = mysqli_query($koneksi, "SELECT * FROM tbkategori WHERE idkategori='$idkategori'");
$d = mysqli_fetch_array($data);
?>

<form method="post" action="editkategori_aksi.php" class="needs-validation" novalidate>
    <input type="hidden" name="idkategori" value="<?php echo $d['idkategori']; ?>">
    <div class="mb-3">
        <label for="namakategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" id="namakategori" name="namakategori" value="<?php echo $d['namakategori']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'edit_template.php';
?>

