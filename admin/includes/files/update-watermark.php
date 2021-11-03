<?php
include('../../../includes/database/config.php');

if (isAdmin($conn)) {
    if (isset($_POST['update'])) {

        $plugin_name = mysqli_real_escape_string($conn, $_POST['plugin_name']);
        $plugin_token = mysqli_real_escape_string($conn, $_POST['plugin_token']);
        $enabled = mysqli_real_escape_string($conn, $_POST['enabled']);
        $place = mysqli_real_escape_string($conn, $_POST['place']);

        if (!empty($_FILES["image"]["tmp_name"])) {
            $fileinfo = PATHINFO($_FILES["image"]["name"]);
            $newFilename = $fileinfo['filename'] . "_" . time() . "." . $fileinfo['extension'];
            move_uploaded_file($_FILES["image"]["tmp_name"], "../../../assets/images/plugins/" . $newFilename);
            $location = "assets/images/plugins/" . $newFilename;

            $sql = "UPDATE plugins SET 
            name = '$plugin_name',
            status = '$enabled',
            place = '$place',
            watermark = '$location' WHERE token='$plugin_token'";
        } else {
            $sql = "UPDATE plugins SET 
            name = '$plugin_name',
            status = '$enabled',
            place = '$place' WHERE token='$plugin_token'";
        }

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
