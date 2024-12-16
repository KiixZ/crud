<?php
// koneksi database
include 'koneksi.php';
$username=$_GET['usernameAdmin'];
$sandi=$_GET['passwordAdmin'];
$data = mysqli_query($koneksi,"select usernameAdmin,passwordAdmin from tbAdmin
where usernameAdmin='$usernameAdmin' and passwordAdmin='$passwordAdmin'");
$row=mysqli_fetch_assoc($data);
if($username==$row['usernameAdmin'] && $psw==$row['passwordAdmin']){
header("Location: home.php");
}
else{
echo "Gagal Login";
}
?>