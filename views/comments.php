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
</head>
<body>
<?php 
include("../includes/header.php") ?>
    <h2>Comments</h2>
<?php #Get post data from database
include("../includes/database.php");

$stm = $db->prepare("SELECT p.ID, p.Title, p.Image, p.Category, p.Content, p.Date, p.UserId, u.Username FROM posts as p
JOIN users as u ON u.Id=p.UserId WHERE p.ID = :ID_IN");
$stm->bindParam(':ID_IN', $postId);
$stm->execute();

include("../classes/Posts.php"); //Include Post-class

#Creates new objects from Post-class and uses its method to create HTML-elements
$row = $stm->fetch();
$i = $row["ID"]; //Index for post-objects
$post[$i] = new Post($row["ID"], $row["Title"], $row["Image"], $row["Category"], $row["Content"], $row["Date"], $row["UserId"], $row["Username"]);
$post[$i]->createPostHtml();
?>

<section class="comment-section">
    
    <?php #Print comments for current post from database.
    //Get Username of commenter, ID, Date, Content, where PostID = $postId
    $sql = "SELECT u.Username, c.ID, c.Date, c.Content FROM comments as c 
    JOIN users as u ON u.ID = c.UserID WHERE PostId = :postId_IN";
    $stm = $db->prepare($sql);
    $stm->bindParam(":postId_IN", $postId);
    $stm->execute();

    while ($row = $stm->fetch()){?>
        <article class="comment" id="<?=$row['ID']?>">
            <aside class="comment__meta"><adress><?=$row['Username']?><time datetime='<?=$row['Date']?>'><?=$row['Date']?></time></adress></aside>
            <p class="comment__content"><?=$row['Content']?></p>
        </article>
        <?php if (isset($_SESSION['is_Login']) && $_SESSION['role'] == 'admin') { //If admin is logged in, add 'delete comment'-btn?>
        <form action="handleComments.php" method="POST">
            <input type="hidden" name='ID' value="<?=$row['ID']?>" />
            <input type="hidden" name='postId' value="<?=$postId?>" />
            <button name="delete">Delete comment</button>
        </form>
        <?php } ?>
    <?php } ?>

    <?php //If logged in, print form to comment
        if (isset($_SESSION['is_Login'])) {
        $userId = $_SESSION['userId']; $date = date('Y-m-d'); ?>
        <h3>Comment</h3>
        <form action="handleComments.php" method="post">
            <input type="text" name="userId" hidden value="<?= $userId ?>"></input>
            <input type="text" name="date" hidden value="<?= $date ?>">
            <input type="text" name="postId" hidden value="<?= $postId ?>">
            <textarea name="content" cols="30" rows="10" placeholder="Write your comment.."></textarea>
            <input type="submit" value="Send comment"></input>
        </form>
    <?php } else {  //If logged out, link to login page instead?>
        <a href="login.php">Log in to comment</a>
    <?php  } ?>

</section>

</body>
</html>