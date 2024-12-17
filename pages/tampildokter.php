<?php
$title = "DATA DOKTER";
ob_start();
?>

<a href="./pages/tambah/tambahdokter.php" class="btn btn-primary mb-3">+ TAMBAH DOKTER</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID DOKTER</th>
                <th>NAMA DOKTER</th>
                <th>SPESIALISASI</th>
                <th>TELEPHONE DOKTER</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbDokter ORDER BY idDokter");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idDokter']); ?></td>
                <td><?php echo htmlspecialchars($d['namaDokter']); ?></td>
                <td><?php echo htmlspecialchars($d['spesialisasi']); ?></td>
                <td><?php echo htmlspecialchars($d['telephoneDokter']); ?></td>
                <td>
                    <a href="pages/edit/editdokter.php?idDokter=<?php echo (isset($d['idDokter'])) ? $d['idDokter'] : ''; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="pages/hapus/hapusdokter.php?idDokter=<?php echo (isset($d['idDokter'])) ? $d['idDokter'] : ''; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

