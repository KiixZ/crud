<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usernameAdmin'];
    $password = $_POST['passwordAdmin'];

    $query = "SELECT * FROM tbAdmin WHERE usernameAdmin='$username' AND passwordAdmin='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['idAdmin'];
        $_SESSION['username'] = $row['usernameAdmin'];
        $_SESSION['nama'] = $row['namaAdmin'];
        header("Location: home.php");
        exit();
    } else {
        header("Location: index.php?error=" . urlencode("Username atau password salah"));
        exit();
    }
} else {
    // If accessed directly without POST data, redirect to index.php
    header("Location: index.php");
    exit();
}
?>