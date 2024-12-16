<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">DATA PASIEN RUMAH SAKIT AMIKOM PURWOKERTO</h2>
        
        <a href="./pages/tambah/tambahpelanggan.php" class="btn btn-primary mb-3">+ TAMBAH PELANGGAN</a>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Id Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir Pasien</th>
                        <th>Alamat Pasien</th>
                        <th>Telepon Pasien</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM tbPasien ORDER BY idPasien");

                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($d['idPasien']); ?></td>
                        <td><?php echo htmlspecialchars($d['namaPasien']); ?></td>
                        <td><?php echo htmlspecialchars($d['alamatPasien']); ?></td>
                        <td><?php echo htmlspecialchars($d['tanggalLahirPasien']); ?></td>
                        <td><?php echo htmlspecialchars($d['telephonePasien']); ?></td>
                        <td>
                        <a href="pages/edit/editpasien.php?idPasien=<?php echo (isset($d['idadmin'])) ? $d['idadmin'] : ''; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="pages/hapus/hapuspasien.php?idPasien=<?php echo (isset($d['idadmin'])) ? $d['idadmin'] : ''; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                     </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

