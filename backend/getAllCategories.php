<?php

header('Access-Control-Allow-Origin: *');
require "./db_connect.php";

$getAllCategories = "SELECT * FROM ".$prefix."categories";
$allCategories = $link->query($getAllCategories);
$allCategories = $allCategories->fetch_all(MYSQLI_ASSOC);

echo json_encode($allCategories);

?>