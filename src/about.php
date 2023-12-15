<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./asset/logo-fix 1.png">
    <title>ReHob</title>
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/about.css">
    <link rel="stylesheet" type="text/css" href="style/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
   
<?php include "../session/header.php"?>
    
    <main>
        <!-- alfi -->
        <div class="card-item">
            <div class="card-image" >
                <img  src="./asset/alfi.jpg" alt="profile image">
            </div>
            <p class="name">M. Alfitrian Ananda</p>
            <p>Universitas Lambung Mangkurat</p>
            <p>S247YA449</p>
            <div class="socials">
                <button class="github social-button" onclick="window.open('https:/github.com/MuhammadAlfitrianAnanda')">
                    <i class="fab fa-github"></i>
                </button>
                
                <button class="linkedin social-button" onclick="window.open('https:/www.linkedin.com/in/muhammad-alfitrian-ananda-670a62223/')">
                    <i class="fab fa-linkedin"></i>
                </button>
            </div>
        </div>

        <!-- ridho -->
        <div class="card-item">
            <div class="card-image" >
                <img  src="./asset/ridho.jpg" alt="profile image">
            </div>
            <p class="name">Ridho Mifdhahul Khoir</p>
            <p>Universitas Esa Unggul</p>
            <p>F204YB115</p>
            <div class="socials">
                <button class="github social-button" onclick="window.open('https:/github.com/Siridhoy')">
                    <i class="fab fa-github"></i>
                </button>
                
                <button class="linkedin social-button" onclick="window.open('https:/www.linkedin.com/in/ridho-mifdhahul-khoir-a24aa1183/')">
                    <i class="fab fa-linkedin"></i>
                </button>
            </div>
        </div>
        
        <!-- fatur -->
        <div class="card-item">
            <div class="card-image" >
                <img  src="./asset/fatur.jpg" alt="profile image">
            </div>
            <p class="name">Faturrahman</p>
            <p>Universitas Esa Unggul</p>
            <p>F204YB124</p>
            <div class="socials">
                <button class="github social-button" onclick="window.open('https:/github.com/Faturrahman232')">
                    <i class="fab fa-github"></i>
                </button>

                <button class="linkedin social-button" onclick="window.open('https:/www.linkedin.com/in/fatur-rahman-914069252/', '_blank')">
                    <i class="fab fa-linkedin"></i>
                </button>
            </div>
        </div>

        <!-- yusuf -->
        <div class="card-item">
            <div class="card-image" >
                <img  src="./asset/yusuf.jpg" alt="profile image">
            </div>
            <p class="name">Yusuf Indra Rabbani</p>
            <p>Universitas Amikom Purwokerto</p>
            <p>F182YB155</p>
            <div class="socials">
                <button class="github social-button" onclick="window.open('https:/github.com/Yusuf0803')">
                    <i class="fab fa-github"></i>
                </button>
                
                <button class="linkedin social-button" onclick="window.open('https:/www.linkedin.com/in/yusuf-indra-rabbani-33b2b8292/')">
                    <i class="fab fa-linkedin"></i>
                </button>
            </div>
        </div>

        <!-- miftah -->
        <div class="card-item">
            <div class="card-image" >
                <img  src="./asset/miftah.jpg" alt="profile image">
            </div>
            <p class="name">Miftah Fauzy </p>
            <p>Universitas Indonesia</p>
            <p>F010YB253</p>
            <div class="socials">
                <button class="github social-button" onclick="window.open('https:/github.com/Miftah130300')">
                    <i class="fab fa-github"></i>
                </button>

                <button class="linkedin social-button" onclick="window.open('https:/www.linkedin.com/in/miftahfauzy')">
                    <i class="fab fa-linkedin"></i>
                </button>
            </div>
        </div>
    </main>

    <?php include "../session/footer.php"?>

</body>
</html>