<?php

include('../connection/config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $password = sha1($password);

 
    // Query untuk menyimpan data pengguna ke dalam tabel user
    $sql = "INSERT INTO user (Username, Email, Password) VALUES ('$username', '$email', '$password');";
    if ($config->query($sql) === TRUE) {
        echo '<script>alert("Registrasi berhasil! Silakan login dengan akun baru Anda."); window.location.href = "../src/login.html";</script>';
    } else {
        echo "<script>alert('Registrasi gagal. Silakan coba lagi.');</script>";
    }
  
}

?>