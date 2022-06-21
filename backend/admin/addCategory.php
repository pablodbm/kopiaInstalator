<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$newCategory = mysqli_real_escape_string($link,$_GET["name"]);

$addCategory = "INSERT INTO ".$prefix."categories (name) VALUES ('$newCategory')";
$link->query($addCategory);

?>