<?php
include('../connection-capstone/database.php');
include('../connection-capstone/config.php');

$query = "SELECT * FROM detail";

$data = fetchDataFromDatabase();

foreach ($data as $item) {
    echo '<div class="home-card_item">';
    echo '<div class="card-hobby_item">';
    echo '<div class="hobby-icon"><strong>' . $item['icon'] . '</strong></div>';
    echo '<h5 class="hobby-title">';
    echo '<strong><a href="" data-bs-toggle="modal" data-bs-target="#detailModal">' . $item['title'] . '</a></strong>';
    echo '</h5>';
    echo '<p class="hobby-rating"><strong>⭐️ ' . $item['rating'] . '</strong></p>';
    echo '</div>';
    echo '</div>';
}
?>
