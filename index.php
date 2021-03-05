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

    <!-- container - wraps whole page -->
    <div class="container">
        <!-- navbar -->
        <?php include("includes/header.php"); ?>
        <!-- // navbar -->

        <!-- Page content -->
        <div class="content">
            <h2 class="content-title">Recent Articles</h2>
            <hr>
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

        <?php include("includes/footer.php");?>
        
        <?php include("includes/postsClass.php"); ?>
</body>
</html>