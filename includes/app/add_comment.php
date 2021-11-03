<?php
require('../database/config.php');

if (isset($_POST['addcomment'])) {

    $email = $_SESSION['email'];

    $getimagebyemail = $conn->query("SELECT image FROM users WHERE email = '$email'");
    $row = $getimagebyemail->fetch_assoc();
    if (!empty($row)) {
        $image = $row['image'];
    }

    $post_id = $_POST['post_id'];

    $result = $conn->query("SELECT slug FROM posts WHERE id = '$post_id'");
    $row = $result->fetch_assoc();

    $slug_url = $row['slug'];
    $site_url  =  _SITE_URL;

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $query = "INSERT INTO comments(comment,name,image,post_id,userid) VALUES('$comment','$name','$image','$post_id',$userid)";
    if (mysqli_query($conn, $query)) {
        header("Location: $site_url$slug_url");
    } else {
        echo "comment is not addedd !";
    }
} else {

    header('Location: ' . _SITE_URL . '/error.php');
}
