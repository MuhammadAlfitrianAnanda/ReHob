<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/logo-fix 1.png">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/postIt.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include "../session/header.php"?>
    <main>
    <form class="postIt-card_item" action="../session/post.php" method="post">
            <div class="content-card_item">
                <h1 class="postIt-title_card"><strong>Post It</strong></h1>
                
                <label for="storiesInput" class="visually-hidden">storiesInput</label>
                <textarea id="storiesInput" class="postIt-story_card" name="storiesInput" rows="4" cols="50" placeholder="Share your stories here..."></textarea>
                
                <label for="hobbyTag" class="hobby-tag">Tag Your Hobby</label>
                <select id="hobbyTag" class="postIt-tag_card" name="hobbyTag" placeholder="Tag Your Hobby">
                    <option value="none">none</option>
                    <?php
                      include('../connection/config.php');
                        // Fetch data from the "hobi" table
                        $sql = "SELECT * FROM hobi";
                        $result = mysqli_query($config, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $tagar= $row['Tagar']; // Get the "id" column value
                                echo '<option value="'.$tagar.'">'. $tagar.'</option>';
                            }
                        }
                        ?>
                </select>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-post">Post</button>
            </div>
        </form>
        
    </main>
    <?php include "../session/footer.php"?>
</body>
</html>