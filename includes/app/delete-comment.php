<?php
require('../database/config.php');

if (isset($_POST['delete'])) {
    if (isAdmin($conn)) {

        $commentid = mysqli_real_escape_string($conn, $_POST['id']);
        $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $myid = mysqli_real_escape_string($conn, $_POST['userid']);

        $result = $conn->query("SELECT slug FROM posts WHERE id = '$post_id'");
        $row = $result->fetch_assoc();


        $slug_url = $row['slug'];
        $site_url  =  _SITE_URL;

        $sql = "DELETE FROM comments WHERE id=$commentid";
        if ($conn->query($sql) === TRUE) {
            header("Location: $site_url$slug_url");
        } else {
            header("Location: $site_url");
        }
    } else {


        $email = $_SESSION['email'];
        $getuserid = $conn->query("SELECT * FROM users WHERE email = '$email'");
        $row = $getuserid->fetch_assoc();
        if (!empty($row)) {
            $userid = $row['id'];
            echo $userid;
        }

        $commentid = mysqli_real_escape_string($conn, $_POST['id']);
        $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $myid = mysqli_real_escape_string($conn, $_POST['userid']);

        $result = $conn->query("SELECT slug FROM posts WHERE id = '$post_id'");
        $row = $result->fetch_assoc();


        $slug_url = $row['slug'];
        $site_url  =  _SITE_URL;

        $getuseridfromcomment = $conn->query("SELECT * FROM comments WHERE id = '$commentid'");
        $row = $getuseridfromcomment->fetch_assoc();
        if (!empty($row)) {
            $user = $row['userid'];
        }
        if ($userid == $user) {
            $sql = "DELETE FROM comments WHERE id=$commentid";
            if ($conn->query($sql) === TRUE) {
                header("Location: $site_url$slug_url");
            } else {
                header("Location: $site_url");
            }
        } else {
            header("Location: $site_url");
        }
    }
} else {

    header('Location: ' . _SITE_URL . '/error.php');
}
