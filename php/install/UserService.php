<?php
function readAllUsers(){
    require 'php/config/Config.php';
    
    $query = "SELECT id FROM ".$prefix."users;";

    $result = $link->query($query);
    $table = [];
    if ($result->num_rows == 0) {
    return $table;
    }
    while($row = $result->fetch_assoc()) {
    $table[] = $row;
    }
    return $table;
}
?>