<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();
//bez sesji - postman
// $userId = $_SESSION["userId"];
// $userId = 2;
$transactionId = mysqli_real_escape_string($link,$_GET["transactionId"]);
$userId = mysqli_real_escape_string($link,$_GET["userId"]);


require "../user/reloadAmount.php";

$deleteOutgoing = "DELETE FROM ".$prefix."transactions WHERE id=$transactionId";
$link->query($deleteOutgoing);
$response = array("response"=>"transactionDeleted");
echo json_encode($response);
?>