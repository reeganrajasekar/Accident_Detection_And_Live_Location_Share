<?php
$servername = "localhost";
$username = "accident";
$password = "trysomething";
$db_name = "accident";
$conn = new mysqli($servername, $username, $password,$db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>