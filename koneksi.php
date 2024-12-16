<?php
$koneksi = mysqli_connect("localhost", "root", "", "rs_amikomsehat_091", 3346);

if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>