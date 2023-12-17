<?php
    session_start();
    include "../connection/config.php";

    // Mengambil id_user berdasarkan email dari session
    $email = $_SESSION['email'];
    $queryUserId = "SELECT ID_User FROM user WHERE Email = ?";
    $stmtUserId = mysqli_prepare($config, $queryUserId);
    mysqli_stmt_bind_param($stmtUserId, "s", $email);
    mysqli_stmt_execute($stmtUserId);
    $resultUserId = mysqli_stmt_get_result($stmtUserId);

    if ($resultUserId) {
        $rowUserId = mysqli_fetch_assoc($resultUserId);
        $id_user = $rowUserId['ID_User'];
    } else {
        echo "Error getting user ID: " . mysqli_error($config);
    }

    // Mengambil data hobi
    if (isset($_GET['id'])) {
        $id_hobi = $_GET['id'];

        $queryCourse = "SELECT * FROM hobi WHERE ID_Hobi = ?";
        $stmtCourse = mysqli_prepare($config, $queryCourse);
        mysqli_stmt_bind_param($stmtCourse, "s", $id_hobi);
        mysqli_stmt_execute($stmtCourse);
        $resultHobby = mysqli_stmt_get_result($stmtCourse);

        if ($resultHobby) {
            while ($rowHobby = mysqli_fetch_assoc($resultHobby)) {
                $hobbyTitle = $rowHobby['Judul'];
                $hobbyDescription = $rowHobby['Deskripsi'];
                $hobbyPict = $rowHobby['Pict'];
            }
        } else {
            echo "Error executing query: " . mysqli_error($config);
        }
    }

    // Check if the user has liked the hobby
    $queryCheckLike = "SELECT * FROM likeshobi WHERE ID_Hobi = ? AND ID_User = ?";
    $stmtCheckLike = mysqli_prepare($config, $queryCheckLike);
    mysqli_stmt_bind_param($stmtCheckLike, "ss", $id_hobi, $id_user);
    mysqli_stmt_execute($stmtCheckLike);
    $resultCheckLike = mysqli_stmt_get_result($stmtCheckLike);
    $userLiked = mysqli_num_rows($resultCheckLike) > 0;

    mysqli_stmt_close($stmtCheckLike);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/logo-fix 1.png">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/detail.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
        /* CSS untuk checkbox dan button like */
        .like-checkbox {
            display: none;
        }

        .like-button {
            width: 50px;
            height: 50px;
            background-color: transparent;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .like-button img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
        }

        .like-checkbox:checked + .like-button {
            background-color: transparent;
        }

        .like-checkbox:checked + .like-button img {
            content: url('asset/after-like.png'); /* Memastikan gambar PNG transparan */
        }
    </style>
</head>

<body>
    <?php include "../session/header.php" ?>
    <main>
        <div class="detail-card_item">
            <img class='card-photo' src="../Asset/Gambar/<?php echo $hobbyPict; ?>" />
            <h1><b><?php echo $hobbyTitle; ?></b></h1>
            <div class="content-container">
                <p><?php echo $hobbyDescription; ?></p>
                <div class="content-container">
                    <form method="post">
                        <!-- Include hidden input for user ID -->
                        <input type="hidden" id="idUser" value="<?php echo $id_user; ?>">
                        <!-- Modify onchange function call -->
                        <input type="checkbox" id="likeCheckbox_<?php echo $id_hobi; ?>" class="like-checkbox" name="likeCheckbox" <?php echo $userLiked ? 'checked' : ''; ?>>
                        <label for="likeCheckbox_<?php echo $id_hobi; ?>" class="like-button">
                            <img src="asset/like.png" alt="Like Icon">
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include "../session/footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    var likeCheckbox = document.getElementById('likeCheckbox_<?php echo $id_hobi; ?>');

    likeCheckbox.addEventListener('change', function() {
        updateLikeStatus(<?php echo $id_hobi; ?>, <?php echo $id_user; ?>);
    });
});

function updateLikeStatus(id_hobi, id_user) {
    var likeCheckbox = document.getElementById('likeCheckbox_' + id_hobi);
    var isChecked = likeCheckbox.checked;

    var likeButton = document.querySelector('.like-button');

    if (isChecked) {
        likeButton.innerHTML = '<img src="asset/after-like.png" alt="After Like Icon">';
    } else {
        likeButton.innerHTML = '<img src="asset/like.png" alt="Like Icon">';
    }

    sendLikeDataToServer(id_hobi, id_user, isChecked); // Pass the isChecked value to the server
}

function sendLikeDataToServer(id_hobi, id_user, isChecked) {
    var url = '../session/update_like_status_code.php';
    var data = new FormData();
    data.append('id_hobi', id_hobi);
    data.append('id_user', id_user);
    data.append('isChecked', isChecked); // Add isChecked to the data

    fetch(url, {
        method: 'POST',
        body: data
    })
    .then(response => response.json())
    .then(data => {
        console.log('Data successfully sent to the server:', data);
    })
    .catch(error => {
        console.error('Failed to send data to the server:', error);
    });
}
    </script>
</body>

</html>
