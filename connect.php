<?php
$servername = "localhost";
$username = "root";
$password = "";
header('Content-Type: text/html; charset=utf-8');
$conn = new mysqli($servername, $username, $password, "login-signup");
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
?>