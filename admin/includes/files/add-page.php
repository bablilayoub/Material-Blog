<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_POST['addpage'])) {
        $page_title = mysqli_real_escape_string($conn, $_POST['page_title']);
        $page_slug = mysqli_real_escape_string($conn, $_POST['page_slug']);
        $page_description = mysqli_real_escape_string($conn, $_POST['page_description']);
        $page_content = mysqli_real_escape_string($conn, $_POST['page_content']);
        $empty = "";

        if ($page_slug == $empty) {
            $page_slug = slugify($page_title);
            $query = "INSERT INTO pages (name,content,description,slug) VALUES('$page_title','$page_content','$page_description','/$page_slug')";
            $run = mysqli_query($conn, $query);
            header('location:/admin/manage-pages.php');
        } else {
            if ($page_slug != $empty) {
                $slug = slugify($page_slug);
                $query = "INSERT INTO pages (name,content,description,slug) VALUES('$page_title','$page_content','$page_description','/$slug')";
                $run = mysqli_query($conn, $query);
                header('location:/admin/manage-pages.php');
            }
        }
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
