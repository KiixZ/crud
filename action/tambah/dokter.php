<?php
$title = "DATA DOKTER";
$page = "dokter";

require_once '../../koneksi.php';

function generateID($koneksi) {
    $query = "SELECT MAX(CAST(SUBSTRING(idDokter, 4) AS UNSIGNED)) AS max_id FROM tbDokter";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($hasil);
    $max_id = $data['max_id'];

    return "DOK" . sprintf("%03d", ($max_id ? $max_id + 1 : 1));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDokter = generateID($koneksi);
    $namaDokter = mysqli_real_escape_string($koneksi, $_POST['namaDokter']);
    $spesialisasi = mysqli_real_escape_string($koneksi, $_POST['spesialisasi']);
    $telephoneDokter = mysqli_real_escape_string($koneksi, $_POST['telephoneDokter']);

    $query = "INSERT INTO tbDokter (idDokter, namaDokter, spesialisasi, telephoneDokter) 
              VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $idDokter, $namaDokter, $spesialisasi, $telephoneDokter);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../../home.php?page=dokter");
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
                <label for="namaDokter" class="form-label">Nama Dokter</label>
                <input type="text" class="form-control" id="namaDokter" name="namaDokter" required>
            </div>
            <div class="mb-3">
                <label for="spesialisasi" class="form-label">Dokter Spesialisasi</label>
                <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" required>
            </div>
            <div class="mb-3">
                <label for="telephoneDokter" class="form-label">Telephone Dokter</label>
                <input type="tel" class="form-control" id="telephoneDokter" name="telephoneDokter" required>
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