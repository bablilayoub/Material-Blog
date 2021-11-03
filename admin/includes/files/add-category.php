<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_POST['addct'])) {
        $category_name = mysqli_real_escape_string($conn, $_POST['category-name']);
        $description = mysqli_real_escape_string($conn, $_POST['category-description']);
        $slug = slugify($category_name);
        $query = "INSERT INTO categories(name, slug, description) VALUES('$category_name', '/$slug', '$description')";
        mysqli_query($conn, $query);
        header('location:/admin/categories.php');
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
