<?php
    $host = "localhost";
    $user = "pawel";
    $password = "haslo";
    $dbname = "budjet";
    $prefix = "pre__";
    
    // Create connection
    $link = new mysqli($host, $user, $password, $dbname);
    
    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
?>