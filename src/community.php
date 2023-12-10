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
        <div class="community-card_item">
            <div class="content-card_item">
                <h1 class="community-title_card"><strong>Nama User</strong></h1>
                <p class="community-story_card"><strong>story of experience</strong</p>
                <div class="community-tag_card"><strong>#tag</strong></div>
            </div>
        </div>
        <button class="add-icon">
            <a href="postIt.php"> <img class="image-icon" src="asset/add.png"/></a>
        </button>
    </main>
    <?php include "../session/footer.php"?>

</body>
</html>