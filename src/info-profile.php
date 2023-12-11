<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/logo-fix 1.png">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/info-profile.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include "../session/header.php"?>
   
<main>
        <div class="postIt-card_item">
            <div class="content-card_item">
                <h1 class="postIt-title_card"><strong>Your Profile</strong></h1>
                
                <div>
                    <label for="username" class="form-label">Username:</label>
                    <div class="form-edit" id="username"><?php echo $username; ?></div>
                    
                    <label for="email" class="form-label">Email:</label>
                    <div class="form-edit" id="email"><?php echo $email; ?></div>
                </div>

                <div class="modal-footer">
                    <a href="../session/logout.php" class="btn-save" id="logout-btn">Log Out</a>
                    <a href="edit-profile.php" class="btn-save" id="edit-btn">Edit Profile</a>
                </div>
            </div>
        </div>
    </main>
    <?php include "../session/footer.php"?>
</body>
</html>