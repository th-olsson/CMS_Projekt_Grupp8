<?php include("includes/database.php") ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogg | Homepage </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main class="container">
    <?php include("includes/header.php"); ?>

       <!-- Page content -->
        <div class="content">
            <h2 class="content-title">Recent Articles</h2>
            <hr>

            <?php #Posts
            
            #SQL - get post-data incl poster id and username. Data will be inserted in constructor of Post-class
            $stm = $db->query("SELECT p.ID, p.Title, p.Image, p.Category, p.Content, p.Date, p.UserId, u.Username FROM posts as p
            JOIN users as u WHERE u.Id=p.UserId");

            include("classes/Posts.php"); //Include Post-class
            
            #Creates new objects from Post-class and uses its method to create HTML-elements
            while ($row = $stm->fetch()) {

                $i = $row["ID"]; //Index for post-objects

                $post[$i] = new Post($row["ID"], $row["Title"], $row["Image"], $row["Category"], $row["Content"], $row["Date"], $row["UserId"], $row["Username"]);
            
                $post[$i]->createPostHtml();
            }
            ?>

        </div>
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
        <!-- // Page content -->

    </main>
    <?php include("includes/footer.php");?>
</body>
</html>