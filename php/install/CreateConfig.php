<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $configPath = '../config/Config.php'; 
    if(filesize($configPath)){
        header("location:../../install.php");
        die();
        return;
    }

    $file = fopen($configPath, "w") or die("Unable to open config file");
    $txt = 
'<?php
    $host = "'.$_POST['host'].'";
    $user = "'.$_POST['user'].'";
    $password = "'.$_POST['password'].'";
    $dbname = "'.$_POST['dbname'].'";
    $prefix = "'.$_POST['prefix'].'_";
    
    // Create connection
    $link = new mysqli($host, $user, $password, $dbname);
    
    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
?>';

fwrite($file, $txt);
fclose($file);
header("location:../../install.php");
die();
?>