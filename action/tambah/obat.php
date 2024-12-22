<?php
$title = "DATA OBAT";
$page = "obat";

require_once '../../koneksi.php';

function generateID($koneksi) {
    $query = "SELECT MAX(CAST(SUBSTRING(idObat, 5) AS UNSIGNED)) AS max_id FROM tbObat";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($hasil);
    $max_id = $data['max_id'];

    return "OBAT" . sprintf("%03d", ($max_id ? $max_id + 1 : 1));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idObat = generateID($koneksi);
    $namaObat = mysqli_real_escape_string($koneksi, $_POST['namaObat']);
    $satuan = mysqli_real_escape_string($koneksi, $_POST['satuan']);
    $harga = filter_var($_POST['harga'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $tglExpired = mysqli_real_escape_string($koneksi, $_POST['tglExpired']);
    $jumlahObat = filter_var($_POST['jumlahObat'], FILTER_SANITIZE_NUMBER_INT);

    // Start a transaction
    mysqli_begin_transaction($koneksi);

    try {
        $query = "INSERT INTO tbObat (idObat, namaObat, satuan, harga, tglExpired, jumlahObat) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "sssdsi", $idObat, $namaObat, $satuan, $harga, $tglExpired, $jumlahObat);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_commit($koneksi);
            $success = "Data obat berhasil ditambahkan.";
        } else {
            throw new Exception(mysqli_stmt_error($stmt));
        }
    } catch (Exception $e) {
        mysqli_rollback($koneksi);
        $error = "Error: " . $e->getMessage();
    } finally {
        mysqli_stmt_close($stmt);
    }
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
        <?php if (isset($success)) : ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="namaObat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="namaObat" name="namaObat" required>
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan Obat</label>
                <input type="text" class="form-control" id="satuan" name="satuan" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Obat</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="tglExpired" class="form-label">Tanggal Expired</label>
                <input type="date" class="form-control" id="tglExpired" name="tglExpired" required>
            </div>
            <div class="mb-3">
                <label for="jumlahObat" class="form-label">Jumlah Obat</label>
                <input type="number" class="form-control" id="jumlahObat" name="jumlahObat" required>
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