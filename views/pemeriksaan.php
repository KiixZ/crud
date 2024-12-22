<?php
$title = "DATA PEMASOK";
ob_start();
?>

<a href="./pages/tambah/pemeriksaan.php" class="btn btn-primary mb-3">+ TAMBAH PEMASOK</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID PEMERIKSAAN</th>
                <th>ID PENDAFTARAN</th>
                <th>DIAGNOSA</th>
                <th>TINDAKAN</th>
                <th>BIAYA</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbPemeriksaan ORDER BY idPemeriksaan");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idPemeriksaan']); ?></td>
                <td><?php echo htmlspecialchars($d['idPendaftaran']); ?></td>
                <td><?php echo htmlspecialchars($d['diagnosa']); ?></td>
                <td><?php echo htmlspecialchars($d['tindakan']); ?></td>
                <td><?php echo htmlspecialchars($d['biaya']); ?></td>
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

