<?php
include('../includes/database.php');
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

if (isset($action) && $action == "update") {
    print_r($_POST);
    $sql = "UPDATE posts SET Category=:category_IN, Image=:image_IN, Title=:title_IN , Content=:content_IN WHERE ID=:id_IN";

    $stm = $db->prepare($sql);
    $stm->bindParam(":category_IN", $_POST['category']);
    $stm->bindParam(":image_IN", $_POST['image']);
    $stm->bindParam("title_IN", $_POST['title']);
    $stm->bindParam(":content_IN", $_POST['content']);
    $stm->bindParam(":id_IN", $_POST['ID']);
    if ($stm->execute()) {

        header("location:viewPost.php?info=updated");
    } else {
        echo "Något gick fel!";
        die();
    }
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
    <h1>Edit Post</h1>

    <?php
    $stm = $db->prepare("SELECT Category, Image, Title, Content FROM posts WHERE id=:id_IN");

    $stm->bindParam(":id_IN", $_GET['id']);

    $success = $stm->execute();

    if (!$success) {
        echo "<h3>Något gick fel!</h3>";
        die();
    }

    $userData = $stm->fetch();

    //print_r($userData);

    ?>
    <form action="editPost.php?action=update" method="post">
        <?php//Readonly inputs may be changed to hidden
        ?>
        <input type="hidden" name="ID" value="<?= $_GET['id']; ?>" />
        <label for="date">Current date</label>
        <input type="text" name="date" readonly value="<?= $date ?>">
        <label for=author>Author</label>
        <input type="text" name="author" readonly value="<?= $username ?>"></input>
        <label for="userId">ID</label>
        <input type="text" name="userId" value="<?= $userId ?>"></input>
        <label for="category">Category</label>
        <input type="text" name="category" value="<?= $userData['Category']; ?>" placeholder="Category of blog post"></input>
        <label for="image">Image URL</label>
        <input type="text" name="image" value="<?= $userData['Image'];    ?>" placeholder="Paste image URL here"></input>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= $userData['Title'];    ?>" placeholder="Title of blog post"></input>
        <label for="content">Content</label>
        <textarea name="content" id="" cols="30" rows="10" placeholder="Content of blog post.."><?= $userData['Content']; ?></textarea>
        <input type="submit" value="update" />
    </form>

</body>

</html>