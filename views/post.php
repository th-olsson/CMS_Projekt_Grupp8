<?php

#Variables
$date = date('Y-m-d'); //date('Y-m-d') returns current date in yyyy-mm-dd format

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
    <label for=writer>Writer</label>
    <select name="writer">
        <option value="admin1">admin1</option>
        <option value="admin2">admin2</option>
        <option value="admin3">admin3</option>  
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