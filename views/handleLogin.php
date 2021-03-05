<?php

include("../includes/database.php");
//function to remove spaces or unwanted character from input data
function validateData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (isset($_POST['username_email']) && isset($_POST['password'])) {
    print_r($_POST);
    $username = validateData($_POST['username_email']); //function call and variable assigning
    $email = validateData($_POST['username_email']);
    $userpassword = $_POST['password'];

    if (empty($username)) {
        header("location:login.php?error=username is required");
        exit();
    } elseif (empty($userpassword)) {
        header("location:login.php?error=password is required");
        exit();
    } else {
        $stm = $db->prepare("SELECT count(*), Role, ID FROM users WHERE (Username = :username_IN  OR Email=:email_IN ) AND  Password =:password_IN");
        $stm->bindParam(":username_IN", $username);
        $stm->bindParam(":email_IN", $email);
        $salt = "asdkmpäöl8234-23439*¨¨^?#=)€++98";
        $pass = md5($userpassword . $salt);
        $stm->bindParam(":password_IN", $pass);
        $stm->execute();
        $count = $stm->fetch();

        if ($count[0] > 0) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pass;
            $_SESSION['role'] = $count['Role'];
            $_SESSION['userId'] = $count['ID'];
            $_SESSION['is_Login'] = "yes";

            if ($count['Role'] == "admin") {
                header("location:../index.php");
            }
            if ($count['Role'] == "user") {

                header("location:../index.php");
            }
        } else {
            header("location:login.php?error=Invalid Username or Password");
            exit();
        }
    }
} else {

    header("location:login.php");
    exit();
}
