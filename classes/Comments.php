<?php

class Comment
{
    private $id;
    private $content;
    private $date;
    private $postId;
    private $userId;
    private $username;

    function __construct($id_IN, $content_IN, $date_IN, $postId_IN, $userId_IN, $username_IN)
    {
        $this->id = $id_IN;
        $this->content = $content_IN;
        $this->date = $date_IN;
        $this->postId = $postId_IN;
        $this->userId = $userId_IN;
        $this->username = $username_IN;
    }

    function createCommentHtml(){
        echo "<article class='comment' id='$this->id'>";
        echo "<aside class='comment__meta'><adress>$this->username</adress><time datetime='$this->date>'>$this->date</time></aside>";
        echo "<p class='comment__content'>$this->content</p>";
        echo "</article>";

        //If admin is logged in, add 'delete comment'-btn
        if (isset($_SESSION['is_Login']) && $_SESSION['role'] == 'admin') { 
            echo "<form action='handleComments.php' method='POST'>";
            echo "<input type='hidden' name='ID' value='$this->id' />";
            echo "<input type='hidden' name='postId' value='$this->postId' />";
            echo "<button name='delete'>Delete comment</button>";
            echo "</form>";
        } 
    }
}
?>
