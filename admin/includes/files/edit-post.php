<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_POST['editpost'])) {

        $id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $post_titel = mysqli_real_escape_string($conn, $_POST['post_titel']);
        $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
        $post_description = mysqli_real_escape_string($conn, $_POST['post_description']);
        $post_category = mysqli_real_escape_string($conn, $_POST['post_category']);
        $post_category = mysqli_real_escape_string($conn, $_POST['post_category']);
        $status = 1;

        $sql = "UPDATE posts SET
        title = '$post_titel',
        category_id = '$post_category',
        description = '$post_description',
        status = '$status',
        content = '$post_content' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header('location: /admin/manage-posts.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif (isset($_POST['savedraft'])) {

        $id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $post_titel = mysqli_real_escape_string($conn, $_POST['post_titel']);
        $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
        $post_description = mysqli_real_escape_string($conn, $_POST['post_description']);
        $post_category = mysqli_real_escape_string($conn, $_POST['post_category']);
        $post_category = mysqli_real_escape_string($conn, $_POST['post_category']);
        $status = 0;

        $sql = "UPDATE posts SET
        title = '$post_titel',
        category_id = '$post_category',
        description = '$post_description',
        status = '$status',
        content = '$post_content' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header('location: /admin/manage-posts.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
