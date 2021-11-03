<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_POST['addmenu'])) {
        $menu_name = mysqli_real_escape_string($conn, $_POST['menu-name']);
        $menu_link = mysqli_real_escape_string($conn, $_POST['menu-link']);
        $custom = mysqli_real_escape_string($conn, $_POST['menu-category']);
        $menu_page = mysqli_real_escape_string($conn, $_POST['menu-page']);
        $menu_page = mysqli_real_escape_string($conn, $_POST['menu-page']);
        $zero = "0";
        $empty = "";

        if ($menu_name == $empty && $menu_link == $empty && $custom == $zero && $menu_page == $zero) {
            header('location: /admin/menus.php');
        } else {
            if ($custom == $zero && $menu_page == $zero) {
                $query = "INSERT INTO menus(name,action) VALUES('$menu_name','$menu_link')";
                mysqli_query($conn, $query);
                header('location: /admin/menus.php');
            } else {
                $result = $conn->query("SELECT * FROM categories WHERE id = '$custom'");
                $row = $result->fetch_assoc();
                if (!empty($row)) {
                    $name = $row['name'];
                    $link = $row['slug'];
                }
                $result2 = $conn->query("SELECT * FROM pages WHERE id = '$menu_page'");
                $row2 = $result2->fetch_assoc();
                if (!empty($row2)) {
                    $page_name = $row2['name'];
                    $page_link = $row2['slug'];
                }
                if ($menu_name == $empty && $menu_page == $zero) {
                    $query = "INSERT INTO menus(name,action) VALUES('$name','/category$link')";
                    mysqli_query($conn, $query);
                    header('location: /admin/menus.php');
                } else {
                    if ($menu_link == $empty && $menu_page == $zero) {
                        $query = "INSERT INTO menus(name,action) VALUES('$menu_name','/category$link')";
                        mysqli_query($conn, $query);
                        header('location: /admin/menus.php');
                    } else {
                        if ($menu_link != $empty && $menu_name != $empty && $custom != $zero && $menu_page != $zero) {
                            header('location: /admin/menus.php');
                        } else {
                            if ($menu_name == $empty && $custom == $zero) {
                                $query = "INSERT INTO menus(name,action) VALUES('$page_name','/page$page_link')";
                                mysqli_query($conn, $query);
                                header('location: /admin/menus.php');
                            } else {
                                if ($menu_link == $empty && $custom == $zero) {
                                    $query = "INSERT INTO menus(name,action) VALUES('$menu_name','/page$page_link')";
                                    mysqli_query($conn, $query);
                                    header('location: /admin/menus.php');
                                } else {
                                    header('Location: ' . _SITE_URL . '/error.php');
                                }
                            }
                        }
                    }
                }
            }
        }
    } elseif (isset($_POST['addsubmenu'])) {
        $menu_name = mysqli_real_escape_string($conn, $_POST['submenu-name']);
        $parent_id = mysqli_real_escape_string($conn, $_POST['parent-id']);
        $menu_link = mysqli_real_escape_string($conn, $_POST['submenu-link']);
        $custom = mysqli_real_escape_string($conn, $_POST['submenu-category']);
        $menu_page = mysqli_real_escape_string($conn, $_POST['menu-page']);
        $zero = "0";
        $empty = "";
        if ($menu_name == $empty && $menu_link == $empty && $custom == $zero && $menu_page == $zero) {
            header('location: /admin/menus.php');
        } else {

            if ($custom == $zero && $menu_page == $zero) {
                $query = "INSERT INTO submenus(name,action,parent_menu_id) VALUES('$menu_name','$menu_link',$parent_id)";
                mysqli_query($conn, $query);
                header('location: /admin/menus.php');
            } else {
                $result = $conn->query("SELECT * FROM categories WHERE id = '$custom'");
                $row = $result->fetch_assoc();
                if (!empty($row)) {
                    $name = $row['name'];
                    $link = $row['slug'];
                }
                $result2 = $conn->query("SELECT * FROM pages WHERE id = '$menu_page'");
                $row2 = $result2->fetch_assoc();
                if (!empty($row2)) {
                    $page_name = $row2['name'];
                    $page_link = $row2['slug'];
                }
                if ($menu_name == $empty && $menu_page == $zero) {
                    $query = "INSERT INTO submenus(name,action,parent_menu_id) VALUES('$name','/category$link',$parent_id)";
                    mysqli_query($conn, $query);
                    header('location: /admin/menus.php');
                } else {
                    if ($menu_link == $empty && $menu_page == $zero) {
                        $query = "INSERT INTO submenus(name,action,parent_menu_id) VALUES('$menu_name','/category$link',$parent_id)";
                        mysqli_query($conn, $query);
                        header('location: /admin/menus.php');
                    } else {
                        if ($menu_link != $empty && $menu_name != $empty && $custom != $zero && $menu_page == $zero) {
                            header('location: /admin/menus.php');
                        } else {
                            if ($menu_name == $empty && $custom == $zero) {
                                $query = "INSERT INTO submenus(name,action,parent_menu_id) VALUES('$page_name','/page$page_link',$parent_id)";
                                mysqli_query($conn, $query);
                                header('location: /admin/menus.php');
                            } else {
                                if ($menu_link == $empty && $custom == $zero) {
                                    $query = "INSERT INTO submenus(name,action,parent_menu_id) VALUES('$menu_name','/page$page_link',$parent_id)";
                                    mysqli_query($conn, $query);
                                    header('location: /admin/menus.php');
                                } else {
                                    header('Location: ' . _SITE_URL . '/error.php');
                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
}
