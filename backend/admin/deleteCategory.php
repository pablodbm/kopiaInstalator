<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$categoryId = mysqli_real_escape_string($link,$_GET["categoryId"]);

$deleteCategory = "DELETE FROM ".$prefix."categories WHERE id=$categoryId";
$link->query($deleteCategory);