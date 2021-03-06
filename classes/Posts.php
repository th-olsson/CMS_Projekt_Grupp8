<?php
$path = $_SERVER['DOCUMENT_ROOT']; //Server document root path
include($path . "/CMS_Projekt_Grupp8/includes/functions.php"); //Include functions.php

class Post
{
    private $id;
    private $title;
    private $image;
    private $category;
    private $content;
    private $date;
    private $userId;
    private $username;
    private $amountComments;

    function __construct($id_IN, $title_IN, $image_IN, $category_IN, $content_IN, $date_IN, $userId_IN, $username_IN, $amountComments_IN)
    {
        $this->id = $id_IN;
        $this->title = escape($title_IN);
        $this->image = $image_IN;
        $this->category = escape($category_IN);
        $this->content = escape($content_IN);
        $this->date = $date_IN;
        $this->userId = $userId_IN;
        $this->username = $username_IN;
        $this->amountComments = $amountComments_IN;
    }

    function createPostHtml()
    {

        echo "<article class='post' id='$this->id'>";
        echo "<h3 class='post__title'>$this->title</h3>";
        echo "<aside class='post__meta'><adress>By $this->username</adress><time datetime='$this->date'>$this->date</time><a class='post__category' href='/CMS_Projekt_Grupp8/index.php?category=$this->category'>$this->category</a></aside>";
        if (isset($this->image)){
            echo "<img class='post__img'src='/CMS_Projekt_Grupp8/views/$this->image' alt='Blog post image' />";
        }
        echo "<p class='post__content'>$this->content</p>";

        //Condition: print links to comments if on index.php
        $fileName = basename($_SERVER['PHP_SELF']); //Gets file name of current page
        if ($fileName == "index.php") {
            echo "<a class='post__comment' href='views/comments.php?id=$this->id'>Comments ($this->amountComments)</a>";
        }

        echo "</article>";

        //If admin is logged in, create buttons to edit and delete - only applies on index.php
        if (@$_SESSION['role'] == "admin" && $fileName == "index.php") {
            echo "<div>";
            echo "<button class='edit-btn'>";
            echo "<a href='views/editPost.php?id=$this->id'>Edit</a>";
            echo "</button>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='ID' value='$this->id' />";
            echo "<button class='delete-btn' name='delete'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
    }
}
