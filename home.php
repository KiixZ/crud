<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMIKOM PURWOKERTO HOSPITAL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f9f9f9;
            font-size: 16px;
            color: #444;
        }
        .navbar-nav .nav-link {
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 400;
            transition: all 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <header class="bg-white p-4 rounded shadow-sm mb-4">
            <h1 class="text-center">AMIKOM PURWOKERTO HOSPITAL</h1>
            <h3 class="text-center text-muted">Jalan Jajan No. 1 Purwokerto Utara</h3>
        </header>

        <nav class="navbar navbar-expand-lg navbar-light bg-info rounded shadow-sm mb-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="home.php?page=beranda">BERANDA</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=karyawan">KARYAWAN IT</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=dokter">DOKTER</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=pasien">PASIEN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=pendaftaran">PENDAFTARAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=pemeriksaan">PEMERIKSAAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=pembayaran">PEMBAYARAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=obat">OBAT</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=detail">DETAIL PEMBAYARAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=tentang">TENTANG</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="bg-white p-4 rounded shadow-sm">
            <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                switch ($page) {
                    case 'beranda':
                        include "views/beranda.php";
                        break;
                    case 'karyawan':
                        include "views/karyawan.php";
                        break;
                    case 'dokter':
                        include "views/dokter.php";
                        break;
                    case 'pasien':
                        include "views/pasien.php";
                        break;
                    case 'pendaftaran':
                        include "views/pendaftaran.php";
                        break;
                    case 'pemeriksaan':
                        include "views/pemeriksaan.php";
                        break;
                    case 'pembayaran':
                        include "views/pembayaran.php";
                        break;
                    case 'obat':
                        include "views/obat.php";
                        break;
                    case 'detail':
                        include "views/detail.php";
                        break;
                    case 'tentang':
                        include "views/about.php";
                        break;
                    default:
                        echo "<div class='text-center'><h3>Maaf. Halaman tidak di temukan!</h3></div>";
                        break;
                }
            } else {
                include "views/beranda.php";
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

