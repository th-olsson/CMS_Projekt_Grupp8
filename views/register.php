<?php include('../includes/database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
   
    <link rel="icon" href="Images/favicon-32x32.png" type="image/x-icon">
    <title>Registration</title>
</head>

<body class="postClass">
    <?php include("../includes/header.php"); ?>
    <main class="container">
        <form method="POST" action="handleSignUp.php">
            <div class="formValidator">

                <!--Display registeration error for null inputs-->
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?> </p>
                <?php } ?>

                <h1>Register!</h1>
                <div class="formControl">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" class="firstname" id="firstname">
                </div>
                <div class="formControl">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" class="lastname" id="lastname">
                </div>
                <div class="formControl">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="username" id="username">
                </div>
                <div class="formControl">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="email" id="email">
                </div>
                <div class="formControl">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="password" id="password">
                </div>
                <input class="submitButton" type="submit" value="Submit">
                <p>Already a user? <a class="registerLink " href="login.php">Login</a></p>

            </div>
        </form>
    </main>
    <?php include("../includes/footer.php");?>
</body>

</html>