<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_deskripsi";

$koneksi = new mysqli($server, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT id_deskripsi, judul_deskripsi, text_deskripsi FROM detail";
$result = $koneksi->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id_deskripsi"];
        $judul = $row["judul_deskripsi"];
        $deskripsi = $row["text_deskripsi"];

        echo "ID: $id | Judul: $judul | Deskripsi: $deskripsi <br>";
    }
} else {
    echo "Error: " . $koneksi->error;
}

$koneksi->close();
?>