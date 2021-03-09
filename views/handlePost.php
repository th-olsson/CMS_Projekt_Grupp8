<?php
#Database connection
include("../includes/database.php");

#If image input is set, insert all values to database
if (isset($_FILES['imageToUpload'])) {
    $upload_dir = "uploads/";
    $target_file = $upload_dir . basename($_FILES['imageToUpload']['name']); //function basename helps in creating the format required for different OS
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['imageToUpload']['tmp_name']);
        if ($check == false) {
            header('location:post.php?error=the file is not an image');
            die();
        }
    }

    if (file_exists($target_file) && $target_file !== "uploads/") {
        header('location:post.php?error=The file already exist');
        die();
    }

    if ($_FILES['imageToUpload']['size'] > 1000000) {
        header('location:post.php?error=The file size is too big');
        die();
    }

    if ($fileType !== "png" && $fileType !== "gif" && $fileType !== "jpg" && $fileType !== "jpeg" && $target_file !== "uploads/") {
        header('location:post.php?error=you can only upload png, gif, jpg & jpeg format');
        die();
    }

    #If Image isn't set, insert all other values to database
    if ($target_file == "uploads/") {
        #Variables from $_POST
        $date = $_POST['date'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $userId = $_POST['userId'];
    
        //SQL - insert data from $_POST to posts-table
        $sql = 'INSERT INTO posts (Date, UserID, Category, Title, Content) VALUES (:date_IN, :userId_IN, :category_IN, :title_IN, :content_IN)';
    
        $stm = $db->prepare($sql);
        $stm->bindParam(':date_IN', $date);
        $stm->bindParam(':userId_IN', $userId);
        $stm->bindParam(':category_IN', $category);
        $stm->bindParam(':title_IN', $title);
        $stm->bindParam(':content_IN', $content);
    
        if ($stm->execute()) {
            echo "your data has been successfully added to the database";
            header('location:../index.php');
            echo '<a href="post.php">go back</a>';
        } else {
            echo "something went wrong with data-uploading in database";
            echo '<a href="post.php">go back</a>';
        }
    }

    if (move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target_file)) {

        #Variable
        $date = $_POST['date'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $userId = $_POST['userId'];

        //SQL - insert data from $_POST to posts-table
        $sql = 'INSERT INTO posts (Date, UserID, Category, Image, Title, Content) VALUES (:date_IN, :userId_IN, :category_IN, :image_IN, :title_IN, :content_IN)';

        $stm = $db->prepare($sql);
        $stm->bindParam(':date_IN', $date);
        $stm->bindParam(':userId_IN', $userId);
        $stm->bindParam(':category_IN', $category);
        $stm->bindParam(':image_IN', $target_file);
        $stm->bindParam(':title_IN', $title);
        $stm->bindParam(':content_IN', $content);

        if ($stm->execute()) {
            echo "your data has been successfully added to the database";
            header('location:../index.php');
            echo '<a href="post.php">go back</a>';
        } else {
            echo "something went wrong with data-uploading in database";
            echo '<a href="post.php">go back</a>';
        }
    }
//If Image isn't set, insert all other values to database
} else {
    echo "something went wrong with data-uploading in database";
    echo '<a href="post.php">go back</a>';
}
?>