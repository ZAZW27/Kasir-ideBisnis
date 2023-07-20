<?php 
include '../../../config.php';

$nama=$_POST['nama'];
$username=$_POST['username'];
$alamat=$_POST['alamat'];
$password=$_POST['password'];
$telp=$_POST['telp'];
$tipe=$_POST['tipe'];

$input = mysqli_query($cons, "INSERT INTO user (nama, username, alamat, password, telpon, tipe_user, profile_user)
VALUES ('$nama', '$username', '$alamat', '$password', '$telp', '$tipe', 'default.png')");

if ($input) {
    echo"<script>alert('BERHASIL: $nama sudah mengikuti perusahaan kita!');window.location='../karyawan.php';</script>";
}else {
    echo"<script>alert('Gagal memasuki $nama');window.location='../karyawan.php';</script>";
}

?>