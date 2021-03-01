<?php

#Variables
$date = $_POST['date'];
$author = $_POST['author'];
$category = $_POST['category'];
$description = $_POST['description'];
$image = $_POST['image'];
$title = $_POST['title'];
$content = $_POST['content'];
$userId = $_POST['userId'];

#Database connection
$dsn = "mysql:host=localhost;dbname=bloggdb";
$user = "root";
$password = "root";
$pdo = new PDO($dsn, $user, $password);

//SQL - insert data from $_POST to posts-table
$sql = 'INSERT INTO posts (Date, UserID, Category, Description, Image, Title, Content) VALUES (:date_IN, :userId_IN, :category_IN, :description_IN, :image_IN, :title_IN, :content_IN)';

$stm = $pdo->prepare($sql);
$stm->bindParam(':date_IN', $date);
$stm->bindParam(':userId_IN', $userId);
$stm->bindParam(':category_IN', $category);
$stm->bindParam(':description_IN', $description);
$stm->bindParam(':image_IN', $image);
$stm->bindParam(':title_IN', $title);
$stm->bindParam(':content_IN', $content);

if ($stm->execute()) {
    echo "your data has been successfully added to the database";
    echo '<a href="post.php">go back</a>';
} else {
    echo "something went wrong";
    echo '<a href="post.php">go back</a>';
}

if (isset($_GET['ID'])) {

    $id = $_GET['ID'];
}
