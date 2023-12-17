<?php session_start();
include "../connection/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        echo json_encode(['status' => 'error', 'message' => 'Error getting user ID']);
        exit();
    }

    // Mengambil id_hobi berdasarkan tagar dari form
    $itagar = $_POST['hobbyTag'];
    $queryCourse = "SELECT ID_Hobi FROM hobi WHERE Tagar = ?";
    $stmtCourse = mysqli_prepare($config, $queryCourse);
    mysqli_stmt_bind_param($stmtCourse, "s", $itagar);
    mysqli_stmt_execute($stmtCourse);
    $resultHobby = mysqli_stmt_get_result($stmtCourse);

    if ($resultHobby) {
        $rowHobby = mysqli_fetch_assoc($resultHobby);
        $id_hobi = $rowHobby['ID_Hobi'];
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error getting hobby ID']);
        exit();
    }

    // Mengambil isi stories dari form
    $storiesInput = $_POST['storiesInput'];

    // Simpan data ke dalam database
    $queryInsertPost = "INSERT INTO komunitas (ID_User, ID_Hobi, Chat) VALUES (?, ?, ?)";
    $stmtInsertPost = mysqli_prepare($config, $queryInsertPost);
    mysqli_stmt_bind_param($stmtInsertPost, "sss", $id_user, $id_hobi, $storiesInput);

    if (mysqli_stmt_execute($stmtInsertPost)) {
        echo json_encode(['status' => 'success', 'message' => 'Post added successfully']);
        echo '<script>alert("Post added successfully!"); window.location.href = "../src/community.php";</script>';
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($config)]);
        echo '<script>window.location.href ="../src/community.php";</script>';
    }

    mysqli_stmt_close($stmtInsertPost);
    mysqli_close($config);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    echo '<script>window.location.href ="../src/community.php";</script>';
  
}
?>
