<?php
$dsn = "mysql:host=localhost;dbname=bloggdb";
$user = "root";
$password = "root";
$pdo = new PDO($dsn, $user, $password);





if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $userpassword = $_POST['password'];
    $salt = "asdkmpäöl8234-23439*¨¨^?#=)€++98";
    $userpassword = md5($userpassword . $salt);
    $email = $_POST['email'];
}




/*
$sql_u = "SELECT count(*) FROM users WHERE Username='$username'";
$result = $pdo->prepare($sql_u);
*/


$sql = "INSERT INTO users (Firstname, Lastname, Username, Password, Email) VALUES(:fname_IN, :lname_IN, :uname_IN,:email_IN,:password_IN)";

$stm = $pdo->prepare($sql);
$stm->bindParam(':fname_IN', $firstname);
$stm->bindParam(':lname_IN', $lastname);
$stm->bindParam(':uname_IN', $username);
$stm->bindParam(':email_IN', $email);
$stm->bindParam(':password_IN', $userpassword);

if ($stm->execute()) {
    echo "success";
} else {
    echo "Något gick fel!";
}
