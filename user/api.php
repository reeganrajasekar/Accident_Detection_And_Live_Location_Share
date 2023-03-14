<?php

require("../admin/layout/db.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$id = $_SESSION["id"];
$lan=$_GET["lan"];
$lat=$_GET["lat"];

$sql="INSERT INTO list(uid,lan,lat) VALUE('$id','$lan','$lat')";
$conn->query($sql);

?>