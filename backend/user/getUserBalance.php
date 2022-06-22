<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$userId = mysqli_real_escape_string($link,$_GET["userId"]);

$getAmount = "SELECT amount FROM ".$prefix."wallets WHERE userId=$userId";
$result = $link->query($getAmount);
$result = $result->fetch_assoc();
echo $result["amount"];