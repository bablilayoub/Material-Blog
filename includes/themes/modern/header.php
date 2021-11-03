<?php

$sql = "UPDATE settings SET views = views+1";
if ($conn->query($sql) === TRUE) {
}
$slug_url = $_SERVER['PATH_INFO'];
?>
<?php
$check = $settings['status'];
$set = "close";
if ($check == $set) {
    header('Location: ' . _SITE_URL . '/maintenance.php');
} else {
?>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <?php
    // check page and get data
    $checkifpost = $conn->query("SELECT id FROM posts WHERE slug = '$slug_url'");
    $row = $checkifpost->fetch_assoc();
    $checkdata = $settings['show_description'];
    $set = "yes";
    if ($checkdata == $set) {
        if (!empty($row)) {
            $post_id = $row['id'];
            $postQuery = "SELECT * FROM posts WHERE id=$post_id";
            $runPQ = mysqli_query($conn, $postQuery);
            $posts = mysqli_fetch_assoc($runPQ);
    ?>
            <title><?php echo $settings['sitename']; ?> - <?php echo $posts['description']; ?></title>
        <?php
        } else {
        ?>
            <title><?php echo $settings['sitename']; ?> - <?php echo $settings['description']; ?></title>
        <?php
        }
    } else {
        if (!empty($row)) {
            $post_id = $row['id'];
            $postQuery = "SELECT * FROM posts WHERE id=$post_id";
            $runPQ = mysqli_query($conn, $postQuery);
            $posts = mysqli_fetch_assoc($runPQ);
        ?>
            <title><?php echo $settings['sitename']; ?> - <?php echo $posts['description']; ?></title>
        <?php
        } else {
        ?>
            <title><?php echo $settings['sitename']; ?></title>
    <?php
        }
    }
    ?>

    <meta name="description" content="<?php echo $settings['description']; ?>" />
    <meta name="keywords" content="<?php echo $settings['keywords']; ?>">
    <link rel="icon" href="<?php echo _SITE_URL ?>/<?php echo $settings['favicon']; ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="<?php echo _SITE_URL ?>/assets/theme/modern/css/fonts.css" />
    <!-- MDB -->
    <link rel="stylesheet" href="<?php echo _SITE_URL ?>/assets/theme/modern/css/mdb.min.css" />
    <script><?php echo $settings['js']; ?></script>
    <style><?php echo $settings['css']; ?></style>
</head>