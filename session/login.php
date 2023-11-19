<?php

include('connection/config.php');
include('connection/Database.php');

$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        echo "Email dan Password tidak boleh kosong.";
    } else {
        // Lakukan autentikasi dengan database
        $query = "SELECT * FROM user WHERE Email = '$email' AND Password = '$password'";

        // Eksekusi query menggunakan koneksi dari objek Database
        $result = mysqli_query($database->connection, $query);

        // Periksa apakah ada hasil
        if ($result && mysqli_num_rows($result) > 0) {
            // Autentikasi berhasil
            echo "Login berhasil! Selamat datang di REHOB!";
        } else {
            // Autentikasi gagal
            echo "Email atau Password tidak valid. Silakan coba lagi.";
        }
    }

}

?>