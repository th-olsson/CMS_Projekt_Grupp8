<?php
if (!isset($_GET['id'])){   //If no existing post is referred to in URL, redirect to index.php 
    header("location:../index.php");
}

session_start();

$postId = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("../includes/header.php") ?>
    <div class="content">
    
        <h2>Comments</h2>
        <?php #Get post data from database
        include("../includes/database.php");

        $stm = $db->prepare("SELECT p.ID, p.Title, p.Image, p.Category, p.Content, p.Date, p.UserId, u.Username, (SELECT COUNT(*) FROM comments AS c WHERE c.PostId = p.Id) AS AmountComments FROM posts as p
        JOIN users as u ON u.Id=p.UserId WHERE p.ID = :ID_IN");
        $stm->bindParam(':ID_IN', $postId);
        $stm->execute();

        include("../classes/Posts.php"); //Include Post-class

        #Creates new objects from Post-class and uses its method to create HTML-elements
        $row = $stm->fetch();
        $i = $row["ID"]; //Index for post-objects
        $post[$i] = new Post($row["ID"], $row["Title"], $row["Image"], $row["Category"], $row["Content"], $row["Date"], $row["UserId"], $row["Username"], $row["AmountComments"]);
        $post[$i]->createPostHtml();
        ?>

    <section class="comment-section">
        
    <?php include("../includes/printComments.php") ?>

    <?php //If logged in, print form to comment
        if (isset($_SESSION['is_Login'])) {
        $userId = $_SESSION['userId']; $date = date('Y-m-d'); ?>
        <h3>Comment</h3>
        <form action="handleComments.php" method="post">
            <input type="text" name="userId" hidden value="<?= $userId ?>"></input>
            <input type="text" name="date" hidden value="<?= $date ?>">
            <input type="text" name="postId" hidden value="<?= $postId ?>">
            <textarea name="content" cols="30" rows="10" placeholder="Write your comment.."></textarea>
            <br>
            <input class="postSubmit" type="submit" value="Send comment"></input>
        </form>
    <?php } else {  //If logged out, link to login page instead?>
        <a href="login.php">Log in to comment</a>
    <?php } ?>
    </div>
    </section>

</body>
</html>