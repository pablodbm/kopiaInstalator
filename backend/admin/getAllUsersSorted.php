<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$usersSorted = "SELECT id,login,name,surname,email,active,userType FROM ".$prefix."users ORDER BY active DESC";
$data = $link->query($usersSorted);
$data = $data->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);