<?php
//Temporary sandbox for first page. Supposed to take posts from database and display on this page.
//What should be displayed from post: Author username, Title, Category, Description, Image, Content, Date.

#Database connection
$dsn = "mysql:host=localhost;dbname=bloggdb";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

//SQL - get selected data from all records in posts-table
$sql = 'SELECT u.Username, p.Title, p.Category, p.Description, p.Image, p.Content, p.Date FROM posts as p
JOIN users as u WHERE p.UserID = u.ID';

$stm = $pdo->prepare($sql);

if($stm->execute()){

    while($row = $stm->fetch()){

        // print_r($row);

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

<h1>Millhouse blog</h1>
<!-- Example layout for blog posts -->
<!-- Attributes to insert variables into: <time datetime="$date">,<a href="index.php/category/$categoryUrl">  -->
<section class="posts-container">
    <article class="post">
        <h2 class="post__title">title</h2>
        <aside class="post__meta"><adress>By username</adress><time datetime="2021-02-18">2021-02-18</time><a href="">category</a></aside>
        <p class="post__text-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, maxime culpa nemo possimus fuga enim cumque est dicta. Fugiat molestias vel dolorum eaque nemo perferendis vero, esse officia impedit quas. Mollitia, facere dolor!</p>
    </article>
    <article class="post">
        <h2 class="post__title">title2 </h2>
        <aside class="post__meta"><adress>By username</adress><time datetime="2021-02-14">2021-02-14</time><a href="">category</a></aside>
        <p class="post__text-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus, facilis? Nobis sint iure debitis tenetur.</p>
    </article>    <article class="post">
        <h2 class="post__title">title 3</h2>
        <aside class="post__meta"><adress>By username</adress><time datetime="2021-01-30">2021-01-30</time><a href="">category</a></aside>
        <p class="post__text-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt quidem ea sunt, maxime natus nobis. Omnis obcaecati similique vel possimus blanditiis soluta suscipit autem alias sunt fuga ad reprehenderit, assumenda, ipsam magnam nesciunt laboriosam! Est debitis, ea, natus vitae dolor distinctio nihil itaque, maiores cum illum quas libero obcaecati nobis doloribus esse quam. Hic, numquam.</p>
    </article>
</section>

</body>
</html>