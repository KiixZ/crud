<?php
$title = "EDIT DATA KARYAWAN";
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
    $idAdmin = mysqli_real_escape_string($koneksi, $_POST['idAdmin']);
    $namaAdmin = mysqli_real_escape_string($koneksi, $_POST['namaAdmin']);
    $usernameAdmin = mysqli_real_escape_string($koneksi, $_POST['usernameAdmin']);
    $alamatKaryawan = mysqli_real_escape_string($koneksi, $_POST['alamatKaryawan']);
    $teleponKaryawan = mysqli_real_escape_string($koneksi, $_POST['teleponkaryawan']);

    $query = "UPDATE tbadmin SET 
              namaAdmin = ?, 
              usernameAdmin = ?, 
              alamatKaryawan = ?, 
              teleponkaryawan = ? 
              WHERE idadmin = ?";
    
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $namaAdmin, $usernameAdmin, $alamatKaryawan, $teleponKaryawan, $idAdmin);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../../home.php?page=karyawan");
        exit();
    } else {
        $error = "Error: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
}

// Fetch existing data if ID is provided
if (isset($_GET['id'])) {
    $idAdmin = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "SELECT * FROM tbadmin WHERE idadmin = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $idAdmin);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $karyawan = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

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
            <input type="hidden" name="idAdmin" value="<?php echo htmlspecialchars($karyawan['idadmin'] ?? ''); ?>">
            <div class="mb-3">
                <label for="namaAdmin" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" value="<?php echo htmlspecialchars($karyawan['nama_admin'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="usernameAdmin" class="form-label">Username Karyawan</label>
                <input type="text" class="form-control" id="usernameAdmin" name="usernameAdmin" value="<?php echo htmlspecialchars($karyawan['username_admin'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamatKaryawan" class="form-label">Alamat Karyawan</label>
                <input type="text" class="form-control" id="alamatKaryawan" name="alamatKaryawan" value="<?php echo htmlspecialchars($karyawan['alamat_karyawan'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="teleponkaryawan" class="form-label">Telepon Karyawan</label>
                <input type="tel" class="form-control" id="teleponkaryawan" name="teleponkaryawan" value="<?php echo htmlspecialchars($karyawan['telepon_karyawan'] ?? ''); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </form>
    </div>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$content = ob_get_clean();
include 'edit_template.php';
?>