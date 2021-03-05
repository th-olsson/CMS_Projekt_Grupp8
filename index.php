<?php include ("includes/database.php")?>
<?php session_start()?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="UTF-8">
	<title>Blogg | Homepage </title>
</head>

<body>
    <!-- IF USER IS LOGGED OUT, SHOW LOGIN FORM -->
    <!-- IF USER IS LOGGED IN, DISPLAY BLOG POSTS -->

    <?php //IF USER IS LOGGED OUT, REDIRECT TO LOGIN.PHP
    if (!isset($_SESSION['is_Login'])){
        header("location:views/login.php");
        die();}?>

	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
		<!-- navbar -->
	<main class="container">
        <header class="navbar">
            <div class="logo_div">
                <a href="index.php">
                    <h1>Millhouse</h1>
                </a>
            </div>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="#about">About Millhouse</a></li>
                <?php
                if (!isset($_SESSION['is_Login'])) { ?>

                    <li><a href="views/login.php">Login</a></li>
                <?php  } ?>

                <li><a href="views/register.php">Register</a></li>
                <?php
                if (@$_SESSION['role'] == "admin") { ?>
                    <li><a href="views/post.php">Create new Post</a></li>

                    <li><a href="views/viewPost.php">Edit Post</a></li>

                <?php } ?>
                <?php
                if (@$_SESSION['role'] == "admin" || @$_SESSION['role'] == "user") { ?>

                    <li><a href="views/logout.php">Logout</a></li>

                <?php  } ?>

            </ul>
        </header>
		<!-- // navbar -->

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
		</div>
		<!-- // Page content -->
		<?php include("includes/postsClass.php")?>



		<!-- footer -->
		<?php include("includes/footer.php") ?>


		<!-- // footer -->

        </main>
	<!-- // container -->
</body>
</html>

		</div>
    </main>
		<!-- // Page content -->

		<?php #Print HTML posts by creating new Post-objects and using method to create

        include("includes/postsClass.php");

        $stm = $db->query('');

        ?>

    <!-- footer -->
    <div class="footer">
        <p>Grupp 8 &copy; <?php echo date('Y'); ?></p>
    </div>
    <!-- // footer -->
	<!-- // container -->
</body>
</html>