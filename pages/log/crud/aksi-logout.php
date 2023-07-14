<?php 
include '../../../config.php';

session_start();
$_SESSION = [];
session_unset();
session_destroy();

$id = $_GET['id'];

date_default_timezone_set('Asia/Ujung_pandang');
$time = time();
$date = date("Y-m-d H:i:s", $time);

$logging = mysqli_query($cons, "INSERT INTO tbl_log (waktu, aktivitas, id_user)
VALUES ('$date', 'Log out', '$id')");

header("location:../login.php");
?>