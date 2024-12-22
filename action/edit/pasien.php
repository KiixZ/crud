<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Edit Data Pelanggan</h2>
    <!-- <a href="../../home.php?page=pelanggan" class="btn btn-secondary mb-3">Kembali</a> -->


<?php
include '../../koneksi.php';

// Mengecek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data dari form
    $idpelanggan = $_POST['idPasien'];
    $namapelanggan = $_POST['namaPasien'];
    $alamatpelanggan = $_POST['alamatPasien'];
    $tanggalLahirPasien = $_POST['tanggalLahirPasien'];
    $teleponpelanggan = $_POST['telephonePasien'];

    // Proses update data ke database
    $query = "UPDATE tbPasien 
              SET namaPasien = '$namapelanggan', 
                  alamatPasien = '$alamatpelanggan', 
                  tanggalLahirPasien = '$tanggalLahirPasien', 
                  telephonePasien = '$teleponpelanggan' 
              WHERE idPasien = '$idpelanggan'";

    if (mysqli_query($koneksi, $query)) {
        echo "<p>Data berhasil diperbarui!</p>";
        echo "<a href='home.php?page=pelanggan'>Lihat Data</a>";
        exit;
    } else {
        echo "<p>Terjadi kesalahan saat mengupdate data: " . mysqli_error($koneksi) . "</p>";
    }
}

// Jika tidak ada `POST`, maka tampilkan form edit
if (isset($_GET['idPasien'])) {
    $idpelanggan = $_GET['idPasien'];
    $data = mysqli_query($koneksi, "SELECT * FROM tbPasien WHERE idPasien='$idpelanggan'");
    $d = mysqli_fetch_array($data);

    if ($d) {
        ?>
         <form method="post" action="">
                <input type="hidden" name="idpelanggan" value="<?php echo $d['idPasien']; ?>">

                <div class="mb-3">
                    <label for="namaPasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control" id="namaPasien" name="namaPasien" value="<?php echo $d['namaPasien']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="alamatPasien" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamatPasien" name="alamatPasien" value="<?php echo $d['alamatPasien']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tanggalLahirPasien" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggalLahirPasien" name="tanggalLahirPasien" value="<?php echo $d['tanggalLahirPasien']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telephonePasien" class="form-label">Telepon</label>
                    <input type="number" class="form-control" id="telephonePasien" name="telephonePasien" value="<?php echo $d['telephonePasien']; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="../../home.php?page=pasien" class="btn btn-secondary">Kembali</a>
            </form>
        <!-- <form method="post" action="">  
            <table>
                <tr>
                    <td>Nama Pasien</td>
                    <td>
                        <input type="hidden" name="idPasien" value="<?php echo $d['idPasien']; ?>">
                        <input type="text" name="namaPasien" value="<?php echo $d['namaPasien']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>
                        <input type="text" name="alamatPasien" value="<?php echo $d['alamatPasien']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>TTL Pasien</td>
                    <td>
                        <input type="date" name="tanggalLahirPasien" value="<?php echo $d['tanggalLahirPasien']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>
                        <input type="number" name="telephonePasien" value="<?php echo $d['telephonePasien']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form> -->
        <?php
    } else {
        echo '<div class="alert alert-danger">Data tidak ditemukan!</div>';
    }
} else {
    echo '<div class="alert alert-danger">ID pelanggan tidak disediakan!</div>';
}
?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>