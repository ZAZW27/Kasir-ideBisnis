<?php 
include '../../../config.php';

$nama=$_POST['nama'];
$kode=$_POST['kode'];
$expire=$_POST['expire'];
$jumlah=$_POST['jumlah'];
$satuan=$_POST['satuan'];
$harga=$_POST['harga'];

$input = mysqli_query($cons, "INSERT INTO tbl_barang (nama_barang, kode_barang, expired_date, jumlah_barang, satuan, harga_satuan)
VALUES ('$nama', '$kode', '$expire', '$jumlah', '$satuan', '$harga')");

if ($input) {
    echo"<script>alert('BERHASIL: $nama sudah mengikuti perusahaan kita!');window.location='../barang.php';</script>";
}else {
    echo"<script>alert('Gagal memasuki $nama');window.location='../barang.php';</script>";
}

?>