<?php

include("../includes/database.php");

function validateData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Simple helper to debug to the console
 *
 * @param $data object, array, string $data
 * @param $context string  Optional a description.
 *
 * @return string
 */
function debug_to_console($data, $context = "Debug in console")
{

    // Buffering to solve problems frameworks, like header() in this and not a solid return.
    ob_start();

    $output  = 'console.info(\'' . $context . ':\');';
    $output .= 'console.log(' . json_encode($data) . ');';
    $output  = sprintf('<script>%s</script>', $output);

    echo $output;
}


if (isset($_POST['username_email']) && isset($_POST['password'])) {


    $username = validateData($_POST['username_email']);
    $userpassword = validateData($_POST['password']);
    $email = validateData($_POST['username_email']);


    if (empty($username)) {
        header("location:login.php?error=username is required");
        exit();
    } elseif (empty($userpassword)) {
        header("location:login.php?error=password is required");
        exit();
    } else {
        $stm = $pdo->prepare("SELECT count(*) FROM users WHERE (Username = :username_IN  OR Email=:email_IN ) AND  Password = :password_IN");
        $stm->bindParam(":username_IN", $username);
        $stm->bindParam(":email_IN", $email);
        $stm->bindParam(":password_IN", $userpassword);
        $stm->execute();
        $count = $stm->fetch();
        if ($count[0] == 1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header("location:login.php");
        } else {
            header("location:login.php?error=Invalid Username or Password");
            exit();
        }
    }
} else {

    header("location:login.php");
    exit();
}
