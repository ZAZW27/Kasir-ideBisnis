<?php 
include '../../../config.php';

$id = $_GET['id'];

$query = mysqli_query($cons, "DELETE FROM user WHERE id_user='$id'");

if ($query) {
    echo"<script>alert('BERHASIL MENGELUARKAN');window.location='../table.php';</script>";
}
else {
    echo"<script>alert('GAGAL MENGELUARKAN');window.location='../table.php';</script>";
}
?>