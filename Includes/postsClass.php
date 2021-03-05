<?php

class Posts
{
    private $id;
    private $title;
    private $image;
    private $category;
    private $content;
    private $date;
    private $userId;

    function __construct($id_IN, $title_IN, $image_IN, $category_IN, $content_IN, $date_IN, $userId_IN)
    {
        $this->id = $id_IN;
        $this->title = $title_IN;
        $this->image = $image_IN;
        $this->category = $category_IN;
        $this->content = $content_IN;
        $this->date = $date_IN;
        $this->userId = $userId_IN;
    }

    function getId()
    {
        return $this->id;
    }
    function getTitle()
    {
        return $this->title;
    }
    function getImage()
    {
        return $this->image;
    }
    function getCategory()
    {
        return $this->category;
    }
    function getContent()
    {
        return $this->content;
    }
    function getDate()
    {
        return $this->date;
    }
    function getUserId()
    {
        return $this->userId;
    }

    function getAll()
    {
        return array($this->id, $this->title, $this->image, $this->category, $this->content, $this->date, $this->userId);
    }
}

$sql = 'SELECT p.ID, u.Username, p.Title, p.Category, p.Image, p.Content, p.Date, p.UserID FROM posts as p
JOIN users as u WHERE p.UserID = u.ID ORDER BY p.ID DESC';
$stm = $db->prepare($sql);
if ($stm->execute()) {

    while ($row = $stm->fetch()) {
        //print_r($row);
        $post = new Posts(@$row['ID'], $row['Title'], $row['Image'], $row['Category'], $row['Content'], $row['Date'], $row['UserID']);

        $imgPath = "views/" . $post->getImage();
        //echo $imgPath;
?>
        <article class='post'>
            <h3 class='post__title'><?= $post->getId(); ?></h3>
            <aside class='post__meta'>
                <adress>By <?= @$_SESSION['username'] ?></adress><time datetime='<?= $post->getDate(); ?>'><?= $post->getDate(); ?></time>
                <a href='$category.php'><?= $post->getCategory(); ?></a>
            </aside>
            <img src='<?= $imgPath ?>' alt='img' />
            <p class='post__content'><?= $post->getContent();  ?></p>
            <!--for editing and deleting post -->
            <?php if (@$_SESSION['role'] == "admin") { ?>

                <div>
                    <button class='edit-btn'>
                        <a href='../views/editPost.php?id=<?= $post->getId(); ?>'>Edit</a> </button>

                    <form method="POST">


                        <input type='hidden' name='ID' value=<?= $post->getId(); ?> />

                        <button class='delete-btn' name='delete'>Delete</button>

                    </form>
                </div>
    <?php }
        }
    } else {
        echo "error";
        die();
    }

    ?>