<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM menus WHERE id=$id";
        mysqli_query($conn, $query);
        $query = "DELETE FROM submenus WHERE parent_menu_id=$id";
        mysqli_query($conn, $query);
        header('location:/admin/menus.php');
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
