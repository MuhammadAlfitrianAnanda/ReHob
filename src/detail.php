<?php session_start();?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Style untuk checkbox ketika tidak dicentang */
        .like-checkbox {
            display: none; /* Sembunyikan default checkbox */
        }

        /* Gaya label yang menggantikan tampilan checkbox */
        .like-button {
            width: 30px;
            height: 30px;
            background-color: #DC2F02; /* Warna latar merah ketika tidak dicentang */
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .like-button svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            width: 17px;
            height: 17px;
        }

        .like-checkbox:checked + .like-button {
            background-color:#DC2F02; /* Warna latar merah ketika dicentang */
        }

        .like-checkbox:checked + .like-button svg {
            fill: #ffffff; /* Warna putih ketika dicentang */
        }
    </style>
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
    <?php include "../session/header.php" ?>
    <main>
        <div class="detail-card_item">
            <img class='card-photo' src="../Asset/Gambar/<?php echo $hobbyPict; ?>" />
            <h1><b>
                    <?php echo $hobbyTitle; ?>
                </b></h1>
            <div class="content-container">
                <p>
                    <?php echo $hobbyDescription; ?>
                </p>
                <div class="content-container">
                    <input type="checkbox" id="likeCheckbox_<?php echo $id_hobi; ?>" class="like-checkbox"
                        onchange="updateLikeStatus(<?php echo $id_hobi; ?>)">
                    <label for="likeCheckbox_<?php echo $id_hobi; ?>" class="like-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.920 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>
                    </label>
                </div>
            </div>
        </div>
    </main>
    <?php include "../session/footer.php" ?>
    <script>
        function updateLikeStatus(id_hobi) {
            // Mendapatkan status checkbox
            var likeCheckbox = document.getElementById('likeCheckbox_' + id_hobi);
            var isChecked = likeCheckbox.checked;

            // Mengganti ikon berdasarkan status checkbox
            var likeButton = document.querySelector('.like-button');
            var heartIcon = likeButton.querySelector('svg');

            if (isChecked) {
                // Mengganti ikon menjadi hati terisi jika checkbox dicentang
                heartIcon.innerHTML = '<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>';
            } else {
                // Mengganti ikon menjadi hati kosong jika checkbox tidak dicentang
                heartIcon.innerHTML = '<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.920 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>';
            }

            // Kirim data ke server jika checkbox diubah
            if (isChecked) {
                sendLikeDataToServer(id_hobi);
            } else {
                // Tindakan lainnya jika checkbox tidak dicentang (jika diperlukan)
            }
        }

        function sendLikeDataToServer(id_hobi) {
            // Kirim data ke server, Anda dapat menggunakan AJAX atau metode pengiriman data lainnya
            var url = 'update_like_status.php';  // Gantilah dengan URL endpoint yang sesuai
            var data = {
                id_hobi: id_hobi,
                like_status: true  // Misalnya, Anda dapat mengirimkan status like sebagai true
            };

            // Implementasi AJAX untuk mengirim data ke server
            // $.ajax({
            //     type: 'POST',
            //     url: url,
            //     data: data,
            //     success: function(response) {
            //         console.log('Data berhasil dikirim ke server');
            //     },
            //     error: function(error) {
            //         console.error('Gagal mengirim data ke server:', error);
            //     }
            // });
        }
    </script>
</body>

</html>
