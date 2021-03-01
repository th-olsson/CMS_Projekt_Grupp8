<?php #Database connection
include("includes/database.php");
?>

<?php include("includes/head.php") ?>

<title>Blogg | Homepage </title>

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