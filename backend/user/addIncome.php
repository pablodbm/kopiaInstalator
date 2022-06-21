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
// $userId = $_SESSION["userId"];
//z poziomu php dodajemy date wplywu oraz z sesji userid
// TEST -> $date = date('Y-m-d H:i:s');
// TEST -> $userId = $_SESSION["userId"];
//$userId = 2;
// $addIncome = "INSERT INTO incomes (title,source,category,type,amount,userId,date) VALUES ('$title','$source','$category','$type',$amount,$userId,'$date')";
$addIncome = "INSERT INTO ".$prefix."transactions (title,source,category,amount,userId,date,type) VALUES ('$title','$source','$category',$amount,$userId,'$date','income')";
$updateWallet = "UPDATE ".$prefix."wallets SET amount=amount+$amount WHERE userId=$userId";
$link->query($updateWallet);
$link->query($addIncome);
$response = array("response"=>"incomeAdd");
echo json_encode($response);
?>