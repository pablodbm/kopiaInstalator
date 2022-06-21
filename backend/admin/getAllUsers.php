<?php

header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$getAllUsers = "SELECT id,login,name,surname,email,active,birthday,userType FROM ".$prefix."users";
$allUsers = $link->query($getAllUsers);
$allUsersFetched = $allUsers->fetch_all(MYSQLI_ASSOC);
echo json_encode($allUsersFetched);
?>
