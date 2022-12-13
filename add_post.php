<?php
ini_set('display_errors', 1);
error_reporting(~0);
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $categories = $_POST["categories"];
    
    $sql = "INSERT INTO post (title, details) VALUES ('$title', '$description')";
    $result = mysqli_query($con, $sql);
    
    $post_id = mysqli_insert_id($con);
    
    foreach($categories as $category) {
        echo $category;
        $sql = "INSERT INTO post_category (post_id, category_id) VALUES ($post_id, $category)";
        $result = mysqli_query($con, $sql);
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <style>
        input {
            margin: 5px;
        }
    </style>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Post title">
        <br>
        <textarea type="text" name="description" placeholder="Post description"></textarea>
        <br>
        <select multiple name="categories[]" id="categories" placeholder="Select categories">
            <option value="1">أخبار</option>
            <option value="2">رياضة</option>
            <option value="3">معلومات</option>
        </select>
        <br>
        <input type="submit" name="submit" value="Add Post">
    </form>
</body>

</html>