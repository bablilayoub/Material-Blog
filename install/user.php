<?php

include('../includes/database/config.php');

$id = "1";

$query = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($row['email'])) {
    header('Location: ' . _SITE_URL);
} else {
}

if (isset($_POST['adduser'])) {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $firstname = mysqli_real_escape_string($conn, $_POST['first']);
        $lastname = mysqli_real_escape_string($conn, $_POST['last']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $mobilenumber = mysqli_real_escape_string($conn, $_POST['number']);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $about = "Hello, you are reading this text because I haven\'t changed it yet. I will change it some day";
        $facebook = "https://www.facebook.com";
        $instagram = "https://www.instagram.com";
        $youtube = "https://www.youtube.com";
        $image = "/assets/images/upload/user.png";
        $token = md5(rand() . time());
        $isactive = "1";
        $isadmin = "1";

        $sql = "INSERT INTO users (firstname, lastname, email, mobilenumber, password, token, is_active, isAdmin,
        date_time, about, facebook, instagram, youtube, image) VALUES ('$firstname', '$lastname', '$email', '$mobilenumber', '$password_hash', 
        '$token', '1', '1', now(), '$about', '$facebook', '$instagram', '$youtube', '$image')";
        $sqlQuery = mysqli_query($conn, $sql);
        if (!$sqlQuery) {
            die("MySQL query failed!" . mysqli_error($conn));
        } else {
            header('Location: ' . _SITE_URL);
        }
    }
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
                        <h1 class="title" style="padding-top: 20px">Admin Info</h1><br>
                    </center>
                    <div class="box">
                        <form action="user.php" method="POST">
                            <div class="field">
                                <label class="label">First Name</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Enter Your Name" name="first" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Last Name</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Enter Your Last Name" name="last" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input class="input" type="email" placeholder="Enter Your Email" name="email" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                    <input class="input" type="Password" placeholder="Enter Your Password" name="password" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Phone Number</label>
                                <div class="control">
                                    <input class="input" type="tel" placeholder="Enter Your Phone Number" name="number" required>
                                </div>
                            </div>
                            <div style='text-align: right;'>
                                <button type="submit" name="adduser" class="button is-link is-rounded">SEND</button>
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