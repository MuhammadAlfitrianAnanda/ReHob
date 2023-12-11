<?php
include('../connection/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = sha1($password);

    // Pemeriksaan email
    $checkQuery = "SELECT * FROM user WHERE Email = '$email'";
    $result = $config->query($checkQuery);

    if ($result->num_rows > 0) {
        // Email sudah digunakan
        echo '<script>alert("Email sudah digunakan. Silakan gunakan email lain."); window.location.href = "../src/register.html";</script>';
    } else {
        // Email tersedia, lanjutkan dengan menyimpan data
        $insertQuery = "INSERT INTO user (Username, Email, Password) VALUES ('$username', '$email', '$password')";

        if ($config->query($insertQuery) === TRUE) {
            echo '<script>alert("Registrasi berhasil! Silakan login dengan akun baru Anda."); window.location.href = "../src/login.html";</script>';
        } else {
            echo '<script>alert("Registrasi gagal. Silakan coba lagi."); window.location.href = "../src/register.html";</script>';
        }
    }
} else {
    echo '<script>alert("Permintaan tidak valid."); window.location.href = "../src/register.html";</script>';
}
?>
