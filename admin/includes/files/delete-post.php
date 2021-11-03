<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query1 = "DELETE FROM posts WHERE id=$id";
        mysqli_query($conn, $query1);

        $query = "DELETE FROM images WHERE post_id=$id";
        mysqli_query($conn, $query);

        $query = "DELETE FROM comments WHERE post_id=$id";
        mysqli_query($conn, $query);

        header('location:/admin/manage-posts.php');
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
