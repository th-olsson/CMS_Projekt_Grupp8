<?php 

class Posts {
    private $id;
    private $title;
    private $description;
    private $image;
    private $category;
    private $content;
    private $date;
    private $userId;

    function __construct($id_IN, $title_IN, $description_IN, $image_IN, $category_IN, $content_IN, $date_IN, $userId_IN) {
        $this->id = $id_IN;
        $this->title = $title_IN
        $this->description = $description_IN
        $this->image = $image_IN
        $this->category = $category_IN
        $this->content = $content_IN
        $this->date = $date_IN
        $this->userId = $userId_IN
    }

    function getId()  {
        return $this->id;
    }
    function getTitle()  {
        return $this->title;
    }
    function getDescription()  {
        return $this->description;
    }
    function getImage()  {
        return $this->image;
    }
    function getCategory()  {
        return $this->category;
    }
    function getContent()  {
        return $this->content;
    }
    function getDate()  {
        return $this->date;
    }
    function getUserId()  {
        return $this->userId;
    }

    function getAll () {
        return array($this->id, $this->title, $this->description, $this->image, $this->category, $this->content, $this->date, $this->userId);
    }
}

$posts = [];

$stm = $db->query("SELECT ID, Title, Description, Image, Category, Content, Date, UserId FROM posts");

echo"<pre>"
while ($row = $stm->fetch()) {
    echo $row["ID"], $row[""], $row[""], $row[""], $row[""], $row[""], $row[""], $row[""]
}
echo "</pre>"