<?php
include('../../../includes/database/config.php');
if (isAdmin($conn)) {
    if (isset($_POST['edit_ad'])) {

        $id = mysqli_real_escape_string($conn, $_POST['ad_id']);
        $ad_name = mysqli_real_escape_string($conn, $_POST['ad_name']);
        $ad_code = mysqli_real_escape_string($conn, $_POST['ad_code']);
        $enable_ad = mysqli_real_escape_string($conn, $_POST['enable_ad']);

        $sql = "UPDATE ads SET
        name = '$ad_name',
        code = '$ad_code',
        status = '$enable_ad' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header('location: /admin/manage-ads.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
