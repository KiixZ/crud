<?php
$title = "DATA PENJUALAN";
ob_start();
?>

<a href="./pages/tambah/tambahpenjualan.php" class="btn btn-primary mb-3">+ TAMBAH PENJUALAN</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT p.*, pl.namapelanggan FROM tbpenjualan p JOIN tbpelanggan pl ON p.idpelanggan = pl.idpelanggan ORDER BY p.idpenjualan DESC");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idpenjualan']); ?></td>
                <td><?php echo htmlspecialchars($d['tanggal']); ?></td>
                <td><?php echo htmlspecialchars($d['namapelanggan']); ?></td>
                <td><?php echo number_format($d['total'], 0, ',', '.'); ?></td>
                <td>
                    <a href="detailpenjualan.php?idpenjualan=<?php echo $d['idpenjualan']; ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="hapuspenjualan.php?idpenjualan=<?php echo $d['idpenjualan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include 'template.php';
?>

