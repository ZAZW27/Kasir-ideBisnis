<?php 
include '../../../config.php';

$id_user=$_POST['id'];

// $count_id_barang = count($id_barang);

if (isset($_POST['id_barang'], $_POST['quantity_barang'])) {
    $no_trans = rand(1000, 10000);
    $id_barang=$_POST['id_barang'];
    $quantitas=$_POST['quantity_barang'];

    while (true) {
        $query = mysqli_query($cons, "SELECT COUNT(id_transaksi) AS 'dupe' FROM tbl_transaksi WHERE no_transaksi='$no_trans'");
        $data = mysqli_fetch_array($query);
    
        if ($data['dupe'] > 0) {
            $no_trans = rand(1000, 10000);
        }else{
            break;
        }
    }
    
    
    $j = 0;
    
    date_default_timezone_set('Asia/Jakarta');
    $time = time();
    $date = date('Y-m-d H:i:s', $time);
    
    foreach ($id_barang as $i => $v) {
        $query = mysqli_query($cons, "SELECT * FROM tbl_barang WHERE id_barang='$v'");
        $data = mysqli_fetch_array($query);
    
        // mengambil barang barang yang tidak ada di sql 
        $total_harga = $data['harga_satuan'] * $quantitas[$j];
        $jumlah_barang = $quantitas[$j];
    
        $input = mysqli_query($cons, "INSERT INTO tbl_transaksi (no_transaksi, tgl_transaksi, total_bayar, id_user, id_barang, kuantitas)
        VALUES ('$no_trans', '$date', '$total_harga', '$id_user', '$v', '$jumlah_barang')");
    
        $j += 1;
    
        if ($input) {
            $hasil_pengurangan_barang = $data['jumlah_barang'] - $jumlah_barang;
            $update_quantity = mysqli_query($cons, "UPDATE tbl_barang SET jumlah_barang='$hasil_pengurangan_barang' WHERE id_barang='$v'");
            
            if ($update_quantity) {
                echo"<script>alert('BERHASIL: Meregister barang!');window.location='../transaksi.php';</script>";
            }
            else {
                echo"<script>alert('GAGAL: mengupdate substraksi barang!');window.location='../transaksi.php';</script>";
            }
        }
        else {
            echo"<script>alert('GAGAL: Tidak dapat menjual barang!');window.location='../transaksi.php';</script>";
        }
    
    }    
}
else {
    echo"<script>alert('GAGAL: Tidak ada barang yang dimasuki!');window.location='../transaksi.php';</script>";
}


// $query = mysqli_query($cons, "SELECT * FROM tbl_barang WHERE nama_barang='$barang'");
// $g = mysqli_fetch_array($query);
// // getting all of the sufficient information from barang table
// $id_barang = $g['id_barang'];
// // mengambil tanggal dan hari
// date_default_timezone_set('Asia/Jakarta');
// $time = time();
// $date = date('Y-m-d H:i:s', $time);

// // getting random number for no_transaksi
// $no_trans = rand(1000, 10000);

// //multiply between barang price and the quantity
// $harga_satuan = $g['harga_satuan'];
// $total_harga = $harga_satuan * $kuantitas;
// //Substract the remaining amount of items and update it
// $hasil_pengurangan_barang = $g['jumlah_barang'] - $kuantitas;
// $update_quantity = mysqli_query($cons, "UPDATE tbl_barang SET jumlah_barang='$hasil_pengurangan_barang' WHERE id_barang='$id_barang'");

// $input = mysqli_query($cons, "INSERT INTO tbl_transaksi (no_transaksi, tgl_transaksi, total_bayar, id_user, id_barang, kuantitas)
// VALUES ('$no_trans', '$date', '$total_harga', '$id_user', '$id_barang', '$kuantitas')");

// if ($input) {
//     echo"<script>alert('BERHASIL: sudah mengikuti perusahaan kita!');window.location='../transaksi.php';</script>";
// }else {
//     echo"<script>alert('Gagal memasuki');window.location='../transaksi.php';</script>";
// }

?>