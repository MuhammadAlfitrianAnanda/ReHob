<?php

include('connection/config.php');
include('connection/Database.php');

$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($username) || empty($email) || empty($password)) {
        echo "Username, Email dan Password tidak boleh kosong.";
    } else {
        // Lakukan autentikasi dengan database
        $query = "INSERT INTO user (Username, Email, Password) VALUES ('$username', '$email', '$password')";

        // Eksekusi query menggunakan koneksi dari objek Database
        if (mysqli_query($database->connection, $query)) {
            echo "Registrasi berhasil! Silakan login dengan akun baru Anda.";
        } else {
            echo "Registrasi gagal. Silakan coba lagi.";
        }
    }

}

?>