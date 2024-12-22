<?php
$title = "TENTANG AMIKOM PURWOKERTO HOSPITAL";
ob_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TENTANG - AMIKOM PURWOKERTO HOSPITAL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="card mx-auto" style="max-width: 800px;">
            <div class="card-header text-center bg-primary text-white">
                <h2 class="card-title mb-0">AMIKOM PURWOKERTO HOSPITAL</h2>
                <span class="badge bg-secondary mt-2">Didirikan 2015</span>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h3 class="h5"><i class="bi bi-info-circle me-2"></i>Tentang Kami</h3>
                    <p>AMIKOM PURWOKERTO HOSPITAL adalah rumah sakit modern yang melayani mahasiswa dan masyarakat di sekitar kampus AMIKOM Purwokerto. Kami berkomitmen untuk menyediakan layanan kesehatan berkualitas tinggi dengan harga yang terjangkau dan memberikan perawatan terbaik kepada setiap pasien.</p>
                </div>

                <div class="mb-4">
                    <h3 class="h5"><i class="bi bi-bullseye me-2"></i>Visi</h3>
                    <p>Menjadi rumah sakit terpercaya dan terdepan dalam pelayanan kesehatan di lingkungan kampus AMIKOM Purwokerto dan sekitarnya.</p>
                </div>

                <div>
                    <h3 class="h5"><i class="bi bi-list-check me-2"></i>Misi</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-heart-pulse me-2"></i>Menyediakan layanan kesehatan berkualitas dengan teknologi medis terkini</li>
                        <li class="list-group-item"><i class="bi bi-people me-2"></i>Memberikan pelayanan yang ramah, profesional, dan berpusat pada pasien</li>
                        <li class="list-group-item"><i class="bi bi-book me-2"></i>Mendukung pendidikan dan penelitian di bidang kesehatan bagi mahasiswa AMIKOM Purwokerto</li>
                        <li class="list-group-item"><i class="bi bi-globe me-2"></i>Berkontribusi pada peningkatan kesehatan masyarakat di sekitar kampus</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$content = ob_get_clean();
include 'template.php';
?>