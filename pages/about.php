<?php
$title = "TENTANG";
ob_start();
?>

<div class="card">
    <div<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tentang AMIKOM PURWOKERTO MART</h5>
        <p class="card-text">AMIKOM PURWOKERTO MART adalah sebuah toko retail yang menyediakan berbagai kebutuhan sehari-hari untuk mahasiswa dan masyarakat sekitar kampus AMIKOM Purwokerto.</p>
        <p class="card-text">Didirikan pada tahun 2020, toko kami berkomitmen untuk menyediakan produk berkualitas dengan harga yang terjangkau. Kami juga berusaha untuk selalu memberikan pelayanan terbaik kepada setiap pelanggan.</p>
        <h6 class="mt-4">Visi</h6>
        <p class="card-text">Menjadi toko retail terpercaya dan terdepan di lingkungan kampus AMIKOM Purwokerto.</p>
        <h6 class="mt-4">Misi</h6>
        <ul>
            <li>Menyediakan produk berkualitas dengan harga yang kompetitif</li>
            <li>Memberikan pelayanan yang ramah dan profesional</li>
            <li>Mendukung kegiatan akademik dan non-akademik mahasiswa AMIKOM Purwokerto</li>
        </ul>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'template.php';
?>

