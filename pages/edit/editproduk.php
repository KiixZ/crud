<?php
$title = "DATA PRODUK";
$page = "produk";
ob_start();
?>

<?php
include 'koneksi.php';
$idproduk = $_GET['idproduk'];
$data = mysqli_query($koneksi, "SELECT * FROM tbproduk WHERE idproduk='$idproduk'");
$d = mysqli_fetch_array($data);
?>

<form method="post" action="editproduk_aksi.php" class="needs-validation" novalidate>
    <input type="hidden" name="idproduk" value="<?php echo $d['idproduk']; ?>">
    <div class="mb-3">
        <label for="namaproduk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="<?php echo $d['namaproduk']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $d['harga']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $d['stok']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="idkategori" class="form-label">Kategori</label>
        <select class="form-select" id="idkategori" name="idkategori" required>
            <?php
            $kategori = mysqli_query($koneksi, "SELECT * FROM tbkategori");
            while($k = mysqli_fetch_array($kategori)) {
                $selected = ($k['idkategori'] == $d['idkategori']) ? 'selected' : '';
                echo "<option value='".$k['idkategori']."' ".$selected.">".$k['namakategori']."</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'edit_template.php';
?>

