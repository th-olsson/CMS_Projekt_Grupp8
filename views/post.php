<?php

#Variables
$date = date('Y-m-d'); //date('Y-m-d') returns current date in yyyy-mm-dd format

#Database connection
$dsn = "mysql:host=localhost;dbname=bloggdb";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

//SQL - get admin username
$sql='SELECT username FROM users WHERE users.Role = "admin"';

$stm = $pdo->prepare($sql);
$stm->execute();

//Stores fetched admin usernames in array $admins
$admins = array();

while($row = $stm->fetch()){
    $admins[] = $row['username'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Create a post</h1>

<!-- Form to send data of 'Date', 'Writer', 'Category', 'Description' 'Image URL', 'Title' and 'Content'. -->
<form action="handlePost.php" method="post">
    <label for="date">Current date</label>
    <input type="text" name="date" readonly value="<?=$date?>"> <!-- Date input might be changed to hidden -->
    <label for=author>Author</label>
    <select name="author">
        <?php
            //For each admin in $admins, create an option for the select author input
            for ($i = 0; $i<count($admins); $i++){
                echo "<option value='$admins[$i]'>$admins[$i]</option>";
            }
        ?>
    </select>
    <label for="category">Category</label>
    <input type="text" name="category" placeholder="Category of blog post"></input>
    <label for="description">Description</label>
    <input type="text" name="description" placeholder="Describe blog post"></input>
    <label for="image">Image URL</label>
    <input type="text" name="image" placeholder="Paste image URL here"></input>
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title of blog post"></input>
    <label for="content">Content</label>
    <textarea name="content" id="" cols="30" rows="10" placeholder="Content of blog post.."></textarea>
    <input type="submit" value="Submit"></input>
</form>

</body>
</html>