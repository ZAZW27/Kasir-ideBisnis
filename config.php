<?php 

$cons = mysqli_connect('localhost', 'root', '', 'market');
if (!$cons) {
    die("mysqli tidak dapat mengkoneksi".mysqli_connect_error());
}


?>