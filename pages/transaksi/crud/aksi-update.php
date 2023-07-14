<?php 
include '../../../config.php';

$id=$_POST['id'];
$nama=$_POST['nama'];
$jumlah=$_POST['jumlah'];
$satuan=$_POST['satuan'];
$kode=$_POST['kode'];
$expire=$_POST['expire'];
$harga=$_POST['harga'];



$update = mysqli_query($cons, "UPDATE tbl_barang SET nama_barang='$nama', jumlah_barang='$jumlah', satuan='$satuan', 
kode_barang='$kode', expired_date='$expire', harga_satuan='$harga' WHERE id_barang='$id'");
if ($update) {
    echo"<script>alert('BERHASIL: mengupdate!');window.location='../barang.php';</script>";
}else {
    echo"<script>alert('GAGAL: mengupdate');window.location='../barang.php';</script>";
}


?>