<?php
$title = "DATA PENDAFTARAN";
ob_start();
?>

<a href="./action/tambah/pendaftaran.php" class="btn btn-primary mb-3">+ TAMBAH KATEGORI</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID PENDAFTARAN</th>
                <th>ID PASIEN</th>
                <th>ID DOKTER</th>
                <th>TANGGAL DAFTAR</th>
                <th>WAKTU DAFTAR</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tbPendaftaran ORDER BY idPendaftaran");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($d['idPendaftaran']); ?></td>
                <td><?php echo htmlspecialchars($d['idPasien']); ?></td>
                <td><?php echo htmlspecialchars($d['idDokter']); ?></td>
                <td><?php echo htmlspecialchars($d['tanggalDaftar']); ?></td>
                <td><?php echo htmlspecialchars($d['waktudaftar']); ?></td>
                <td>
                    <a href="./action/edit/pendaftaran.php?idPendaftaran=<?php echo $d['idPendaftaran']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="./action/hapus/pendaftaran.php?idPendaftaran=<?php echo $d['idPendaftaran']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
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

