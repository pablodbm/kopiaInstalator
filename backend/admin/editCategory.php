<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";


$categoryId = mysqli_real_escape_string($link,$_GET["categoryId"]);
$name = mysqli_real_escape_string($link,$_GET["name"]);

$updateCategory = "UPDATE ".$prefix."categories SET name='$name' WHERE id=$categoryId";
$link->query($updateCategory);