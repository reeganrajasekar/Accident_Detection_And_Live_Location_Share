<?php
require("./admin/layout/db.php");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$mob = $_POST["mob"];

$sql="INSERT INTO user(name,email,password,address,mobile) VALUE('$name','$email','$password','$address','$mob')";
$conn->query($sql);

header("Location: /?msg=Signup Successfully!");
die();
?>