<?php
$title = "DATA PRODUK";
ob_start();
?>

<a href="./pages/tambah/tambahproduk.php" class="btn btn-primary mb-3">+ TAMBAH PRODUK</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT p.*, k.namakategori FROM tbproduk p JOIN tbkategori k ON p.idkategori = k.idkategori ORDER BY p.idproduk");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idproduk']); ?></td>
                <td><?php echo htmlspecialchars($d['namaproduk']); ?></td>
                <td><?php echo number_format($d['harga'], 0, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($d['stok']); ?></td>
                <td><?php echo htmlspecialchars($d['namakategori']); ?></td>
                <td>
                    <a href="editproduk.php?idproduk=<?php echo $d['idproduk']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapusproduk.php?idproduk=<?php echo $d['idproduk']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

