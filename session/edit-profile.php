<?php
session_start();
include('../connection/config.php');

// Ambil email dari session sebelumnya
$emailFromSession = $_SESSION['email'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];


    // Hash the password
    $hashedPassword = sha1($password);
    // Pemeriksaan email
    $checkQuery = "SELECT * FROM user WHERE Username = '$username'";
    $result = $config->query($checkQuery);

    if ($result->num_rows > 0) {
        // Email sudah digunakan
        echo '<script>alert("Username sudah digunakan. Silakan gunakan username lain."); window.location.href = "../src/edit-profile.php";</script>';
    } else {
        if ($password == null) {
            $updateSql = "UPDATE user SET Username=? WHERE Email=?";
            $stmt = $config->prepare($updateSql);
            $stmt->bind_param("ss", $username, $emailFromSession);

            if ($stmt->execute()) {
                echo '<script>alert("Profile updated successfully!"); window.location.href = "../src/info-profile.php";</script>';
            } else {
                echo '<script>alert("Error updating profile."); window.location.href = "../src/edit-profile.php";</script>';
            }
        } else if ($username == null) {
            $updateSql = "UPDATE user SET Password=? WHERE Email=?";
            $stmt = $config->prepare($updateSql);
            $stmt->bind_param("ss", $hashedPassword, $emailFromSession);

            if ($stmt->execute()) {
                echo '<script>alert("Profile updated successfully!"); window.location.href = "../src/info-profile.php";</script>';
            } else {
                echo '<script>alert("Error updating profile."); window.location.href = "../src/edit-profile.php";</script>';
            }
        }  else {

            // Query to update user data in the database
            $updateSql = "UPDATE user SET Username=?, Password=? WHERE Email=?";
            $stmt = $config->prepare($updateSql);
            $stmt->bind_param("sss", $username, $hashedPassword, $emailFromSession);

            if ($stmt->execute()) {
                echo '<script>alert("Profile updated successfully!"); window.location.href = "../src/info-profile.php";</script>';
            } else {
                echo '<script>alert("Error updating profile."); window.location.href = "../src/edit-profile.php";</script>';
            }
        }
    }
    $stmt->close();
}
?>