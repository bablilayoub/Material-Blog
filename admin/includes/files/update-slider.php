<?php
include('../../../includes/database/config.php');

if (isAdmin($conn)) {
    if (isset($_POST['update'])) {

        $plugin_name = mysqli_real_escape_string($conn, $_POST['plugin_name']);
        $plugin_token = mysqli_real_escape_string($conn, $_POST['plugin_token']);
        $enable_slider = mysqli_real_escape_string($conn, $_POST['enable_slider']);
        $slider_category = mysqli_real_escape_string($conn, $_POST['slider_category']);
        $other_pages = mysqli_real_escape_string($conn, $_POST['other_pages']);
        $post_page = mysqli_real_escape_string($conn, $_POST['post_page']);

        $sql = "UPDATE plugins SET 
        name = '$plugin_name',
        status = '$enable_slider',
        category = '$slider_category',
        post_page = '$post_page',
        other_pages = '$other_pages' WHERE token='$plugin_token'";

        if ($conn->query($sql) === TRUE) {
            header('location: /admin/plugins.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {

    header('Location: ' . _SITE_URL . '/error.php');
}
