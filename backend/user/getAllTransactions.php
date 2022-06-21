<?php
header('Access-Control-Allow-Origin: *');

session_start();
$userId = $_SESSION["userID"];
require "../db_connect.php";


$getAllTransaction = "SELECT * FROM ".$prefix."transactions WHERE userId=$userId ORDER BY date ASC";

$allTransactions = $link->query($getAllTransaction);

$allTransactions = $allTransactions->fetch_all(MYSQLI_ASSOC);

echo json_encode($allTransactions);

?>