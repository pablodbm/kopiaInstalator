<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";


$userId = mysqli_real_escape_string($link, $_GET["userId"]);

$deleteUser= "DELETE FROM ".$prefix."users WHERE id=$userId";
$link->query($deleteUser);