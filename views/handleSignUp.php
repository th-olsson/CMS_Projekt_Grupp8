<?php
include('../includes/database.php');

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $userpassword = $_POST['password'];
    $salt = "asdkmpäöl8234-23439*¨¨^?#=)€++98";
    $userpassword = md5($userpassword . $salt);

    $email = $_POST['email'];
}



$sql_u = $db->prepare("SELECT * FROM users WHERE Email=:email_IN OR Username=:username_IN ");
$sql_u->bindParam(":email_IN", $email);
$sql_u->bindParam(":username_IN", $username);
$sql_u->execute();
$count = $sql_u->rowCount();

if ($count > 0) {

    echo "User already exist";
} else {

    $sql = "INSERT IGNORE INTO users (Firstname, Lastname, Username, Email, Password, Role) VALUES(:fname_IN, :lname_IN, :uname_IN,:email_IN,:password_IN, 'user')";

    $stm = $db->prepare($sql);
    $stm->bindParam(':fname_IN', $firstname);
    $stm->bindParam(':lname_IN', $lastname);
    $stm->bindParam(':uname_IN', $username);
    $stm->bindParam(':email_IN', $email);
    $stm->bindParam(':password_IN', $userpassword);

    if ($stm->execute()) {
        header("location:../index.php");
    }
}
