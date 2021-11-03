<?php

include('../includes/database/config.php');

$check_status = "0";
$updatestatus = "1";

$query = "SELECT * FROM settings WHERE check_status=$check_status";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$rowstatus = $row['check_status'];

if ($rowstatus == $check_status) {

    if (isset($_POST['updatesettings'])) {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $website_name = mysqli_real_escape_string($conn, $_POST['website_name']);
            $website_email = mysqli_real_escape_string($conn, $_POST['website_email']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $website_url = mysqli_real_escape_string($conn, $_POST['website_url']);
            $post_per_page = "10";
            $zero = "0";
            $updatestatus = 1;

            $sql = "UPDATE settings SET
              sitename = '$website_name',
              website_email = '$website_email',
              check_status = '$updatestatus',
              description = '$description',
              url = '$website_url' WHERE post_per_page=$post_per_page AND check_status=$zero";

            if ($conn->query($sql) === TRUE) {
                header('Location: /install/user.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
} else {
    header('Location: ' . _SITE_URL);
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>INDIEXD - Installer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" crossorigin="anonymous" />
    <style type="text/css">
        body,
        html {
            background: #4281ff;
            color: #ffffff;
        }

        .title {
            color: #ffffff;
        }
    </style>
</head>

<body>

    <div class="container" style="padding-top: 20px;">
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-two-fifths">
                    <center>
                        <h1 class="title" style="padding-top: 20px">Change Your Website Settings</h1><br>
                    </center>
                    <div class="box">
                        <div class="tabs is-fullwidth">
                            <ul>
                                <li>
                                    <a>
                                        <span><i class="fa fa-check-circle"></i> Requirements</span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span><i class="fa fa-check-circle"></i> Verify</span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span><i class="fa fa-check-circle"></i> Database</span>
                                    </a>
                                </li>
                                <li class="is-active">
                                    <a>
                                        <span><b>Website Settings</b></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <form action="" method="POST">
                            <div class="field">
                                <label class="label">Website Name</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="enter your website name" name="website_name" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Website Url</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Url must be like this : http://indiexd.com" name="website_url" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Website Description</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="enter your website description" name="description" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Website Email</label>
                                <div class="control">
                                    <input class="input" type="email" placeholder="enter your website email" name="website_email" required>
                                </div>
                            </div>
                            <div style='text-align: right;'>
                                <button type="submit" name="updatesettings" class="button is-link is-rounded">save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content has-text-centered">
        <p>Copyright <?php echo date('Y'); ?> INDIEXD LTD, All rights reserved.</p><br>
    </div>
</body>

</html>