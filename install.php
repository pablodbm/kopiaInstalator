<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    function main(){ 
        $configFolder = 'php/config';
        $configName = 'Config.php';
        $configPath = $configFolder.'/'.$configName;
        if(!file_exists($configPath)){
            step(1);
            echo '<p>Stwórz plik '.code($configName).' w folderze '.code($configFolder).'
            <br>np. '.code('touch '.$configPath).'</p>'.PHP_EOL;
            buttonRefresh();
            return;
        }
        if(!is_writable($configPath)){
            step(1);
            echo '<p>Zmień uprawnienia do pliku '.$configName.' w folderze '.code($configFolder).'
            <br>np. '.code('chmod o+w '.$configPath).'</p>'.PHP_EOL;
            buttonRefresh();
            return;
        }
        if(!filesize($configPath)){
            step(2);
            include 'php/install/FormInstall.php';
            return;
        }
        require $configPath;
        $result = $link->query("SHOW TABLES LIKE '".$prefix."%'");
        if (!$result) {
            return;
        }
        if($result->num_rows < 4) {
            header("location:php/install/InitDb.php");
            die();
            return;
        }

        require 'php/install/UserService.php';
        if(count(readAllUsers())===0){
            step(3);
            include 'php/install/FormAdmin.php';
            return;
        }
        
        header("Location:../build/index.html");
    }

    function step($step){
        echo '<h1>Instalator krok '.$step.'/3</h1>';
    }

    function buttonRefresh(){
        echo "<button class='btn-install' onclick='window.location.href=window.location.href'>Refresh page</button>".PHP_EOL;
    }

    function code($string){
        return '<code>'.$string.'</code>';
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Budjet</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="text-center">
    <div class="install-container">
        <?php main();?>
    </div>
</body>