<?php
$title = "DATA OBAT";
ob_start();
?>

<a href="./action/tambah/obat.php" class="btn btn-primary mb-3">+ TAMBAH OBAT</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID OBAT</th>
                <th>NAMA OBAT</th>
                <th>SATUAN</th>
                <th>HARGA</th>
                <th>Tgl EXP</th>
                <th>Jum OBAT</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbObat ORDER BY idObat");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idObat']); ?></td>
                <td><?php echo htmlspecialchars($d['namaObat']); ?></td>
                <td><?php echo htmlspecialchars($d['satuan']); ?></td>
                <td><?php echo htmlspecialchars($d['harga']); ?></td>
                <td><?php echo htmlspecialchars($d['tglExpired']); ?></td>
                <td><?php echo htmlspecialchars($d['jumlahObat']); ?></td>
                <td>
                    <a href="pages/edit/obat.php?idAdmin=<?php echo $d['idObat']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="action/hapus/obat.php?idAdmin=<?php echo $d['idObat']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

