<?php
    require '../config/Config.php';
    $result = $link->query("SHOW TABLES LIKE '".$prefix."%'");
    if (!$result) {
        return;
    }
    if($result->num_rows >= 4) {
        header("location:../../install.php");
        die();
        return;
    }

    $sql = "
    CREATE TABLE if not exists `".$prefix."categories` (
        `id` int NOT NULL,
        `name` text NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
      CREATE TABLE if not exists `".$prefix."transactions` (
        `id` int NOT NULL,
        `title` text NOT NULL,
        `source` text NOT NULL,
        `category` text NOT NULL,
        `amount` float NOT NULL,
        `userId` int NOT NULL,
        `date` date NOT NULL,
        `type` text NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      CREATE TABLE if not exists `".$prefix."users` (
        `id` int NOT NULL,
        `login` text NOT NULL,
        `name` text NOT NULL,
        `surname` text NOT NULL,
        `email` text NOT NULL,
        `password` text NOT NULL,
        `active` tinyint(1) NOT NULL,
        `userType` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      CREATE TABLE if not exists `".$prefix."wallets` (
        `id` int NOT NULL,
        `userId` int NOT NULL,
        `walletName` text NOT NULL,
        `amount` float NOT NULL,
        `monthlyLimit` int NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
      ALTER TABLE `".$prefix."categories`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `".$prefix."transactions`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `".$prefix."users`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `".$prefix."wallets`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `".$prefix."categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
  ALTER TABLE `".$prefix."transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
  ALTER TABLE `".$prefix."users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
  ALTER TABLE `".$prefix."wallets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
    ";
    echo $sql;
    $link->multi_query($sql);
    header("location:../../install.php");
    die();
    return;
