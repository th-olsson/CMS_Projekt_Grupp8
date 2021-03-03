<?php include('../includes/database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="Images/favicon-32x32.png" type="image/x-icon">
    <title>Registration</title>
</head>

<body>
    <div class=container></div>

    <?php
    include("../includes/header.php");
    ?>

    <form method="POST" action="handleSignUp.php">
        <div class="formValidator">
            <h1>Register!</h1>
            <div class="formControl">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" class="firstname" id="firstname" required>

            </div>
            <div class="formControl">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" class="lastname" id="lastname" required>

            </div>
            <div class="formControl">
                <label for="username">Username</label>
                <input type="text" name="username" class="username" id="username" required>

            </div>

            <div class="formControl">
                <label for="email">Email</label>
                <input type="email" name="email" class="email" id="email" required>

            </div>


            <div class="formControl">
                <label for="password">Password</label>
                <input type="password" name="password" class="password" id="password">

            </div>



            <input type="submit" value="Submit">






        </div>






    </form>
    <div>
</body>

</html>