<?php
header('Access-Control-Allow-Origin: *');
require "./db_connect.php";
session_start();
$login = mysqli_real_escape_string($link,$_GET["login"]);
$password = mysqli_real_escape_string($link,$_GET["password"]);

if(strlen($login)!=0 && strlen($password)!=0){
$password = md5($password);

$checkCorrectLogin = "SELECT login,name,surname,email,active,id,userType FROM `".$prefix."users` WHERE password='$password' AND login='$login'";
$loginResult = $link->query($checkCorrectLogin);
echo $checkCorrectLogin;
$response = array();
if($loginResult->num_rows==0){
    //nie udalo sie zalogowac
    $response["response"] = "incorrectLogin";
}else{
    //udalo sie zalogowac
    $responseData = $loginResult->fetch_assoc();
    $_SESSION["userLogged"] = true;
    $_SESSION["userId"] = $responseData["id"];
    $response["response"] = $responseData;

}
echo json_encode($response);
}else{
    $response = array("response"=>"wrongData");
    echo json_encode($response);
}
?>