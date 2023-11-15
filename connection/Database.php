<?php
// File: Database.php
class Database
{
private $host = "localhost";
private $username = "root";
private $password = "";
private $database = "rehob";

protected $connection;

public function __construct()
{
$this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);

if (!$this->connection) {
die("Database Connection Error: " . mysqli_connect_error());
}
}
}

?>