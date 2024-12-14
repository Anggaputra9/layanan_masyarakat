<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "layanan_masyarakat";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if (!$koneksi){
    die ("tidak terkoneksi");
}

?>