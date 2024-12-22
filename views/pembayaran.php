<?php
$title = "DATA PEMBAYARAN";
ob_start();
?>

<a href="./pages/tambah/tambahproduk.php" class="btn btn-primary mb-3">+ TAMBAH PEMBAYARAN</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID PEMBAYARAN</th>
                <th>ID PEMERIKSAAN</th>
                <th>TANGGAL BAYAR</th>
                <th>JUMLAH BAYAR</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbPembayaran");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idBayar']); ?></td>
                <td><?php echo htmlspecialchars($d['idPemeriksaan']); ?></td>
                <td><?php echo htmlspecialchars($d['tglBayar']); ?></td>
                <td><?php echo htmlspecialchars($d['jumlahBayar']); ?></td>
                <td>
                    <a href="./action/edit/pemeriksaan.php?idPemeriksaan=<?php echo $d['idPemeriksaan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="./action/hapus/pemeriksaan.php?idPemeriksaan=<?php echo $d['idPemeriksaan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

