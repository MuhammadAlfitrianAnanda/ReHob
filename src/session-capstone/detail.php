<?php
include('../src/conecction-capstone/database.php');
include('../src/conecction-capstone/config.php');

$query = "SELECT deskripsi.id_deskripsi, deskripsi.judul_deskripsi, deskripsi.text_deskripsi, komunitas.id_komunitas, komunitas.id_hobi, 
komunitas.chat, komunitas.likes FROM deskripsi JOIN komunitas ON deskripsi.id_hobi = komunitas.id_hobi";

$result = mysqli_query($connection, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="detail-card_item">';
        echo '<img class="card-photo" src="../Asset/Aset 2/Gambar/' . $row['id_deskripsi'] . '.jpg"/>';
        echo '<h1><b>' . $row['judul_deskripsi'] . '</b></h1>';
        echo '<div class="content-container">';
        echo '<p>' . $row['text_deskripsi'] . '</p>';\
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
