<?php
include('../includes/database.php');
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

?>

<?php


if (isset($_FILES['imageToReplace']) && (!empty($_FILES['imageToReplace']))) {

    $upload_dir = "uploads/";
    $target_file = $upload_dir . basename($_FILES['imageToReplace']['name']); //function basename helps in creating the format required for different OS
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['imageToReplace']['tmp_name']);
        if ($check == false) {
            echo "the file is not an image";
            die();
        }
    }

    if (file_exists($target_file)) {
        echo "The file already exist";
        die();
    }

    if ($_FILES['imageToReplace']['size'] > 1000000) {
        echo "The file size is too big";
        die();
    }

    if ($fileType !== "png" && $fileType !== "gif" && $fileType !== "jpg" && $fileType !== "jpeg") {

        echo "you can only upload png, , gif, jpg & jpeg format";
        die();
    }


    if (move_uploaded_file($_FILES['imageToReplace']['tmp_name'], $target_file)) {
        $sql = 'UPDATE posts SET Image=:image_IN WHERE ID=:id_IN';
        $stm = $db->prepare($sql);
        $stm->bindParam(':image_IN', $target_file);
        $stm->bindParam(":id_IN", $_POST['ID']);
        if ($stm->execute()) {
            header('location:../index.php?info=updated');
        } else {

            echo "something went wrong with image upload";
        }
    }
}


if (isset($action) && $action == "update") {


    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = "";
    }

    $sql2 = "UPDATE posts SET Category=:category_IN, Title=:title_IN , Content=:content_IN WHERE ID=:id_IN";

    $stm2 = $db->prepare($sql2);
    $stm2->bindParam(":category_IN", $_POST['category']);
    $stm2->bindParam("title_IN", $_POST['title']);
    $stm2->bindParam(":content_IN", $_POST['content']);
    $stm2->bindParam(":id_IN", $_POST['ID']);
    if ($stm2->execute()) {

        header("location:../index.php?info=updated");
    } else {
        echo "Något gick fel!";
        die();
    }
}


//echo $target_file;



#Variables
$date = date('Y-m-d'); //date('Y-m-d') returns current date in yyyy-mm-dd format

//Get the logged in admins username and userId from $_SESSION


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
    $postData = $stm->fetch();
    //print_r($postData);

    if (!$success) {
        echo "<h3>Något gick fel!</h3>";
        die();
    }

    ?>
    <form action="editPost.php?action=update" method="post" enctype="multipart/form-data">
        <?php//Readonly inputs may be changed to hidden
        ?>
        <input type="hidden" name="ID" value="<?= $_GET['id']; ?>" />
        <label for="date">Current date</label>
        <input type="text" name="date" readonly value="<?= $date ?>">
        <label for=author>Author</label>
        <input type="text" name="author" readonly value="<?= $_SESSION['username'] ?>"></input>
        <label for="userId">ID</label>
        <input type="text" name="userId" value="<?= $_SESSION['userId'] ?>"></input>
        <label for="category">Category</label>
        <input type="text" name="category" value="<?= $postData['Category']; ?>" placeholder="Category of blog post"></input>
        <label for="image">Image URL</label>
        <input type="file" name="imageToReplace"> </input>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= $postData['Title'];    ?>" placeholder="Title of blog post"></input>
        <label for="content">Content</label>
        <textarea name="content" id="" cols="30" rows="10" placeholder="Content of blog post.."><?= $postData['Content']; ?></textarea>
        <input type="submit" value="update" />
    </form>

</body>

</html>