<?php include("includes/database.php") ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogg | Homepage </title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <main class="container">
        <?php include("includes/header.php"); ?>

        <?php //If post has been edited or deleted, show message
        if (isset($_GET['info'])) {
            if ($_GET['info'] == "updated") { //on index.php/?info=updated
                echo "<div class='success'> The data has been updated </div>";
            }
        } ?>

        <?php if (isset($_GET['info'])) {
            if ($_GET['info'] == "deleted") { //on index.php/?info=deleted
                echo "<div class='error'> The data has been deleted </div>";
            }
        } ?>

        <?php //On clicking delete button, remove post from database and redirect to index.php/?info=deleted
        if (isset($_REQUEST['delete'])) {
            $id = $_POST['ID'];
            $sql = "DELETE FROM posts WHERE ID=:id_IN";
            $stm = $db->prepare($sql);
            $stm->bindParam(":id_IN", $id);
            if ($stm->execute()) {

                header("location:index.php?info=deleted");
            } else {
                echo "Något gick fel!";
                die();
            }
        }
        ?>

        <!-- Page content -->
        <div class="content">
             <!--Welcome message to logged in user-->
            <?php if (isset($_SESSION['username'])) {?>

            <p class="welcome_msg">Welcome <?= $_SESSION['username'] ?>!</p>
            <?php   } ?>
            <h2 class="content-title">Recent Articles</h2>
            <hr>

            <?php include("includes/printPosts.php") ?>
            <!-- // Page content -->
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>