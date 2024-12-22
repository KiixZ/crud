<?php
$title = "DATA DETAIL PEMBAYARAN";
ob_start();
?>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID PEMBAYARAN</th>
                <th>ID OBAT</th>
                <th>HARGA</th>
                <th>JUMLAH OBAT</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbDetailBayar ORDER BY idBayar");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idBayar']); ?></td>
                <td><?php echo htmlspecialchars($d['idObat']); ?></td>
                <td><?php echo htmlspecialchars($d['harga']); ?></td>
                <td><?php echo htmlspecialchars($d['jumlahObat']); ?></td>
                <td>
                    <a href="pages/edit/detail.php?idBayar=<?php echo (isset($d['idBayar'])) ? $d['idBayar'] : ''; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="pages/hapus/detail.php?idBayar=<?php echo (isset($d['idBayar'])) ? $d['idBayar'] : ''; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

