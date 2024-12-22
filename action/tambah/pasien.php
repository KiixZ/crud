<?php
$title = "DATA PASIEN";
$page = "pasien";

require_once '../../koneksi.php';

function generateID($koneksi) {
    $query = "SELECT MAX(CAST(SUBSTRING(idPasien, 4) AS UNSIGNED)) AS max_id FROM tbPasien";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($hasil);
    $max_id = $data['max_id'];

    return "PAS" . sprintf("%03d", ($max_id ? $max_id + 1 : 1));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPasien = generateID($koneksi);
    $namaPasien = mysqli_real_escape_string($koneksi, $_POST['namaPasien']);
    $alamatPasien = mysqli_real_escape_string($koneksi, $_POST['alamatPasien']);
    $tanggalLahirPasien = mysqli_real_escape_string($koneksi, $_POST['tanggalLahirPasien']);
    $telephonePasien = mysqli_real_escape_string($koneksi, $_POST['telephonePasien']);

    $query = "INSERT INTO tbPasien (idPasien, namaPasien, alamatPasien, tanggalLahirPasien, telephonePasien) 
              VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $idPasien, $namaPasien, $alamatPasien, $tanggalLahirPasien, $telephonePasien);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../../home.php?page=pasien");
        exit();
    } else {
        $error = "Error: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
}

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2><?php echo htmlspecialchars($title); ?></h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="namaPasien" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="namaPasien" name="namaPasien" required>
            </div>
            <div class="mb-3">
                <label for="alamatPasien" class="form-label">Alamat Pasien</label>
                <input type="text" class="form-control" id="alamatPasien" name="alamatPasien" required>
            </div>
            <div class="mb-3">
                <label for="tanggalLahirPasien" class="form-label">TTL Pasien</label>
                <input type="text" class="form-control" id="tanggalLahirPasien" name="tanggalLahirPasien" required>
            </div>
            <div class="mb-3">
                <label for="telephonePasien" class="form-label">Telephone Pasien</label>
                <input type="tel" class="form-control" id="telephonePasien" name="telephonePasien" required>
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$content = ob_get_clean();
include 'tambah_template.php';
?>