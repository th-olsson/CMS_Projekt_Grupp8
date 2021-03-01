<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="Images/favicon-32x32.png" type="image/x-icon">

</head>

<body>
    <nav>
        <ul class="navlist">
            <li>
                <img src="../Images/logo_size.jpg" alt="CompanyLogo">


            </li>


        </ul>

    </nav>
    <?php

    session_start();
    if ((isset($_SESSION['username']) or isset($_SESSION['email']) and isset($_SESSION['password']))) {

        echo "<h1> Welcome" . " " . $_SESSION['username'] . "</h1>";
        echo "<a href='logout.php'>Log out </a>";
        die();
    }


    ?>






    <form method="POST" action="handleLogin.php">
        <div class="container-form" id="login">
            <h1>Login to your account</h1>
            <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?> </p>

            <?php } ?>




            <div class="formData">
                <label for="username">Username/Email</label>
                <input type="text" name="username_email" placeholder="Username/Email" />
                <small>Error message</small>
            </div>
            <div class="formData">
                <label for="password">Password</label>
                <input type="password" name="password" class="password" id="password">
                <small>Error message</small>
            </div>


            <input type="submit" value="LOGIN">
            <p>not registered? <a href="register.php">Create an account</a></p>





        </div>






    </form>
</body>

</html>