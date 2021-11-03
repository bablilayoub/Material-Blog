<?php

// get total posts
function number_posts($conn, $query)
{
    $query = "SELECT * FROM posts";
    $run = mysqli_query($conn, $query);
    $total = mysqli_num_rows($run);
    return $total;
}

// get User Data
function getUserId($conn, $emailSession)
{
    $emailSession = filter_var(strtolower($_SESSION['email']), FILTER_SANITIZE_STRING);
    $query = "SELECT * FROM users WHERE email = '" . $emailSession . "'";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data;
}


// get settings
function getPlugins($conn, $id)
{
    $query = "SELECT * FROM plugins WHERE id=$id";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data;
}

// get total comments
function number_comments($conn, $query)
{
    $query = "SELECT * FROM comments";
    $run = mysqli_query($conn, $query);
    $total = mysqli_num_rows($run);
    return $total;
}

// get posts of last 3 days
function number_posts_week($conn, $query)
{
    $query = "SELECT * FROM posts WHERE created_at> now() -  interval 3 day;";
    $run = mysqli_query($conn, $query);
    $total = mysqli_num_rows($run);
    return $total;
}

// get comments of last 3 days 
function number_comments_week($conn, $query)
{
    $query = "SELECT * FROM comments WHERE created_at> now() -  interval 3 day;";
    $run = mysqli_query($conn, $query);
    $total = mysqli_num_rows($run);
    return $total;
}

// get total views
function views($conn, $query)
{
    $query = "SELECT views FROM settings";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data["views"];
}

// get total users
function number_users($conn, $query)
{
    $query = "SELECT * FROM users";
    $run = mysqli_query($conn, $query);
    $total = mysqli_num_rows($run);
    return $total;
}

// get post for table
function getAllPost($conn, $limit)
{
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $query = "SELECT * FROM posts ORDER BY id DESC LIMIT $start_from, $limit";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}

// get contact for table
function getAllContacts($conn, $limit)
{
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $query = "SELECT * FROM contacts ORDER BY id DESC LIMIT $start_from, $limit";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}

// get ads for table
function getAllAds($conn, $limit)
{
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $query = "SELECT * FROM ads ORDER BY id DESC LIMIT $start_from, $limit";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}

// get pages for table
function getAllPages($conn, $limit)
{
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $query = "SELECT * FROM pages ORDER BY id DESC LIMIT $start_from, $limit";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}


// get User Data For Edit Page
function getPageData($conn, $id)
{
    $query = "SELECT * FROM pages WHERE id=$id";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data;
}

// get User Data For Edit Page
function getPluginData($conn, $id)
{
    $query = "SELECT * FROM plugins WHERE id=$id";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data;
}

// get User Data For Edit Page
function getPostData($conn, $id)
{
    $query = "SELECT * FROM posts WHERE id=$id";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data;
}

// get User Data For Edit Page
function getAdData($conn, $id)
{
    $query = "SELECT * FROM ads WHERE id=$id";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data;
}

// get All coments
function getAllComments($conn, $limit)
{
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $query = "SELECT * FROM Comments ORDER BY id DESC LIMIT $start_from, $limit";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}

// get settings
function getUserAllInfo($conn, $email)
{
  $query = "SELECT * FROM users WHERE email='$email'";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data;
}

// get All users
function getAllUsers($conn, $limit)
{
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $query = "SELECT * FROM users ORDER BY id DESC LIMIT $start_from, $limit";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}

// get All Plugins
function getAllPlugins($conn, $limit)
{
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $query = "SELECT * FROM plugins ORDER BY id DESC LIMIT $start_from, $limit";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}

// get menus names
function getMenuName($conn, $id)
{
    $query = "SELECT * FROM menus WHERE id=$id";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data['name'];
}


// search on table
function filterTable($conn, $query)
{
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

// get menus names
function getPostName($conn, $id)
{
    $query = "SELECT * FROM posts WHERE id=$id";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data['title'];
}

// get sub menus
function getAllSubMenu($conn)
{
    $query = "SELECT * FROM submenus";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}

// get all menus
function getAllMenu($conn)
{
    $query = "SELECT * FROM menus";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}

// get single menu
function getMenu($conn)
{
    $query = "SELECT * FROM menus ORDER BY id DESC";
    $run = mysqli_query($conn, $query);
    $data = array();

    while ($d = mysqli_fetch_assoc($run)) {
        $data[] = $d;
    }
    return $data;
}
