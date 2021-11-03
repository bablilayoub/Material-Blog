<?php


// check if user logggedin
function isLogged()
{

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    return true;
  } else {
    return false;
  }
}


// get settings
function getSettings($conn)
{
  $query = "SELECT * FROM settings";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data;
}

// get categories by slug
function getCategories($conn, $id)
{
  $query = "SELECT * FROM categories WHERE id=$id";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data;
}

// get pages by slug
function getPages($conn, $id)
{
  $query = "SELECT * FROM pages WHERE id=$id";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data;
}

// get post image
function getPostThumb($conn, $id)
{
  $query = "SELECT * FROM images WHERE post_id=$id";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data['image'];
}

// get number of pages
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}


// get post slug
function get_post_slug($connect, $id)
{
  $sentence = $connect->prepare("SELECT slug FROM posts WHERE id = $id");
  $sentence->execute();
  $row = $sentence->fetch(PDO::FETCH_ASSOC);
  return $row[0];
}

function getSliderStatus($conn)
{
  $token_slider = 59784613256;
  $sql_slider = "SELECT * FROM plugins WHERE token = $token_slider";
  $run = mysqli_query($conn, $sql_slider);
  $data = mysqli_fetch_assoc($run);
  return $data;
}

function getads($conn, $id)
{
  $sql_ads = "SELECT * FROM ads WHERE id = $id";
  $run = mysqli_query($conn, $sql_ads);
  $data = mysqli_fetch_assoc($run);
  return $data;
}

function slugify($text, string $string = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $string, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $string);

  // remove duplicate divider
  $text = preg_replace('~-+~', $string, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

// get category
function getCategory($conn, $id)
{
  $query = "SELECT * FROM categories WHERE id=$id";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data['name'];
}

// get category
function getCategorySlug($conn, $id)
{
  $query = "SELECT * FROM categories WHERE id=$id";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data['slug'];
}

// get all categories
function getAllCategory($conn)
{
  $query = "SELECT * FROM categories";
  $run = mysqli_query($conn, $query);
  $data = array();
  while ($d = mysqli_fetch_assoc($run)) {
    $data[] = $d;
  }
  return $data;
}

// get all categories
function getAllPagesToMenus($conn)
{
  $query = "SELECT * FROM pages";
  $run = mysqli_query($conn, $query);
  $data = array();
  while ($d = mysqli_fetch_assoc($run)) {
    $data[] = $d;
  }
  return $data;
}

// get all categories
function getAllpagesAs($conn)
{
  $query = "SELECT * FROM pages";
  $run = mysqli_query($conn, $query);
  $data = array();
  while ($d = mysqli_fetch_assoc($run)) {
    $data[] = $d;
  }
  return $data;
}


// get category
function getPostPerPage($conn)
{

  $query = "SELECT post_per_page FROM settings";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data['post_per_page'];
}

// get User Data
function getUserData($conn, $id)
{
  $query = "SELECT * FROM users WHERE id=$id";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data;
}


// get settings
function getFromPost($conn, $id)
{
  $query = "SELECT * FROM posts WHERE id=$id";
  $run = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run);
  return $data;
}


// get thumbnails
function getThumbnail($conn, $post_id)
{

  $query = "SELECT * FROM images WHERE post_id=$post_id";
  $run = mysqli_query($conn, $query);
  $data = array();

  while ($d = mysqli_fetch_assoc($run)) {
    $data[] = $d;
  }
  return $data;
}

// get thumbnails
function getSliders($conn, $category_id)
{
  $status = 1;
  $query = "SELECT * FROM posts WHERE category_id=$category_id AND status=$status";
  $run = mysqli_query($conn, $query);
  $data = array();

  while ($d = mysqli_fetch_assoc($run)) {
    $data[] = $d;
  }
  return $data;
}

// get thumbnails
function getSlidersFromAllPosts($conn)
{
  $status = 1;
  $query = "SELECT * FROM posts WHERE status=$status";
  $run = mysqli_query($conn, $query);
  $data = array();

  while ($d = mysqli_fetch_assoc($run)) {
    $data[] = $d;
  }
  return $data;
}

// get submenus
function getSubMenu($conn, $menu_id)
{
  $query = "SELECT * FROM submenus WHERE parent_menu_id=$menu_id";
  $run = mysqli_query($conn, $query);
  $data = array();

  while ($d = mysqli_fetch_assoc($run)) {
    $data[] = $d;
  }
  return $data;
}

// get submenus numbers
function getSubMenuNo($conn, $menu_id)
{
  $query = "SELECT * FROM submenus WHERE parent_menu_id=$menu_id";
  $run = mysqli_query($conn, $query);
  return mysqli_num_rows($run);
}

// get comments
function getComments($conn, $post_id)
{
  $query = "SELECT * FROM comments WHERE post_id=$post_id ORDER BY id DESC";
  $run = mysqli_query($conn, $query);
  $data = array();

  while ($d = mysqli_fetch_assoc($run)) {
    $data[] = $d;
  }
  return $data;
}


// get current url
function getCurrentUrl()
{

  $url = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

  return $url;
}

// get full url
function getFullUrl()
{

  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  return htmlspecialchars($url);
}

// convet htmlchar
function echoOutput($data)
{
  $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
  return $data;
}

// check if user admin
function isAdmin($connect)
{

  $emailSession = filter_var(strtolower($_SESSION['email']), FILTER_SANITIZE_STRING);

  $sentence = $connect->prepare("SELECT * FROM users WHERE email = '" . $emailSession . "' AND isAdmin = 1 LIMIT 1");
  $sentence->execute();
  $row = $sentence->fetch();

  if ($row) {

    return true;
  } else {

    return false;
  }
}
