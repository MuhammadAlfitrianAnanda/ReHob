<?php
include('../connection/config.php');

if(isset($_POST['username'])){
    $username = $_POST['username'];

    // Query untuk memeriksa ketersediaan username di database
    $sql = "SELECT * FROM user WHERE Username = '$username'";
    $result = $config->query($sql);

    if($result->num_rows > 0){
        echo 'not_available'; // username sudah digunakan
    } else {
        echo 'available'; // username tersedia
    }
}
?>
