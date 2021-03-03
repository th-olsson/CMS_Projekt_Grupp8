<?php
$upload_dir = "uploads/";
$target_file = $upload_dir . basename($_FILES['imageToUpload']['name']); //function basename helps in creating the format required for different OS
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['imageToUpload']['tmp_name']);
    if ($check == false) {
        echo "the file is not an image";
        die();
    }
}

if (file_exists($target_file)) {
    echo "The file already exist";
    die();
}

if ($_FILES['imageToUpload']['size'] > 1000000) {
    echo "The file size is too big";
    die();
}

if ($fileType !== "png" && $fileType !== "gif" && $fileType !== "jpg" && $fileType !== "jpeg") {

    echo "you can only upload png, , gif, jpg & jpeg format";
    die();
}


?>




<?php
if (move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target_file)) {
    #Variables



    $date = $_POST['date'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $image = $_POST['imageToUpload'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = $_POST['userId'];

    #Database connection
    include("../includes/database.php");

    //SQL - insert data from $_POST to posts-table
    $sql = 'INSERT INTO posts (Date, UserID, Category,  Image, Title, Content) VALUES (:date_IN, :userId_IN, :category_IN, :image_IN, :title_IN, :content_IN)';

    $stm = $db->prepare($sql);
    $stm->bindParam(':date_IN', $date);
    $stm->bindParam(':userId_IN', $userId);
    $stm->bindParam(':category_IN', $category);
    $stm->bindParam(':image_IN', $target_file);
    $stm->bindParam(':title_IN', $title);
    $stm->bindParam(':content_IN', $content);

    if ($stm->execute()) {
        echo "your data has been successfully added to the database";
        echo '<a href="post.php">go back</a>';
    } else {
        echo "something went wrong with data-uploading in database";
        echo '<a href="post.php">go back</a>';
    }
} else {
    echo "Something went wrong with image upload!";
}
