<?php 
include '../../../config.php';

$id=$_POST['id'];
$nama=$_POST['nama'];
$kode=$_POST['kode'];
$expire=$_POST['expire'];
$jumlah=$_POST['jumlah'];
$satuan=$_POST['satuan'];
$harga=$_POST['harga'];

$input = mysqli_query($cons, "INSERT INTO tbl_barang (nama_barang, kode_barang, expired_date, jumlah_barang, satuan, harga_satuan)
VALUES ('$nama', '$kode', '$expire', '$jumlah', '$satuan', '$harga')");

if ($input) {
    // Mengambil waktu
    date_default_timezone_set('Asia/Ujung_pandang');
    $time = time();
    $date = date("Y-m-d H:i:s", $time);

    // mengambil id user
    $logging = mysqli_query($cons, "INSERT INTO tbl_log (waktu, aktivitas, id_user)
    VALUES ('$date', 'Masuk barang', '$id')");
    if ($logging) {
        echo"<script>alert('BERHASIL: $nama sudah dimasukkan!');window.location='../barang.php';</script>";
    }
    else {
        echo"<script>alert('GAGAL: memasukkan login');window.location='../barang.php';</script>";
    }
    
}else {
    echo"<script>alert('Gagal memasuki $nama');window.location='../barang.php';</script>";
}

?>