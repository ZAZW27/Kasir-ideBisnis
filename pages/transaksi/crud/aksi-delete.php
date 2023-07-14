<?php 
include '../../../config.php';

$id = $_GET['id'];

$query = mysqli_query($cons, "DELETE FROM barang WHERE id_barang='$id'");

if ($query) {
    echo"<script>alert('BERHASIL MENGELUARKAN');window.location='../barang.php';</script>";
}
else {
    echo"<script>alert('GAGAL MENGELUARKAN');window.location='../barang.php';</script>";
}
?>