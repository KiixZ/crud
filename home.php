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
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="home.php?page=beranda">BERANDA</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=karyawan">KARYAWAN IT</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=dokter">DOKTER</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=pasien">PASIEN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=pemasok">PENDAFTARAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=kategori">PEMERIKSAAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=produk">PEMBAYARAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=penjualan">OBAT</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=penjualan">HASIL PEMBAYARAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=tentang">TENTANG</a></li>
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
                        include "pages/beranda.php";
                        break;
                    case 'karyawan':
                        include "pages/tampilkaryawan.php";
                        break;
                    case 'dokter':
                        include "pages/tampildokter.php";
                        break;
                    case 'pasien':
                        include "pages/tampilpasien.php";
                        break;
                    case 'pemasok':
                        include "pages/tampilpemasok.php";
                        break;
                    case 'kategori':
                        include "pages/tampilkategori.php";
                        break;
                    case 'produk':
                        include "pages/tampilproduk.php";
                        break;
                    case 'penjualan':
                        include "pages/tampilpenjualan.php";
                        break;
                    case 'tentang':
                        include "pages/about.php";
                        break;
                    default:
                        echo "<div class='text-center'><h3>Maaf. Halaman tidak di temukan!</h3></div>";
                        break;
                }
            } else {
                include "pages/beranda.php";
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

