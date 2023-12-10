<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/logo-fix 1.png">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/home.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include "../session/header.php"?>
    <main>
        <div class="home-card_item">
            <?php
            include "../connection/config.php";
            // Mengambil data dari database
            $query = "SELECT * FROM hobi";
            $result = mysqli_query($config, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['Judul'];
                    $icon = $row['Logo'];
                    $rating = $row['Rating'];
                    $id_hobi = $row['ID_Hobi'];
                    
                    // Menampilkan card dengan data dari database
                    echo ' <div class="card-hobby_item">';
                    echo '<img class="hobby-icon" src="../Asset/Icon/'. $icon .'" />';
                    echo ' <h5 class="hobby-title"><bold><a href="detail.php?id='.$id_hobi.'">'. $title .'</a></bold></h5>';
                    echo ' <p class="hobby-rating"><strong>⭐️'. $rating.'</strong></p>';
                    echo ' </div> ';        
                }
            } else {
                echo "No Hobbies found.";
            }

            // Menutup koneksi database
            mysqli_close($config);
            ?>
        </div>
    </main>
    <?php include "../session/footer.php"?>
</body>
</html>