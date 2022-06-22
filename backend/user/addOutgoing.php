<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$title = mysqli_real_escape_string($link,$_GET["title"]);
$source = mysqli_real_escape_string($link,$_GET["source"]);
$category = mysqli_real_escape_string($link,$_GET["category"]);
$amount = mysqli_real_escape_string($link,$_GET["amount"]);
$date = mysqli_real_escape_string($link,$_GET["date"]);
$userId = mysqli_real_escape_string($link,$_GET["userId"]);
//z poziomu php dodajemy date wplywu oraz z sesji userid
// $date = date('Y-m-d H:i:s');
//  $userId = $_SESSION["userId"];
//$userId = 2;

//sprawdzenia przekroczenia limitu
$month = date("m");
$getTransactionsFromThisMonth = "SELECT SUM(amount) as total FROM ".$prefix."transactions WHERE MONTH(date) = $month AND userId=$userId AND type='outgoing'";
$transactions = $link->query($getTransactionsFromThisMonth);
$transactionsAssoc = $transactions->fetch_assoc();
$totalMontlyAmount = $transactionsAssoc["total"];

$selectWalletAmount = "SELECT ".$prefix."amount FROM wallets WHERE usersid=$userId";
$walletAmount = $mysqli->query($selectWalletAmount);
$walletAmount = $walletAmount->fetch_assoc();
$amount = $walletAmount["amount"];

if($amount>-10000){
//pobranie limitu portfela
$getUserLimit = "SELECT monthlyLimit FROM ".$prefix."wallets WHERE userId=$userId";
$limitResponse = $link->query($getUserLimit);
$userLimit = $limitResponse->fetch_assoc();
$limit = $userLimit["monthlyLimit"];

if($totalMontlyAmount+$amount<=$limit){
    // $addoutgoing = "INSERT INTO outgoings (title,source,category,type,amount,userId,date) VALUES ('$title','$source','$category','$type',$amount,$userId,'$date')";
$addoutgoing = "INSERT INTO ".$prefix."transactions (title,source,category,amount,userId,date,type) VALUES ('$title','$source','$category',$amount,$userId,'$date','outgoing')";
$updateWallet = "UPDATE ".$prefix."wallets SET amount=amount+$amount WHERE userId=$userId";
$link->query($addoutgoing);
$link->query($updateWallet);
$response = array("response"=>"outgoingAdd");
echo json_encode($response);
}else{
    $response = array("response"=>"monthlyLimit");
    echo json_encode($response);

}
}else{
    echo json_encode(array("response"=>"kredyt"));
}

?>