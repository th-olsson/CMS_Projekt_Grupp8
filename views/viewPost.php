<?php #Database connection
include("../includes/database.php");


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
        <?php include("../includes/header.php") ?>
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
            $sql = 'SELECT * FROM posts';
            $stm = $db->prepare($sql);

            if ($stm->execute()) {

                while ($row = $stm->fetch()) {

            ?>
                    <article class='post'>
                        <h3 class='post__title'><?= $row['Title'] ?></h3>
                        <aside class='post__meta'>
                            <adress>By $username</adress><time datetime='<?= $row['Date'] ?>'><?= $row['Date'] ?></time>
                            <a href='$category.php'><?= $row['Category'] ?></a>
                        </aside>";
                        <img src='<?= $row['Image'] ?>' alt='img' />"; //May need some variable for alt attribute, describing image
                        <p class='post__content'><?= $row['Content']  ?></p>
                        <!--for editing and deleting post -->
                        <div>
                            <button class='edit-btn'>
                                <a href='editPost.php?id=<?= $row['ID']; ?>'>Edit</a> </button>

                            <form method="POST">


                                <input type='hidden' name='ID' value=<?= $row['ID']; ?> />

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