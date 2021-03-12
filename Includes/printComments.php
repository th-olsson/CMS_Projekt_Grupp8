<?php #Print comments for current post from database.
include("../classes/Comments.php");

            //Get Username of commenter, ID, Date, Content, where PostID = $postId
            $sql = "SELECT u.Username, c.ID, c.Date, c.Content, c.PostID, c.UserID FROM comments as c 
            JOIN users as u ON u.ID = c.UserID WHERE c.PostID = :postId_IN ORDER BY c.ID DESC";
            $stm = $db->prepare($sql);
            $stm->bindParam(":postId_IN", $postId);
            $stm->execute();

            #Creates new comment objects and prints out comments in HTML using method createCommentHtml
            while ($row = $stm->fetch()){
                $i = $row["ID"]; //Index for comment-objects
                $comment[$i] = new Comment($row["ID"], $row["Content"], $row["Date"], $row["PostID"], $row["UserID"], $row["Username"]);
                $comment[$i]->createCommentHtml();
} ?>