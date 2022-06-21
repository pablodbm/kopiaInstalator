<?php
header('Access-Control-Allow-Origin: *');
require "./db_connect.php";

$login = mysqli_real_escape_string($link,$_GET["login"]);
$name = mysqli_real_escape_string($link,$_GET["name"]);
$surname = mysqli_real_escape_string($link,$_GET["surname"]);
$email = mysqli_real_escape_string($link,$_GET["email"]);
$password = mysqli_real_escape_string($link,$_GET["password"]);
if(strlen($login)!=0 && strlen($name)!=0 && strlen($surname)!=0 && strlen($email)!=0 && strlen($password)!=0){
    $password = md5($password);
$validateEmail = "SELECT * FROM ".$prefix."users WHERE email='$email'";
$validateLogin = "SELECT * FROM ".$prefix."users WHERE login='$login'";


$validateEmailResult = $link->query($validateEmail);
$validateLoginResult = $link->query($validateLogin);

$response = array();
if($validateEmailResult->num_rows==0 && $validateLoginResult->num_rows==0 ){
    $addUserToDb = "INSERT INTO ".$prefix."users (login,name,surname,email,password,userType) VALUES( '$login','$name','$surname','$email','$password','user')";
    $link->query($addUserToDb);
    $response["response"] = "correctRegister";
}else{
    $response["response"] = "incorrectRegister";
}
echo json_encode($response);
}else{
    $response = array("response"=>"wrongData");
    echo json_encode($response);
}
