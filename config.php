<?php

$conn = mysqli_connect('localhost','root','','beneran');
if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>