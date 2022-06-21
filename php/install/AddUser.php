<?php
    require_once '../config/Config.php';


    if($dev){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    function addUser($name, $surname, $login, $email, $pass){
        require '../config/Config.php';
        $query="INSERT INTO ".$prefix."users (name, surname, login, password, userType, email, active) VALUES ('".$name."', '".$surname."', '".$login."',MD5('".$pass."'),'admin','".$email."',1)";


        if($link->query($query) == false){
            return;
        }
        return true;
    }
        $name=$_POST["name"];
        $surname=$_POST["surname"];
        $login=$_POST["login"];
        $email=$_POST["email"];
        $password=$_POST["password"];

    $success = addUser($name, $surname, $login, $email, $password);
    if(!$success){
        echo '<p>Unexpected error occured</p>';
        return;
    }
    echo '<script> alert("Zapisano uzytkownika");</script>';
    header("Location:../../build/index.html");
    die();
    ?>