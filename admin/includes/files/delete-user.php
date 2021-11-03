<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query1 = "DELETE FROM users WHERE id=$id";
        mysqli_query($conn, $query1);

        header('location:/admin/users.php');
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
