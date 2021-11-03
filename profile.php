<?php

if (!file_exists('includes/database/backup.php')) {
    header('location:/install');
    die();
}

$file_pointer = 'install/index.php';
if (file_exists($file_pointer)) {
    $dirname = "install";
    $cheked = "1";
}

require('includes/database/config.php');

if (isLogged()) {
} else {
    header('Location: ' . _SITE_URL);
}

ob_start();
if (!isset($_SESSION)) {
    session_start();
}

// get user info
$email = $_SESSION['email'];
$getinfo = $conn->query("SELECT * FROM users WHERE email = '$email'");
$row = $getinfo->fetch_assoc();
if (!empty($row)) {
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $mobilenumber = $row['mobilenumber'];
    $about = $row['about'];
    $facebook = $row['facebook'];
    $instagram = $row['instagram'];
    $youtube = $row['youtube'];
    $image = $row['image'];
}
?>

<!--  get header -->
<?php include_once('includes/themes/' . $theme . '/header.php'); ?>

<!--  get navbar -->
<?php include_once('includes/themes/' . $theme . '/navbar.php'); ?>

</div>
<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light">
    <h1 class="mb-0 h4">Profile Page</h1>
</div>
<!-- Jumbotron -->
</header>
<!--Main Navigation-->
</div>
</div>
</div>
<style>
    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }
</style>
<!--Main layout-->
<main class="mt-4 mb-5">
    <div class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-8 mb-4" style="width: 74.666667%;">
                <!--Section: Post data-mdb-->
                <section class="border-bottom mb-4">
                    <!--Section: profile-->
                    <div class="container">
                        <div class="row gutters">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="account-settings">
                                            <div class="user-profile">
                                                <div class="user-avatar">
                                                    <img src="<?php echo _SITE_URL ?><?php echo $image; ?>" alt="<?php echo $firstname; ?> <?php echo $lastname; ?>">
                                                </div>
                                                <h5 class="user-name"><?php echo $firstname; ?> <?php echo $lastname; ?></h5>
                                                <h6 class="user-email"><?php echo $email; ?></h6>
                                            </div>
                                            <div class="about">
                                                <h5>About</h5>
                                                <p><?php echo $about; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h6 class="mb-2 text-primary">Personal Details</h6>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <form action="/includes/app/update-profile.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="first">First Name</label>
                                                    <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control" id="first" placeholder="Enter Your First Name" required>
                                                    <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" id="id" required hidden>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="last">Last Name</label>
                                                    <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" id="last" placeholder="Enter Your Last Name" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="number" name="mobilenumber" value="<?php echo $mobilenumber; ?>" class="form-control" id="phone" placeholder="Enter Your Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="email" placeholder="Enter Your Email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h6 class="mt-3 mb-2 text-primary">Social Media / about</h6>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="Facebook">Facebook</label>
                                                    <input type="text" name="facebook" value="<?php echo $facebook; ?>" class="form-control" id="Facebook" placeholder="Enter Your Facebook Account" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="Instagram">Instagram</label>
                                                    <input type="text" name="instagram" value="<?php echo $instagram; ?>" class="form-control" id="Instagram" placeholder="Enter Your Instagram" required>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="youtube">Youtube</label>
                                                    <input type="text" name="youtube" value="<?php echo $youtube; ?>" class="form-control" id="youtube" placeholder="Enter Your Youtube channel" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="about">Profile Image</label>
                                                    <input type="file" class="form-control" name="image" accept="image/*"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="about">About</label>
                                                    <textarea type="text" name="about" class="form-control" rows="2" id="about" placeholder="Write some information about yourself" required><?php echo $about; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="text-right">
                                                    <a href="<?php echo _SITE_URL ?>" class="btn btn-secondary">Cancel</a>
                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </section>
                <!--Section: profile-->

            </div>
            <!--Grid column-->
            <!--  get sidebar -->
            <?php include_once('includes/themes/' . $theme . '/sidebar.php'); ?>

        </div>
        <!--Grid row-->
    </div>
</main>
<!--Main layout-->
<!--  get footer -->
<?php include_once('includes/themes/' . $theme . '/footer.php'); ?>