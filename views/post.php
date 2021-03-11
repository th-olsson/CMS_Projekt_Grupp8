<?php
//prevent injection login to this page, if user has not logged in
session_start();
if (!(isset($_SESSION['is_Login']))) {
    header('location:login.php');
    die();
}
//prevent injection login to this page, if logged in user is not admin
if (($_SESSION['is_Login']) && $_SESSION['role'] !== 'admin') {
    header('location:../index.php');
    die();
}

#Variables
$date = date('Y-m-d'); //date('Y-m-d') returns current date in yyyy-mm-dd format

//Get the logged in admins username and userId from $_SESSION
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <title>Create Post</title>
</head>

<body class="postClass">
    <?php include("../includes/header.php"); ?>
    <main>
        <div class="content2">
            <h1>Create a post</h1>

            <!--Display error here-->
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?> </p>
            <?php } ?>

            <?php//Form to send data of 'Date', 'Author', 'UserID', 'Category', 'Image URL', 'Title' and 'Content'?>
            <form class="handlePostForm" action="handlePost.php" method="post" enctype="multipart/form-data">
                <?php//Readonly inputs may be changed to hidden?>
                <label class="postLabels" for="category">Category</label>
                <input class="categoryInput" type="text" name="category" placeholder="Category of blog post"></input>
                <label class="postLabels" for="image">Image URL</label>
                <input class=" imgInput" type="file" name="imageToUpload"> </input>
                <label class="postLabels" for="title">Title</label>
                <input class=" titleInput" type="text" name="title" placeholder="Title of blog post"></input>
                <br>
                <label class="postLabels" for="content">Content</label>
                <br>
                <textarea class=" contentInput" name="content" id="" cols="30" rows="10" placeholder="Content of blog post.."></textarea>
                <input class="postSubmit" type="submit" value="Submit"></input>
                <input type="hidden" name="date" readonly value="<?= $date ?>">
                <input type="hidden" name="author" readonly value="<?= $_SESSION['username'] ?>"></input>
                <input type="hidden" name="userId" readonly value="<?= $_SESSION['userId'] ?>"></input>
            </form>
        </div>
        <main>
            <?php include("../includes/footer.php"); ?>
</body>

</html>