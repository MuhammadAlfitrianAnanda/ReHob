<?php
 include "../connection/config.php";
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_hobi = $_POST['id_hobi'];
    $id_user = $_POST['id_user'];
    $isChecked = $_POST['isChecked']; // Get isChecked value

    // Check if the user has already liked the hobby
    $queryCheckLike = "SELECT * FROM likeshobi WHERE ID_Hobi = ? AND ID_User = ?";
    $stmtCheckLike = mysqli_prepare($config, $queryCheckLike);
    mysqli_stmt_bind_param($stmtCheckLike, "ss", $id_hobi, $id_user);
    mysqli_stmt_execute($stmtCheckLike);
    $resultCheckLike = mysqli_stmt_get_result($stmtCheckLike);

    if (mysqli_num_rows($resultCheckLike) == 0 && $isChecked== true) {
        // If the user has not liked the hobby and isChecked is true, insert the like
        $queryInsertLike = "INSERT INTO likeshobi (ID_Hobi, ID_User) VALUES (?, ?)";
        $stmtInsertLike = mysqli_prepare($config, $queryInsertLike);
        mysqli_stmt_bind_param($stmtInsertLike, "ss", $id_hobi, $id_user);

        if (mysqli_stmt_execute($stmtInsertLike)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($config)]);
        }

        mysqli_stmt_close($stmtInsertLike);
    } else  {
        // If the user has already liked the hobby and isChecked is false, delete the like
        $queryDeleteLike = "DELETE FROM likeshobi WHERE ID_Hobi = ? AND ID_User = ?";
        $stmtDeleteLike = mysqli_prepare($config, $queryDeleteLike);
        mysqli_stmt_bind_param($stmtDeleteLike, "ss", $id_hobi, $id_user);

        if (mysqli_stmt_execute($stmtDeleteLike)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($config)]);
        }

        mysqli_stmt_close($stmtDeleteLike);
    } 

    mysqli_stmt_close($stmtCheckLike);
    mysqli_close($config);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>