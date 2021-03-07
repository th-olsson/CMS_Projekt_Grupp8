<?php

class Comment {
    private $id;
    private $content;
    private $date;
    private $postId;
    private $userId;

    function __construct($id_IN, $content_IN, $date_IN, $postId_IN, $userId){
        $this->id = $id_IN;
        $this->content = $content_IN;
        $this->date = $date_IN;
        $this->postId = $postId_IN;
        $this->userId = $userId_IN;
    }

}

?>

