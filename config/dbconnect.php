<?php

$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "login";

$koneksi = mysqli_connect($host_db,$user_db,$pass_db,$nama_db);

if(!$koneksi) {
    die("Connection Failed:".mysqli_connect_error());
}

?>