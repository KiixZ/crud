<?php
$title = "DATA PENJUALAN";
$page = "penjualan";
ob_start();
?>

<form method="post" action="../../action/tambah/tambahpenjualan_aksi.php" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="idpenjualan" class="form-label">ID Penjualan</label>
        <input type="text" class="form-control" id="idpenjualan" name="idpenjualan" required>
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
    </div>
    <div class="mb-3">
        <label for="idpelanggan" class="form-label">Pelanggan</label>
        <select class="form-select" id="idpelanggan" name="idpelanggan" required>
            <option value="">Pilih Pelanggan</option>
            <?php
            include 'koneksi.php';
            $pelanggan = mysqli_query($koneksi, "SELECT * FROM tbpelanggan");
            while($p = mysqli_fetch_array($pelanggan)) {
                echo "<option value='".$p['idpelanggan']."'>".$p['namapelanggan']."</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="total" class="form-label">Total</label>
        <input type="number" class="form-control" id="total" name="total" required>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'tambah_template.php';
?>

