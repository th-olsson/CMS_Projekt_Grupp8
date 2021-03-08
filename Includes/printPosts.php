<?php #Creates new post objects and prints out posts in HTML. File that includes this needs db-connection.

#SQL - get post-data incl poster id and username. Data will be inserted in constructor of Post-class
$stm = $db->query("SELECT p.ID, p.Title, p.Image, p.Category, p.Content, p.Date, p.UserId, u.Username FROM posts as p
    JOIN users as u WHERE u.Id=p.UserId ORDER BY p.ID DESC");

include("classes/Posts.php"); //Include Post-class

#Creates new objects from Post-class and uses its method to create HTML-elements
while ($row = $stm->fetch()) {

    $i = $row["ID"]; //Index for post-objects

    $post[$i] = new Post($row["ID"], $row["Title"], $row["Image"], $row["Category"], $row["Content"], $row["Date"], $row["UserId"], $row["Username"]);

    $post[$i]->createPostHtml();
}
