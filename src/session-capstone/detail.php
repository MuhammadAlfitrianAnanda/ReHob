<?php
include('../conecction-capstone/database.php');
include('../conecction-capstone/config.php');

$query = "SELECT * FROM detail";

$result = mysqli_query($connection, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="detail-card_item">';
        echo '<img class="card-photo" src="../Asset/Aset 2/Gambar/' . $row['id_deskripsi'] . '.jpg"/>';
        echo '<h1><b>' . $row['judul_deskripsi'] . '</b></h1>';
        echo '<div class="content-container">';
        echo '<p>' . $row['text_deskripsi'] . '</p>';
        echo '<img class="like-button" src="./asset/like.png"/>';
        echo '</div>';
        echo '</div>';
    }

    mysqli_free_result($result);
} else {
    echo 'Error: ' . mysqli_error($connection);
}

mysqli_close($connection);
?>
