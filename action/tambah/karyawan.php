<?php
$title = "DATA KARYAWAN";
$page = "karyawan";

require_once '../../koneksi.php';

function generateID($koneksi) {
    $query = "SELECT MAX(CAST(SUBSTRING(idadmin, 4) AS UNSIGNED)) AS max_id FROM tbadmin";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($hasil);
    $max_id = $data['max_id'];

    return "ADM" . sprintf("%03d", ($max_id ? $max_id + 1 : 1));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAdmin = generateID($koneksi);
    $namaAdmin = mysqli_real_escape_string($koneksi, $_POST['namaAdmin']);
    $usernameAdmin = mysqli_real_escape_string($koneksi, $_POST['usernameAdmin']);
    $passwordAdmin = password_hash($_POST['passwordAdmin'], PASSWORD_DEFAULT);
    $alamatKaryawan = mysqli_real_escape_string($koneksi, $_POST['alamatKaryawan']);
    $teleponKaryawan = mysqli_real_escape_string($koneksi, $_POST['teleponkaryawan']);

    $query = "INSERT INTO tbadmin (idAdmin, namaAdmin, usernameAdmin,passwordAdmin, alamatkaryawan, teleponkaryawan) 
              VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $idAdmin, $namaAdmin, $usernameAdmin, $passwordAdmin, $alamatKaryawan, $teleponKaryawan);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../../home.php?page=karyawan");
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
                <label for="namaAdmin" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" required>
            </div>
            <div class="mb-3">
                <label for="usernameAdmin" class="form-label">Username Karyawan</label>
                <input type="text" class="form-control" id="usernameAdmin" name="usernameAdmin" required>
            </div>
            <div class="mb-3">
                <label for="passwordAdmin" class="form-label">Password Karyawan</label>
                <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin" required>
            </div>
            <div class="mb-3">
                <label for="alamatKaryawan" class="form-label">Alamat Karyawan</label>
                <input type="text" class="form-control" id="alamatKaryawan" name="alamatKaryawan" required>
            </div>
            <div class="mb-3">
                <label for="teleponkaryawan" class="form-label">Telepon Karyawan</label>
                <input type="tel" class="form-control" id="teleponkaryawan" name="teleponkaryawan" required>
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