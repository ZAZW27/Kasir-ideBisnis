<?php 
SESSION_START();
include '../../../config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$check_list = mysqli_query($cons, "SELECT * FROM user WHERE username='$username' AND password='$password'");

$cek_exist = mysqli_num_rows($check_list);

$data = mysqli_fetch_array($check_list);

if ($cek_exist > 0) {
    // Mengambil waktu
    date_default_timezone_set('Asia/Ujung_pandang');
    $time = time();
    $date = date("Y-m-d H:i:s", $time);

    // mengambil id user
    $id=$data['id_user'];
    $logging = mysqli_query($cons, "INSERT INTO tbl_log (waktu, aktivitas, id_user)
    VALUES ('$date', 'Log in', '$id')");
    
    if ($logging) {
        if ($data['tipe_user'] == 'admin') {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $data['password'];
            $_SESSION['tipe_user'] = 'admin';
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['alamat'] = $data['alamat'];
            $_SESSION['telpon'] = $data['telpon'];
            $_SESSION['profile_user'] = $data['profile_user'];
            header("location:../../../index.php");
        }
        if ($data['tipe_user'] == 'kasir') {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $data['password'];
            $_SESSION['tipe_user'] = 'kasir';
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['alamat'] = $data['alamat'];
            $_SESSION['telpon'] = $data['telpon'];
            $_SESSION['profile_user'] = $data['profile_user'];
            header("location:../../../index.php");
        }
        if ($data['tipe_user'] == 'gudang') {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $data['password'];
            $_SESSION['tipe_user'] = 'gudang';
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['alamat'] = $data['alamat'];
            $_SESSION['telpon'] = $data['telpon'];
            $_SESSION['profile_user'] = $data['profile_user'];
            header("location:../../../index.php");
        }
    }
    else {
        header("location:../login.php?pesan=log_gagal");
    }
}else {
    header("location:../login.php?pesan=gagal");
}

?>