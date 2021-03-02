<<<<<<< HEAD
<?php include("includes/head.php")?>

	<title>Blogg | Homepage </title>
=======
<?php #Database connection
include("includes/database.php");
session_start();
?>

<?php include("includes/head.php") ?>

<title>Blogg | Homepage </title>

>>>>>>> e9cb2e9824aadc58f7a78379dde09e14d9beb3a3
</head>

<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
		<?php include("includes/header.php") ?>
		<!-- // navbar -->

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
			<!-- more content still to come here ... -->
		</div>
		<!-- // Page content -->

		<!-- footer -->
		<?php include("includes/footer.php") ?>
 
    <!-- container - wraps whole page -->
    <div class="container">


        <!-- navbar -->
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
            <!-- more content still to come here ... -->


            <?php #Gets posts from database

            //SQL - get selected data from all records in posts-table
            $sql = 'SELECT u.ID, u.Username, p.Title, p.Category, p.Image, p.Content, p.Date FROM posts as p
        JOIN users as u WHERE p.UserID = u.ID';

            $stm = $db->prepare($sql);

            if ($stm->execute()) {

                while ($row = $stm->fetch()) {

                    /*Test view data
                    echo "<pre>";
                    print_r($row);
                    "</pre>";*/

                    $title = $row['Title'];
                    $username = $row['Username'];
                    $category = $row['Category'];
                    $image = $row['Image'];
                    $content = $row['Content'];
                    $date = $row['Date'];


                    echo "<article class='post'>";
                    echo "<h3 class='post__title'>$title</h3>";
                    echo "<aside class='post__meta'><adress>By $username</adress><time datetime='$date'>$date</time><a href='$category.php'>$category</a></aside>";
                    echo "<img src='$image' alt='img' />";  //May need some variable for alt attribute, describing image
                    echo "<p class='post__content'>$content</p>
            
        </article>";
                }
            } else {
                echo "error";
                die();
            }

            ?>

        </div>
        <!-- // Page content -->

        <!-- footer -->
        <?php include("includes/footer.php") ?>
