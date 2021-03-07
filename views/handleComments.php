<?php
include("../includes/database.php");

#Remove comment from database ($_POST sent by delete button). Then redirect to comments.
if (isset($_REQUEST['delete'])) {

    $id = $_POST['ID'];
    $postId = $_POST['postId'];

    $sql = "DELETE FROM comments WHERE ID=:id_IN";
    $stm = $db->prepare($sql);
    $stm->bindParam(":id_IN", $id);
    if ($stm->execute()) {
        header("location:comments.php?id=$postId");
    } else {
        echo "Något gick fel!";
        die();
    }
}

#Add comment to database ($_POST sent from comment form). Then redirect to comments.
$content = $_POST['content'];
$date = $_POST['date'];
$postId = $_POST['postId'];
$userId = $_POST['userId'];

$sql = "INSERT INTO comments (Content, Date, PostID, UserID) VALUES (:content_IN, :date_IN, :postId_IN, :userId_IN)";
$stm = $db->prepare($sql);
$stm->bindParam(":content_IN", $content);
$stm->bindParam(":date_IN", $date);
$stm->bindParam(":postId_IN", $postId);
$stm->bindParam(":userId_IN", $userId);
if($stm->execute()){
    header("location:comments.php?id=$postId");
} else {
    echo "Something went wrong";
    die();
}

?>