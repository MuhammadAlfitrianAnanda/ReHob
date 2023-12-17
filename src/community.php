<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/logo-fix 1.png">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/community.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include "../session/header.php"?>
    <main>
        <?php
            include "../connection/config.php";
            // Mengambil data dari database
            $query = "SELECT komunitas.Chat, user.Username, hobi.Tagar
            FROM komunitas
            JOIN user ON user.ID_User = komunitas.ID_User
            JOIN hobi ON hobi.ID_Hobi = komunitas.ID_Hobi;";
            $result = mysqli_query($config, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nama = $row['Username'];
                    $chat = $row['Chat'];
                    $tagar = $row['Tagar'];
                    
                    // Menampilkan card dengan data dari database
                    echo ' <div class="community-card_item">';
                    echo ' <div class="content-card_item">';
                    echo '<h1 class="community-title_card"><strong>'.$nama.'</strong></h1>';
                    echo ' <p class="community-story_card"><strong>'.$chat.'</strong</p>';
                    echo ' <div class="community-tag_card"><strong>#'.$tagar.'</strong></div>';        
                    echo ' </div> </div>  ';   
                }
            } else {
                echo "No Post found.";
            }

            // Menutup koneksi database
            mysqli_close($config);
            ?>
        <button class="add-icon">
            <a href="postIt.php"> <img class="image-icon" src="asset/add.png"/></a>
        </button>
    </main>
    <?php include "../session/footer.php"?>

</body>
</html>