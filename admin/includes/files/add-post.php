<?php
include('../../../includes/database/config.php');

if (isAdmin($conn)) {
    if (isset($_POST['addpost'])) {

        $token = 8741941626541;
        $sql = "SELECT * FROM plugins WHERE token = $token";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $status_watermark = $row['status'];
                $watermark_file = $row['watermark'];
                $place = $row['place'];
            }
        }

        $backend = "../../../";
        $targetDir = "../../../assets/images/upload/";
        $watermarkImagePath = $backend . $watermark_file;

        $ptitle = mysqli_real_escape_string($conn, $_POST['post_title']);
        $pcontent = mysqli_real_escape_string($conn, $_POST['post_content']);
        $post_slug = mysqli_real_escape_string($conn, $_POST['post_slug']);
        $description = mysqli_real_escape_string($conn, $_POST['post_description']);
        $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
        $cid = $_POST['post_category'];
        $slug = slugify($ptitle);
        $status = 1;
        $empty = "";

        if ($post_slug == $empty) {
            $post_slug = slugify($ptitle);
            $query = "INSERT INTO posts (title,content,description,slug,category_id,publisher,status) VALUES('$ptitle','$pcontent','$description','/$post_slug','$cid','$publisher',$status)";
            $run = mysqli_query($conn, $query);
            $post_id = mysqli_insert_id($conn);
            $image_name = $_FILES['file']['name'];
            $img_tmp = $_FILES['file']['tmp_name'];
        } else {
            if ($post_slug != $empty) {
                $slug = slugify($post_slug);
                $query = "INSERT INTO posts (title,content,description,slug,category_id,publisher,status) VALUES('$ptitle','$pcontent','$description','/$slug','$cid','$publisher',$status)";
                $run = mysqli_query($conn, $query);
                $post_id = mysqli_insert_id($conn);
                $image_name = $_FILES['file']['name'];
                $img_tmp = $_FILES['file']['tmp_name'];
            }
        }

        if ($status_watermark == 1) {

            if (!empty($_FILES["file"]["name"])) {
                // File upload path
                $fileName = time() . '_' . basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg');
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to the server
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                        // Load the stamp and the photo to apply the watermark to
                        $watermarkImg = imagecreatefrompng($watermarkImagePath);
                        switch ($fileType) {
                            case 'jpg':
                                $im = imagecreatefromjpeg($targetFilePath);
                                break;
                            case 'jpeg':
                                $im = imagecreatefromjpeg($targetFilePath);
                                break;
                            case 'png':
                                $im = imagecreatefrompng($targetFilePath);
                                break;
                            default:
                                $im = imagecreatefromjpeg($targetFilePath);
                        }

                        // Set the margins for the watermark
                        $marge_right = 10;
                        $marge_bottom = 10;

                        // Get the height/width of the watermark image
                        if ($place == 1) {
                            $sx = imagesx($watermarkImg);
                            $sy = imagesy($watermarkImg);
                        } else {
                            if ($place == 2) {
                                $sx = imagesx($watermarkImg);
                                $sy = 280;
                            } else {
                                if ($place == 3) {
                                    $sx = 350;
                                    $sy = 150;
                                } else {
                                    if ($place == 4) {
                                        $sx = 570;
                                        $sy = imagesy($watermarkImg);
                                    } else {
                                        if ($place == 5) {
                                            $sx = 570;
                                            $sy = 280;
                                        }
                                    }
                                }
                            }
                        }
                        // Copy the watermark image onto our photo using the margin offsets and 
                        // the photo width to calculate the positioning of the watermark.
                        imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));

                        // Save image and free memory
                        imagepng($im, $targetFilePath);
                        imagedestroy($im);

                        $uploadedFileName = $fileName;
                        if (file_exists($targetFilePath)) {
                            $query = "INSERT INTO images (post_id,image) VALUES($post_id,'$targetFilePath')";
                            $run = mysqli_query($conn, $query);
                            if ($run) {
                                $statusMsg = '<p style="color: #07c707;">The image with watermark has been uploaded successfully.</p>';
                            } else {
                                $statusMsg = '<p style="color: #EA4335;"> Server Problem, please try again.</p>';
                            }
                        } else {
                            $statusMsg = '<p style="color: #EA4335;">Image upload failed, please try again.</p>';
                        }
                    } else {
                        $statusMsg = '<p style="color: #EA4335;">Sorry, there was an error uploading your file.</p>';
                    }
                } else {
                    $statusMsg = '<p style="color: #EA4335;">Sorry, only JPG, JPEG, and PNG files are allowed to upload.</p>';
                }

                header('location:/admin/manage-posts.php');
            }
        } else {

            foreach ($image_name as $index => $img) {
                if (move_uploaded_file($img_tmp[$index], "../../../assets/images/upload/$img")) {
                    $query = "INSERT INTO images (post_id,image) VALUES($post_id,'$img')";
                    $run = mysqli_query($conn, $query);
                }
            }
            header('location:/admin/manage-posts.php');
        }
    } elseif (isset($_POST['savedraft'])) {

        $token = 8741941626541;
        $sql = "SELECT * FROM plugins WHERE token = $token";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $status_watermark = $row['status'];
                $watermark_file = $row['watermark'];
            }
        }

        $backend = "../../../";
        $targetDir = "../../../assets/images/upload/";
        $watermarkImagePath = $backend . $watermark_file;

        $ptitle = mysqli_real_escape_string($conn, $_POST['post_title']);
        $pcontent = mysqli_real_escape_string($conn, $_POST['post_content']);
        $post_slug = mysqli_real_escape_string($conn, $_POST['post_slug']);
        $description = mysqli_real_escape_string($conn, $_POST['post_description']);
        $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
        $cid = $_POST['post_category'];
        $status = 0;
        $slug = slugify($ptitle);
        $empty = "";

        if ($post_slug == $empty) {
            $post_slug = slugify($ptitle);
            $query = "INSERT INTO posts (title,content,description,slug,category_id,publisher,status) VALUES('$ptitle','$pcontent','$description','/$post_slug','$cid','$publisher',$status)";
            $run = mysqli_query($conn, $query);
            $post_id = mysqli_insert_id($conn);
            $image_name = $_FILES['file']['name'];
            $img_tmp = $_FILES['file']['tmp_name'];
        } else {
            if ($post_slug != $empty) {
                $slug = slugify($post_slug);
                $query = "INSERT INTO posts (title,content,description,slug,category_id,publisher,status) VALUES('$ptitle','$pcontent','$description','/$slug','$cid','$publisher',$status)";
                $run = mysqli_query($conn, $query);
                $post_id = mysqli_insert_id($conn);
                $image_name = $_FILES['file']['name'];
                $img_tmp = $_FILES['file']['tmp_name'];
            }
        }

        if ($status_watermark == 1) {

            if (!empty($_FILES["file"]["name"])) {
                // File upload path
                $fileName = time() . '_' . basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg');
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to the server
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                        // Load the stamp and the photo to apply the watermark to
                        $watermarkImg = imagecreatefrompng($watermarkImagePath);
                        switch ($fileType) {
                            case 'jpg':
                                $im = imagecreatefromjpeg($targetFilePath);
                                break;
                            case 'jpeg':
                                $im = imagecreatefromjpeg($targetFilePath);
                                break;
                            case 'png':
                                $im = imagecreatefrompng($targetFilePath);
                                break;
                            default:
                                $im = imagecreatefromjpeg($targetFilePath);
                        }

                        // Set the margins for the watermark
                        $marge_right = 10;
                        $marge_bottom = 10;

                        // Get the height/width of the watermark image
                        $sx = imagesx($watermarkImg);
                        $sy = imagesy($watermarkImg);

                        // Copy the watermark image onto our photo using the margin offsets and 
                        // the photo width to calculate the positioning of the watermark.
                        imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));

                        // Save image and free memory
                        imagepng($im, $targetFilePath);
                        imagedestroy($im);

                        $uploadedFileName = $fileName;
                        if (file_exists($targetFilePath)) {
                            $query = "INSERT INTO images (post_id,image) VALUES($post_id,'$targetFilePath')";
                            $run = mysqli_query($conn, $query);
                            if ($run) {
                                $statusMsg = '<p style="color: #07c707;">The image with watermark has been uploaded successfully.</p>';
                            } else {
                                $statusMsg = '<p style="color: #EA4335;"> Server Problem, please try again.</p>';
                            }
                        } else {
                            $statusMsg = '<p style="color: #EA4335;">Image upload failed, please try again.</p>';
                        }
                    } else {
                        $statusMsg = '<p style="color: #EA4335;">Sorry, there was an error uploading your file.</p>';
                    }
                } else {
                    $statusMsg = '<p style="color: #EA4335;">Sorry, only JPG, JPEG, and PNG files are allowed to upload.</p>';
                }

                header('location:/admin/manage-posts.php');
            }
        } else {

            foreach ($image_name as $index => $img) {
                if (move_uploaded_file($img_tmp[$index], "../../../assets/images/upload/$img")) {
                    $query = "INSERT INTO images (post_id,image) VALUES($post_id,'$img')";
                    $run = mysqli_query($conn, $query);
                }
            }
            header('location:/admin/manage-posts.php');
        }

        header('location:/admin/manage-posts.php');
    } else {
        header('Location: ' . _SITE_URL . '/error.php');
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
}
