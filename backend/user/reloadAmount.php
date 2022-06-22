<?php

$allUserTransactions = "SELECT amount,type FROM ".$prefix."transactions WHERE userId=$userId";
$data = $link->query($allUserTransactions);
$newAmount = 0;
while($row = $data->fetch_assoc()){
    $newAmount+=$row["type"]=="income"?$row["amount"]:-$row["amount"];
}


$link->query("UPDATE ".$prefix."wallets SET amount=$newAmount WHERE userId=$userId");

?>