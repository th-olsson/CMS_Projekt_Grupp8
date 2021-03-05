<?php
session_start();
if (isset($_SESSION['role']) == "admin" || isset($_SESSION['role']) == "user") {
    header('location:../index.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" href="Images/favicon-32x32.png" type="image/x-icon">
    <title>Login</title>

</head>

<body>
    <div class=container>

        <?php include("../includes/header.php");


        ?>


        <form method="POST" action="handleLogin.php">
            <div class="formValidator" id="login">
                <h1>Login</h1>
                <?php if (isset($_GET['error'])) { ?>

                    <p class="error"><?php echo $_GET['error']; ?> </p>

                <?php } ?>




                <div class="formControl">
                    <label for="username">Username/Email</label>
                    <input type="text" name="username_email" placeholder="Username/Email" />

                    <div class="formControl">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="password" id="password">

                    </div>


                    <input type="submit" value="LOGIN">
                    <p>not registered? <a class="registerLink " href="register.php">Create an account</a></p>





                </div>






        </form>
        <div>
    <?php include("../includes/footer.php");?>
</body>

</html>