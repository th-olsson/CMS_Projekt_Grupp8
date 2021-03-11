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
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
    
    <title>Login</title>

</head>

<body class="postClass">
    <?php include("../includes/header.php");?>
    <main class=container>
        <form method="POST" action="handleLogin.php">
            <div class="formValidator" id="login">

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?> </p>
                <?php } ?>

                <h1>Login</h1>
                <div class="formControl">
                    <label for="username">Username/Email</label>
                    <input type="text" name="username_email" placeholder="Username/Email" />
                </div>
                <div class="formControl">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="password" id="password">
                </div>
                    <input class="submitButton" type="submit" value="LOGIN">
                    <p>Not registered? <a class="registerLink " href="register.php">Create an account</a></p>
            </div>
        </form>
    </main>
    <?php include("../includes/footer.php");?>
</body>
</html>