<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$title = mysqli_real_escape_string($link,$_GET["title"]);
$source = mysqli_real_escape_string($link,$_GET["source"]);
$category = mysqli_real_escape_string($link,$_GET["category"]);
// $type = mysqli_real_escape_string($link,$_GET["type"]);
$amount = mysqli_real_escape_string($link,$_GET["amount"]);
$date = mysqli_real_escape_string($link,$_GET["date"]);
//$userId = 2;
$userId = $_SESSION["userId"];
$updateIncome = "UPDATE ".$prefix."transactions SET title='$title',source='$source',category='$category',amount='$amount',date='$date' WHERE userId=$userId AND type='income'";
echo $updateIncome;
$link->query($updateIncome);
$response = array("response"=>"incomeChanged");
echo json_encode($response);
?>