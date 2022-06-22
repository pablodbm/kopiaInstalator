<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$title = mysqli_real_escape_string($link,$_GET["title"]);
$source = mysqli_real_escape_string($link,$_GET["source"]);
$category = mysqli_real_escape_string($link,$_GET["category"]);
$amount = mysqli_real_escape_string($link,$_GET["amount"]);

//Dwa dodatkowe do naprawy błędu
$date = mysqli_real_escape_string($link,$_GET["date"]);
$userId = mysqli_real_escape_string($link,$_GET["userId"]);

require "./reloadAmount.php";

$addIncome = "INSERT INTO ".$prefix."transactions (title,source,category,amount,userId,date,type) VALUES ('$title','$source','$category',$amount,$userId,'$date','income')";
$updateWallet = "UPDATE ".$prefix."wallets SET amount=amount+$amount WHERE userId=$userId";


$link->query($updateWallet);
$link->query($addIncome);
$response = array("response"=>"incomeAdd");
echo json_encode($response);
?>