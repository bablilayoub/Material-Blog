<?php
include('../database/config.php');
if (isLogged()) {
    if (isset($_POST['update'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
        $about = mysqli_real_escape_string($conn, $_POST['about']);
        $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
        $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
        $youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
        $image = $_FILES["image"];
        echo $image;
        echo $id;

        if (!empty($_FILES["image"]["tmp_name"])) {
            $fileinfo = PATHINFO($_FILES["image"]["name"]);
            $newFilename = $fileinfo['filename'] . "_" . time() . "." . $fileinfo['extension'];
            move_uploaded_file($_FILES["image"]["tmp_name"], "../../assets/images/upload/" . $newFilename);
            $location = "assets/images/upload/" . $newFilename;

            $sql = "UPDATE users SET
            firstname = '$firstname',
            lastname = '$lastname',
            email = '$email',
            mobilenumber = '$mobilenumber',
            about = '$about',
            facebook = '$facebook',
            instagram = '$instagram',
            youtube = '$youtube',
            image = '$location' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                header('location: /profile.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            $sql = "UPDATE users SET
            firstname = '$firstname',
            lastname = '$lastname',
            email = '$email',
            mobilenumber = '$mobilenumber',
            about = '$about',
            facebook = '$facebook',
            instagram = '$instagram',
            youtube = '$youtube' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                header('location: /profile.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {

        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {

    header('Location: ' . _SITE_URL . '/error.php');
}
