<?php
$title = "DATA KATEGORI";
ob_start();
?>

<a href="./pages/tambah/tambahkategori.php" class="btn btn-primary mb-3">+ TAMBAH KATEGORI</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbkategori ORDER BY idkategori");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idkategori']); ?></td>
                <td><?php echo htmlspecialchars($d['namakategori']); ?></td>
                <td>
                    <a href="editkategori.php?idkategori=<?php echo $d['idkategori']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapuskategori.php?idkategori=<?php echo $d['idkategori']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

