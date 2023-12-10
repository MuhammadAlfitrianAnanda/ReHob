<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_deskripsi";

$config = mysqli_connect($server, $username, $password, $database);

if (!$config) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Terhubung dengan sukses!";
}

?>
