<?php
$title = "DATA KARYAWAN";
ob_start();
?>

<a href="./action/tambah/karyawan.php" class="btn btn-primary mb-3">+ TAMBAH KARYAWAN</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>username</th>
                <th>password</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbadmin ORDER BY idAdmin");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idAdmin']); ?></td>
                <td><?php echo htmlspecialchars($d['namaAdmin']); ?></td>
                <td><?php echo htmlspecialchars($d['usernameAdmin']); ?></td>
                <td><?php echo htmlspecialchars($d['passwordAdmin']); ?></td>
                <td><?php echo htmlspecialchars($d['alamatKaryawan']); ?></td>
                <td><?php echo htmlspecialchars($d['teleponkaryawan']); ?></td>
                <td>
                    <a href="action/edit/karyawan.php?idAdmin=<?php echo $d['idAdmin']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="action/hapus/karyawan.php?idAdmin=<?php echo $d['idAdmin']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

