<?php

session_start();
if (!(isset($_SESSION['is_Login']))) {
    header('location:login.php');
    die();
}
if (($_SESSION['is_Login']) && $_SESSION['role'] !== 'admin') {
    header('location:login.php');
    die();
}

#Variables
$date = date('Y-m-d'); //date('Y-m-d') returns current date in yyyy-mm-dd format

//Get the logged in admins username and userId from $_SESSION
$username = "Username"; //Placeholder name
$userId = 2;            //Placeholder ID

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

    <?php//Form to send data of 'Date', 'Author', 'UserID', 'Category', 'Image URL', 'Title' and 'Content'?>
    <form action="handlePost.php" method="post">
        <?php//Readonly inputs may be changed to hidden?>
        <label for="date">Current date</label>
        <input type="text" name="date" readonly value="<?= $date ?>">
        <label for=author>Author</label>
        <input type="text" name="author" readonly value="<?= $username ?>"></input>
        <label for="userId">ID</label>
        <input type="text" name="userId" readonly value="<?= $userId ?>"></input>
        <label for="category">Category</label>
        <input type="text" name="category" placeholder="Category of blog post"></input>
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