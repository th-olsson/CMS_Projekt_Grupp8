<?php #Main features of comments.php:

#1. Display selected post

#2 List comments of selected post

#3. Be able to comment using form.

#? Consideration: be able to see comments if offline but only ablle to comment if online?

$postId = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Comments</h1>

<?php //Get post info from database

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

</body>
</html>