<?php
$title = "DATA PRODUK";
$page = "produk";
ob_start();
?>

<form method="post" action="../../action/tambah/tambahproduk_aksi.php" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="idproduk" class="form-label">ID Produk</label>
        <input type="text" class="form-control" id="idproduk" name="idproduk" required>
    </div>
    <div class="mb-3">
        <label for="namaproduk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="namaproduk" name="namaproduk" required>
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" required>
    </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stok" name="stok" required>
    </div>
    <div class="mb-3">
        <label for="idkategori" class="form-label">Kategori</label>
        <select class="form-select" id="idkategori" name="idkategori" required>
            <option value="">Pilih Kategori</option>
            <?php
            include 'koneksi.php';
            $kategori = mysqli_query($koneksi, "SELECT * FROM tbkategori");
            while($k = mysqli_fetch_array($kategori)) {
                echo "<option value='".$k['idkategori']."'>".$k['namakategori']."</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'tambah_template.php';
?>

