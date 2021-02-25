<?php
//Temporary sandbox for first page. Supposed to take posts from database and display on this page.
//What should be displayed from post: Author username, Title, Category, Description, Content, Date.

#Database connection
$dsn = "mysql:host=localhost;dbname=bloggdb";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

//SQL - get selected data from all records in posts-table
$sql = 'SELECT u.Username, p.Title, p.Category, p.Description, p.Content, p.Date FROM posts as p
JOIN users as u WHERE p.UserID = u.ID';

$stm = $pdo->prepare($sql);

if($stm->execute()){

    while($row = $stm->fetch()){

        print_r($row);

    }

} else {
    echo "error";
    die();
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

</body>
</html>