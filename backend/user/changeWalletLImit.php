<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$userId = $_SESSION["userId"];
$newLimit = mysqli_real_escape_string($link,$_GET["newLimit"]);
$updateWallet = "UPDATE ".$prefix."wallets SET monthlyLimit=$newLimit WHERE userId=$userId";
$link->query($userId);