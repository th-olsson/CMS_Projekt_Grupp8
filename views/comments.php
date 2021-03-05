<?php #Main features of comments.php:

#1. Display selected post

#2 List comments of selected post

#3. Be able to comment using form.

#? Consideration: be able to see comments if offline but only ablle to comment if online?

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
<?php //Get post info from database
print_r($_SESSION);

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

<?php $userId = $_SESSION['userId']; $date = date('Y-m-d'); ?>
<!-- Should send data of Content, Date, PostId, UserId -->
<form action="handleComments.php" method="post">
    <input type="text" name="userId" hidden value="<?= $userId ?>"></input>
    <input type="text" name="date" hidden value="<?= $date ?>">
    <input type="text" name="postId" hidden value="<?= $postId ?>">
    <textarea name="content" cols="30" rows="10" placeholder="Write your comment.."></textarea>
    <input type="submit" value="Send comment"></input>
</form>

</body>
</html>