<?php
// Inisialisasi session (harus dilakukan di setiap halaman yang menggunakan session)
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman index.php
header("Location: ../index.php");
exit();
?>
