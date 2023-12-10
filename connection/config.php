<?php

// Informasi koneksi database
$host = "localhost";
$user = "root";
$password = "";
$database = "rehob";

// membuat koneksi
$config = mysqli_connect ($host, $user, $password, $database);

// memriksa koneksi
if(!$config){
    die("gagal terhubung dengan databse: ".mysqli_connect_error());
}


?>