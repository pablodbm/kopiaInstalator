<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
$userId = mysqli_real_escape_string($link,$_GET["userId"]);

$getUsersTransactions = "SELECT * FROM ".$prefix."transactions WHERE userId=$userId";
$data = $link->query($getUsersTransactions);
$data = $data->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);