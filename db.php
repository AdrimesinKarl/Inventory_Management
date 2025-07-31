<?php
$servername = "localhost";
$username = "admin";
$password = "12345";

try {
$conn = new PDO("mysql:host=$servername;dbname=blog_db;charset=utf8mb4", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
?>
