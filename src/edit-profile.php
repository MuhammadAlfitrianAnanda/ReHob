<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./asset/logo-fix 1.png">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/edit-profile.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include "../session/header.php"?>
    <main>
        <form class="postIt-card_item">
            <div class="content-card_item">
                <h1 class="postIt-title_card"><strong>Your Profile</strong></h1>
                
                <form>
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" class="form-edit" id="username" placeholder="Username">
                    
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-edit" id="email" placeholder="email@gmail.com">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-edit" id="password" placeholder="xxxxx">

                    <label for="password" class="form-label">Make sure your password:</label>
                    <input type="password" name="password" class="form-edit" id="password" placeholder="xxxxx">
                </form>

                <div class="modal-footer">
                    <button type="submit" class="btn-save">Save</button>
                </div>
            </div>

        </form>
        
    </main>
    <?php include "../session/footer.php"?>
</body>
</html>