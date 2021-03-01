<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="Images/favicon-32x32.png" type="image/x-icon">
</head>

<body>
    <nav>
        <ul class="navlist">
            <li>
                <img src="../Images/logo_size.jpg" alt="CompanyLogo">


            </li>
            <li>

                <button> <a href="login.php">Login</a></button>

            </li>

        </ul>

    </nav>


    <?php
    include('../includes/database.php');




    ?>
    <form method="POST" action="handleSignUp.php">
        <div class="container-form">
            <h1>Register!</h1>
            <div class="formData">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" class="firstname" id="firstname" required>
                <small>Error message</small>
            </div>
            <div class="formData">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" class="lastname" id="lastname" required>
                <small>Error message</small>
            </div>
            <div class="formData">
                <label for="username">Username</label>
                <input type="text" name="username" class="username" id="username" required>
                <small>Error message</small>
            </div>

            <div class="formData">
                <label for="email">Email</label>
                <input type="email" name="email" class="email" id="email" required>
                <small>Error message</small>
            </div>


            <div class="formData">
                <label for="password">Password</label>
                <input type="password" name="password" class="password" id="password">
                <small>Error message</small>
            </div>



            <input type="submit" value="Submit">






        </div>






    </form>
</body>

</html>