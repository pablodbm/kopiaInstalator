<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$login = mysqli_real_escape_string($link,$_GET["login"]);
$name = mysqli_real_escape_string($link,$_GET["name"]);
$surname = mysqli_real_escape_string($link,$_GET["surname"]);
$email = mysqli_real_escape_string($link,$_GET["email"]);
$active = mysqli_real_escape_string($link,$_GET["active"]);
$userType = mysqli_real_escape_string($link,$_GET["userType"]);
$userId = mysqli_real_escape_string($link,$_GET["userId"]);
if(strlen($login)!=0){
$updateUserData = "UPDATE ".$prefix."users SET login='$login',name='$name',surname='$surname',email='$email',active=$active,userType='$userType' WHERE id=$userId";
$link->query($updateUserData);
echo $updateUserData;
$responseArray = array("response"=>"dateChanged");
echo json_encode($responseArray);
}else{
    $responseArray = array("response"=>"loginEmpty");
    echo json_encode($responseArray);
}