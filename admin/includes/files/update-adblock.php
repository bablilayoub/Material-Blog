<?php
include('../../../includes/database/config.php');

if (isAdmin($conn)) {
    if (isset($_POST['update'])) {

        $plugin_name = mysqli_real_escape_string($conn, $_POST['plugin_name']);
        $plugin_token = mysqli_real_escape_string($conn, $_POST['plugin_token']);
        $plugin_titel = mysqli_real_escape_string($conn, $_POST['plugin_titel']);
        $plugin_description = mysqli_real_escape_string($conn, $_POST['plugin_description']);
        $enabled = mysqli_real_escape_string($conn, $_POST['enabled']);
        $forwhow = mysqli_real_escape_string($conn, $_POST['forwhow']);

        $sql = "UPDATE plugins SET 
        name = '$plugin_name',
        status = '$enabled',
        title = '$plugin_titel',
        description = '$plugin_description',
        forwhow = '$forwhow' WHERE token='$plugin_token'";

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
