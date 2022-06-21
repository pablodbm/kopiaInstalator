<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
$id = mysqli_real_escape_string($link,$_GET["id"]);
$title = mysqli_real_escape_string($link,$_GET["title"]);
$source = mysqli_real_escape_string($link,$_GET["source"]);
$category = mysqli_real_escape_string($link,$_GET["category"]);
$amount = mysqli_real_escape_string($link,$_GET["amount"]);
$userId = mysqli_real_escape_string($link,$_GET["userId"]);
$date = mysqli_real_escape_string($link,$_GET["date"]);
$type = mysqli_real_escape_string($link,$_GET["type"]);

$updateSingle = "UPDATE ".$prefix."transactions SET title='$title',source='$source',category='$category',amount=$amount,userId=$userId,date='$date',type='$type' WHERE id=$id";
$link->query($updateSingle);
$response = array("response"=>"updated");
echo json_encode($response);



?>