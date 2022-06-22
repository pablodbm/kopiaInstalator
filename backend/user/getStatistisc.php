<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();
$userId = $_SESSION["userId"];
$currentMonth = date("m");
$previous_month = date("m")-1;
$theLatest_month = date("m")-2;
//$userId = 2;

$getoutgoingsFromThisMonth = "SELECT SUM(amount) as total FROM `".$prefix."transactions` WHERE MONTH(date) = '$currentMonth' AND userId=$userId AND type='outgoing'";
$getoutgoingsFromPreviousMonth = "SELECT SUM(amount) as total FROM `".$prefix."transactions` WHERE MONTH(date) = '$previous_month' AND userId=$userId AND type='outgoing'";
$getoutgoingsFromPTheLatest = "SELECT SUM(amount) as total FROM `".$prefix."transactions` WHERE MONTH(date) = '$theLatest_month' AND userId=$userId AND type='outgoing'";

$getIncomesFromThisMonth = "SELECT SUM(amount) as total FROM `".$prefix."transactions` WHERE MONTH(date) = '$currentMonth' AND userId=$userId AND type='income'";
$getIncomesFromPreviousMonth = "SELECT SUM(amount) as total FROM `".$prefix."transactions` WHERE MONTH(date) = '$previous_month' AND userId=$userId AND type='income'";
$getIncomesFromTheLatest = "SELECT SUM(amount) as total FROM `".$prefix."transactions` WHERE MONTH(date) = '$theLatest_month' AND userId=$userId AND type='income'";

$OutThisMonth = $link->query($getoutgoingsFromThisMonth);
$OutPrev = $link->query($getoutgoingsFromPreviousMonth);
$OutLatest = $link->query($getoutgoingsFromPTheLatest);

$IncThisMonth = $link->query($getIncomesFromThisMonth);
$IncPrev = $link->query($getIncomesFromPreviousMonth);
$IncLatest = $link->query($getIncomesFromTheLatest);

$OutThisMonth = $OutThisMonth->fetch_assoc();
$OutPrev = $OutPrev->fetch_assoc();
$OutLatest = $OutLatest->fetch_assoc();

$IncThisMonth = $IncThisMonth->fetch_assoc();
$IncPrev = $IncPrev->fetch_assoc();
$IncLatest = $IncLatest->fetch_assoc();

$responseData = array();

$responseData["outgoings"] = array("This"=>$OutThisMonth["total"],"Previous"=>$OutPrev["total"],"Latest"=>$OutLatest["total"]);
$responseData["incomes"] = array("This"=>$IncThisMonth["total"],"Previous"=>$IncPrev["total"],"Latest"=>$IncLatest["total"]);

$sumOfOutgoings = $OutThisMonth["total"] + $OutPrev["total"] +$OutLatest["total"];
$sumOfIncomes = $IncThisMonth["total"]+$IncPrev["total"]+$IncLatest["total"];
$responseData["ballance"] = $sumOfIncomes-$sumOfOutgoings;

echo json_encode($responseData);
