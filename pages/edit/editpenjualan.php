<?php
$title = "DATA PENJUALAN";
$page = "penjualan";
ob_start();
?>

<?php
include 'koneksi.php';
$idpenjualan = $_GET['idpenjualan'];
$data = mysqli_query($koneksi, "SELECT * FROM tbpenjualan WHERE idpenjualan='$idpenjualan'");
$d = mysqli_fetch_array($data);
?>

<form method="post" action="editpenjualan_aksi.php" class="needs-validation" novalidate>
    <input type="hidden" name="idpenjualan" value="<?php echo $d['idpenjualan']; ?>">
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $d['tanggal']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="idpelanggan" class="form-label">Pelanggan</label>
        <select class="form-select" id="idpelanggan" name="idpelanggan" required>
            <?php
            $pelanggan = mysqli_query($koneksi, "SELECT * FROM tbpelanggan");
            while($p = mysqli_fetch_array($pelanggan)) {
                $selected = ($p['idpelanggan'] == $d['idpelanggan']) ? 'selected' : '';
                echo "<option value='".$p['idpelanggan']."' ".$selected.">".$p['namapelanggan']."</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="total" class="form-label">Total</label>
        <input type="number" class="form-control" id="total" name="total" value="<?php echo $d['total']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

<?php
$content = ob_get_clean();
include 'edit_template.php';
?>

