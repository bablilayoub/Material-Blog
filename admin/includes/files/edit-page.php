<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_POST['editpage'])) {

        $id = mysqli_real_escape_string($conn, $_POST['page_id']);
        $page_titel = mysqli_real_escape_string($conn, $_POST['page_titel']);
        $page_content = mysqli_real_escape_string($conn, $_POST['page_content']);
        $page_description = mysqli_real_escape_string($conn, $_POST['page_description']);

        $sql = "UPDATE pages SET
        name = '$page_titel',
        description = '$page_description',
        content = '$page_content' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header('location: /admin/manage-pages.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
