<?php
// Include file konfigurasi database
include('/capstone/src/connection/config.php');
include('/capstone/src/connection/Database.php');

// Buat objek dari kelas Database
$database = new Database();

// Query SQL untuk melakukan JOIN antara tabel user dan hobi
$query = "SELECT user.Username, hobi.Judul, hobi.Deskripsi, hobi.Tagar 
          FROM user 
          JOIN hobi ON user.ID_User = hobi.ID_User";

// Eksekusi query menggunakan koneksi dari objek Database
$result = mysqli_query($database->connection, $query);

// Periksa apakah ada hasil
if ($result) {
    // Tampilkan data hasil JOIN
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="community-card_item">';
        echo '<div class="content-card_item">';
        echo '<h1 class="community-title_card"><strong>' . $row['Username'] . '</strong></h1>';
        echo '<p class="community-story_card"><strong>' . $row['Deskripsi'] . '</strong></p>';
        echo '<div class="community-tag_card"><strong>' . $row['Tagar'] . '</strong></div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Error in query: " . mysqli_error($database->connection);
}

// Tutup koneksi setelah selesai digunakan
mysqli_close($database->connection);
?>
