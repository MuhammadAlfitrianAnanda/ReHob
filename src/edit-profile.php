<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/edit-profile.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <?php include "../session/header.php"; ?>
    <main>
        <form class="postIt-card_item" id="editProfileForm" action="../session/edit-profile.php" method="post">
            <div class="content-card_item">
                <h1 class="postIt-title_card"><strong>Your Profile</strong></h1>
                
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-edit" id="username" placeholder="Username" required>
                <div id="username-error" class="text-danger"></div>

                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-edit" id="email" placeholder="<?php echo $email ?>" readonly>

                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-edit" id="password" placeholder="xxxx">

                <label for="confirm_password" class="form-label">Make sure your password:</label>
                <input type="password" name="confirm_password" class="form-edit" id="confirm_password" placeholder="xxxxx">
                <p id="passwordError" style="color: red;"></p>

                <div class="modal-footer">
                    <a href="info-profile.php" class="btn-save" id="logout-btn">Back</a>
                    <button type="button" class="btn-save" id="saveButton">Save</button>
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function() {
                $('#username').blur(function() {
                    var username = $(this).val();
                    // Kirim permintaan Ajax untuk memeriksa username
                    $.ajax({
                        url: '../session/check_username.php',
                        type: 'POST',
                        data: {username: username},
                        success: function(response){
                            if(response == 'not_available'){
                                $('#username-error').html('<span class="text-danger">Username sudah digunakan.</span>');
                            } else if(response == 'available'){
                                $('#username-error').html('<span class="text-success">Username tersedia.</span>');
                            }
                        }
                    });
                });

                // Validasi formulir sebelum pengiriman
                $('#saveButton').click(function() {
                    var password = $('#password').val();
                    var confirmPassword = $('#confirm_password').val();

                    // Periksa kesamaan password
                    if (password !== confirmPassword) {
                        $('#passwordError').html('Passwords do not match');
                    } else {
                        // Hapus pesan kesalahan jika password sesuai
                        $('#passwordError').html('');
                        // Submit formulir jika semua validasi berhasil
                        $('#editProfileForm').submit();
                    }
                });
            });
        </script>
    </main>
    <?php include "../session/footer.php"; ?>
</body>
</html>
