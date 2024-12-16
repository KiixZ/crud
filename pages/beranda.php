<?php
$title = "BERANDA";
ob_start();
?>

<div class="jumbotron">
    <h1 class="display-4">Selamat Datang di AMIKOM PURWOKERTO HOSPITAL</h1>
    <p class="lead">Rumah Sakit terbaik di purwokerto.</p>
    <hr class="my-4">
    <p>Temukan dokter terbaik di dunia dengan biaya rumah sakit yang terjangkau.</p>
</div>

<?php
$content = ob_get_clean();
include 'template.php';
?>

