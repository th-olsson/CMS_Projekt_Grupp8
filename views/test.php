<?php

$dsn = "mysql:host=localhost;dbname=bloggdb";
$user = "root";
$password = "root";
$pdo = new PDO($dsn, $user, $password);


$stm = $pdo->prepare("SELECT count(*) from users");
/*$stm->bindParam(":username_IN", $username);
        $stm->bindParam(":password_IN", $userpassword);
*/
print_r($stm);
$stm->execute();
$count = $stm->fetchColumn();

echo "rowCount=" . $count;
