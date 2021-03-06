<?php
print_r($_POST); //Test view data sent

//Save variables from $_POST
$content = $_POST['content'];
$date = $_POST['date'];
$postId = $_POST['postId'];
$userId = $_POST['userId'];

//Send comment data to comments in database
include("../includes/database.php");



$sql = "INSERT INTO comments (Content, Date, PostID, UserID) VALUES (:content_IN, :date_IN, :postId_IN, :userId_IN)";
$stm = $db->prepare($sql);
$stm->bindParam(":content_IN", $content);
$stm->bindParam(":date_IN", $date);
$stm->bindParam(":postId_IN", $postId);
$stm->bindParam(":userId_IN", $userId);
if($stm->execute()){
    echo "Your data was successfully uploaded to database";
    echo "<a href='../index.php'>Go back</a>";
} else {
    echo "Something went wrong";
    die();
}

?>