<?php
session_start();
if (!(isset($_SESSION['is_Login']))) {
    header('location:login.php');
    die();
}
if (($_SESSION['is_Login']) && $_SESSION['role'] !== 'admin') {
    header('location:../index.php');
    die();
}



?>




<?php #Database connection

include("../includes/database.php");


?>


<?php
if (isset($_REQUEST['delete'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM posts WHERE ID=:id_IN";
    $stm = $db->prepare($sql);
    $stm->bindParam(":id_IN", $id);
    if ($stm->execute()) {

        header("location:viewPost.php?info=deleted");
    } else {
        echo "Något gick fel!";
        die();
    }
}

?>


<?php include("../includes/head.php") ?>




<html>

<head>
    <title>Blogg | Homepage </title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
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
                <li><a class="active" href="../index.php">Home</a></li>
                <li><a href="#about">About Millhouse</a></li>
                <li><a href="post.php">Create New Post</a></li>
            </ul>
        </header>

        <div class="dropdown">
            <span>Logout</span>
            <div class="dropdown-content">
                <a href="logout.php">logout</a>
            </div>
        </div>

        <!-- // navbar -->

        <?php if (isset($_GET['info'])) {
            if ($_GET['info'] == "updated") {
                echo "<div class='success'> The data has been updated </div>";
            }
        } ?>

        <?php if (isset($_GET['info'])) {
            if ($_GET['info'] == "deleted") {
                echo "<div class='error'> The data has been deleted </div>";
            }
        } ?>





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
                    $title = $row['Title'];
                    $username = $row['Username'];
                    $category = $row['Category'];
                    $image = $row['Image'];
                    $content = $row['Content'];
                    $date = $row['Date'];
                    $id = $row['ID'];
            ?>
                    <article class='post'>
                        <h3 class='post__title'><?= $title ?></h3>
                        <aside class='post__meta'>
                            <adress>By <?= $username ?></adress><time datetime='<?= $date ?>'><?= $date ?></time>
                            <a href='$category.php'><?= $category ?></a>
                        </aside>
                        <img src='<?= $image ?>' alt='img' />
                        <p class='post__content'><?= $content  ?></p>
                        <!--for editing and deleting post -->
                        <div>
                            <button class='edit-btn'>
                                <a href='editPost.php?id=<?= $id; ?>'>Edit</a> </button>

                            <form method="POST">


                                <input type='hidden' name='ID' value=<?= $id; ?> />

                                <button class='delete-btn' name='delete'>Delete</button>

                            </form>
                        </div>
                <?php }
            } else {
                echo "error";
                die();
            }

                ?>

                    </article>
        </div>
    </div>

</body>

</html>