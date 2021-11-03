<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM contacts WHERE id=$id";
        mysqli_query($conn, $query);

        header('location:/admin/messages.php');
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
