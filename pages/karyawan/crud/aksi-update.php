<?php 
include '../../../config.php';

$id=$_POST['id'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$alamat=$_POST['alamat'];
$password=$_POST['password'];
$telp=$_POST['telp'];
$tipe=$_POST['tipe'];



$update = mysqli_query($cons, "UPDATE user SET nama='$nama', username='$username', alamat='$alamat', 
password='$password', telpon='$telp', tipe_user='$tipe' WHERE id_user='$id'");
if ($update) {
    echo"<script>alert('BERHASIL: mengupdate!');window.location='../karyawan.php';</script>";
}
else {
    echo"<script>alert('GAGAL: mengupdate');window.location='../karyawan.php';</script>";
}


?>