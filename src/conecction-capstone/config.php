<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "db_deskripsi";

$config = mysqli_connect ($host, $user, $password, $database);

if(!$config){
    die("gagal terhubung dengan databse: ".mysqli_connect_error());
}

mysqli_close($config);
?>