<?php #Creates new Post objects and prints out posts in HTML using method createPostHtml. File that includes this needs db-connection.

include("classes/Posts.php");

//If any category is selected, print posts from that category
if (isset($_GET['category'])){
    $category = ($_GET['category']);

    $stm = $db->prepare("SELECT p.ID, p.Title, p.Image, p.Category, p.Content, p.Date, p.UserId, u.Username FROM posts as p
    JOIN users as u ON u.Id=p.UserId WHERE p.Category = :category_IN ORDER BY p.ID DESC");
    $stm->bindParam(':category_IN', $category);
    $stm->execute();

//If no category is selected, print posts from all categories
} else { 
    $stm = $db->query("SELECT p.ID, p.Title, p.Image, p.Category, p.Content, p.Date, p.UserId, u.Username FROM posts as p
    JOIN users as u WHERE u.Id=p.UserId ORDER BY p.ID DESC");
}

while ($row = $stm->fetch()) {
    $i = $row["ID"]; //Index for post-objects
    $post[$i] = new Post($row["ID"], $row["Title"], $row["Image"], $row["Category"], $row["Content"], $row["Date"], $row["UserId"], $row["Username"]);
    $post[$i]->createPostHtml();
}