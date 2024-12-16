<?php
$title = "DATA PEMASOK";
ob_start();
?>

<a href="./pages/tambah/tambahpemasok.php" class="btn btn-primary mb-3">+ TAMBAH PEMASOK</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID Pemasok</th>
                <th>Nama Pemasok</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbpemasok ORDER BY idpemasok");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idpemasok']); ?></td>
                <td><?php echo htmlspecialchars($d['namapemasok']); ?></td>
                <td><?php echo htmlspecialchars($d['alamatpemasok']); ?></td>
                <td><?php echo htmlspecialchars($d['teleponpemasok']); ?></td>
                <td>
                    <a href="editpemasok.php?idpemasok=<?php echo $d['idpemasok']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapuspemasok.php?idpemasok=<?php echo $d['idpemasok']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

