<?php
include('../connection/config.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Query untuk mendapatkan data user berdasarkan email
    $userSql = "SELECT * FROM user WHERE Email='$email'";
    $userQuery = mysqli_query($config, $userSql);

    // Cek apakah query berhasil dijalankan
    if ($userQuery) {
        // Cek apakah ada hasil dari query
        if (mysqli_num_rows($userQuery) > 0) {
            $userData = mysqli_fetch_array($userQuery);
            $username = $userData['Username'];
        }
    } else {
        echo "Error in query: " . mysqli_error($config);
    }
} else {
    // Redirect ke halaman login jika tidak ada sesi login
    header("Location:../src/login.html");
    exit();
}
?>
<header>
    <nav class="navbar" data-bs-theme="dark">
        <!-- Navbar content -->
        <div class="app-bar__menu">
            <button id="hamburgerButton">☰</button>
        </div>
        <div class="nav-logo">
            <a href="home.php">
                <img src="asset/logo-fix 1.png" aria-placeholder="logo ReHob"/>
            </a>
            <h1>Rekomendasi Hobi</h1>
        </div>
        <ul class="nav-item-container">
            <li class="nav-item"><a href="home.php"><strong>Home</strong></a></li>
            <li class="nav-item"><a href="community.php"><strong>Community</strong></a></li>
            <li class="nav-item"><a href="info-profile.php"><strong>Profile</strong></a></li>                         
        </ul>
    </nav>
</header>
