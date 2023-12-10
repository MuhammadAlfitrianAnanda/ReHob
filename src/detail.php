<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./asset/logo-fix 1.png">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/detail.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
    include "../connection/config.php";
   
    // Ambil id_hobi dari parameter GET
    if (isset($_GET['id'])) {
        $id_hobi = $_GET['id'];

        // Ambil data dari tabel hobi berdasarkan id_hobi
        $queryCourse = "SELECT * FROM hobi WHERE ID_Hobi = ?";
        $stmtCourse = mysqli_prepare($config, $queryCourse);
        mysqli_stmt_bind_param($stmtCourse, "s", $id_hobi);
        mysqli_stmt_execute($stmtCourse);
        $resultHobby = mysqli_stmt_get_result($stmtCourse);

        // Cek apakah query berhasil dijalankan
        if ($resultHobby) {
            // Loop untuk mengambil data hobi
            while ($rowHobby = mysqli_fetch_assoc($resultHobby)) {
                $hobbyTitle = $rowHobby['Judul'];
                $hobbyDescription = $rowHobby['Deskripsi'];
                $hobbyPict = $rowHobby['Pict'];
            }
        } else {
            echo "Error executing query: " . mysqli_error($config);
        }
    }
?>
<?php include "../session/header.php"?>
    <main>
        <div class="detail-card_item">
            <img class='card-photo' src="../Asset/Gambar/<?php echo $hobbyPict; ?>" />
            <h1><b><?php echo $hobbyTitle; ?></b></h1>
            <div class="content-container">
            <p><?php echo $hobbyDescription; ?></p>
            <img class='like-button' src="./asset/like.png"/>
            </div>
        </div>
    </main>
    <?php include "../session/footer.php"?>
    <script src="./view/toPostIt.js" type="module"></script>
</body>
</html>
