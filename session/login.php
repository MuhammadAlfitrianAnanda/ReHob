<?php
include('../connection/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST['password'];
    $password = sha1($password);

    // Menghapus atau tidak menggunakan mysqli_close($config) di sini
    // Jangan menutup koneksi sebelum semua operasi database selesai

    $userSql = "SELECT * FROM user WHERE Email='$email' AND Password='$password'";
    $userQuery = mysqli_query($config, $userSql);

    // Cek apakah query berhasil dijalankan
    if ($userQuery) {
        // Cek apakah ada hasil dari query
        if (mysqli_num_rows($userQuery) > 0) {
            $userData = mysqli_fetch_array($userQuery);
            session_start();

            $_SESSION['email'] = $userData['email'];

            echo '<script>alert("Login berhasil! Selamat datang di REHOB!"); window.location.href = "../src/home.html";</script>';
        } else {
            echo "<script>alert('Email atau Password tidak valid. Silakan coba lagi.');</script>";
        }
    } else {
        echo "<script>alert('Error in query: " . mysqli_error($config) . "');</script>";
    }

    // Jangan menutup koneksi di sini
}
?>
