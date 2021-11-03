<?php
include('../../../includes/database/config.php');

if (isAdmin($conn)) {
    // check if post = update
    if (isset($_POST['update'])) {
        // get data from the form 
        $website_name = mysqli_real_escape_string($conn, $_POST['website_name']);
        $website_url = mysqli_real_escape_string($conn, $_POST['website_url']);
        $description = mysqli_real_escape_string($conn, $_POST['website_description']);
        $keywords = mysqli_real_escape_string($conn, $_POST['website_keywords']);
        $website_theme = mysqli_real_escape_string($conn, $_POST['website_theme']);
        $interface = mysqli_real_escape_string($conn, $_POST['interface']);
        $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
        $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
        $youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
        $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
        $github = mysqli_real_escape_string($conn, $_POST['github']);
        $post_per_page = mysqli_real_escape_string($conn, $_POST['post_per_page']);
        $signup = mysqli_real_escape_string($conn, $_POST['signup']);
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $website_email = mysqli_real_escape_string($conn, $_POST['website_email']);
        $show_description = mysqli_real_escape_string($conn, $_POST['show_description']);
        $related_limit = mysqli_real_escape_string($conn, $_POST['related_limit']);
        $enable_related = mysqli_real_escape_string($conn, $_POST['enable_related']);
        $image = $_FILES["image"];
        $favicon = $_FILES["favicon"];

        // check if is there any image selec
        if (!empty($_FILES["image"]["tmp_name"])) {

            $fileinfo = PATHINFO($_FILES["image"]["name"]);
            $newFilename = $fileinfo['filename'] . "_" . time() . "." . $fileinfo['extension'];
            move_uploaded_file($_FILES["image"]["tmp_name"], "../../../assets/images/upload/" . $newFilename);
            $location = "assets/images/upload/" . $newFilename;
            $sql = "UPDATE settings SET 
            sitename = '$website_name',
            url = '$website_url',
            description = '$description',
            keywords = '$keywords',
            logo = '$location',
            theme = '$website_theme',
            interface = '$interface',
            enable_related = '$enable_related',
            related_limit = '$related_limit' + 1,
            facebook = '$facebook',
            instagram = '$instagram',
            youtube = '$youtube',
            twitter = '$twitter',
            github = '$github',
            post_per_page = '$post_per_page',
            signup = '$signup',
            status = '$status',
            comments = '$comments',
            show_description = '$show_description',
            website_email = '$website_email'";

            if ($conn->query($sql) === TRUE) {
                header('location: /admin/settings.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }


        if (!empty($_FILES["favicon"]["tmp_name"])) {

            $fileinfo_fav = PATHINFO($_FILES["favicon"]["name"]);
            $newFilename_fav = $fileinfo_fav['filename'] . "_" . time() . "." . $fileinfo_fav['extension'];
            move_uploaded_file($_FILES["favicon"]["tmp_name"], "../../../assets/images/upload/" . $newFilename_fav);
            $location_fav = "assets/images/upload/" . $newFilename_fav;

            $sql = "UPDATE settings SET 
            sitename = '$website_name',
            url = '$website_url',
            description = '$description',
            keywords = '$keywords',
            favicon = '$location_fav',
            theme = '$website_theme',
            interface = '$interface',
            enable_related = '$enable_related',
            related_limit = '$related_limit' + 1,
            facebook = '$facebook',
            instagram = '$instagram',
            youtube = '$youtube',
            twitter = '$twitter',
            github = '$github',
            post_per_page = '$post_per_page',
            signup = '$signup',
            status = '$status',
            comments = '$comments',
            show_description = '$show_description',
            website_email = '$website_email'";

            if ($conn->query($sql) === TRUE) {
                header('location: /admin/settings.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            $sql = "UPDATE settings SET 
            sitename = '$website_name',
            url = '$website_url',
            description = '$description',
            keywords = '$keywords',
            theme = '$website_theme',
            interface = '$interface',
            enable_related = '$enable_related',
            related_limit = '$related_limit' + 1,
            facebook = '$facebook',
            instagram = '$instagram',
            youtube = '$youtube',
            twitter = '$twitter',
            github = '$github',
            post_per_page = '$post_per_page',
            signup = '$signup',
            status = '$status',
            comments = '$comments',
            show_description = '$show_description',
            website_email = '$website_email'";

            if ($conn->query($sql) === TRUE) {
                header('location: /admin/settings.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } elseif (isset($_POST['design'])) {

        $css = mysqli_real_escape_string($conn, $_POST['css']);
        $js = mysqli_real_escape_string($conn, $_POST['js']);
        $analytics = mysqli_real_escape_string($conn, $_POST['analytics']);

        $sql = "UPDATE settings SET 
        js = '$js',
        css = '$css',
        analytics = '$analytics'";

        if ($conn->query($sql) === TRUE) {
            header('location: /admin/design.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }

    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {

    header('Location: ' . _SITE_URL . '/error.php');
}
