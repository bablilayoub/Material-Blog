<?php

include('../includes/controllers/auth.php');

if (isLogged()) {

    header('Location: ' . _SITE_URL);
}

?>

<!--  get header -->
<?php include_once('../includes/themes/' . $theme . '/header.php'); ?>

<!--  get navbar -->
<?php include_once('../includes/themes/' . $theme . '/navbar.php'); ?>


</div>
<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light">
    <h1 class="mb-0 h4">Forgot Password</h1>
</div>
<!-- Jumbotron -->
</header>
<!--Main Navigation-->
</div>
</div>
</div>
<!--Main layout-->
<main class="mt-4 mb-5">
    <div class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-8 mb-4" style="width: 74.666667%;">
                <!--Section: Post data-mdb-->
                <section class="border-bottom mb-4">
                    <!--Section: login-->
                    <center>
                        <form action="forgot-password.php" style="width: 40%;" method="POST" autocomplete="">
                            <p class="text-center">Enter your email address</p>
                            <?php
                            if (count($errors) > 0) {
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                    foreach ($errors as $error) {
                                        echo $error;
                                    }
                                    ?>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" value="<?php echo $email ?>" name=" email"
                                    id="email_signin" required />
                                <label class="form-label" for="form2Example1">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <button type="submit" name="check-email" id="sign_in"
                                    class="btn btn-primary btn-block mb-4">Reset Password</button>

                            </div>
                        </form>
                    </center>

                </section>
                <!--Section: login-->

            </div>
            <!--Grid column-->
            <!--  get sidebar -->
            <?php include_once('../includes/themes/' . $theme . '/sidebar.php'); ?>

        </div>
        <!--Grid row-->
    </div>
</main>
<!--Main layout-->
<!--  get footer -->
<?php include_once('../includes/themes/' . $theme . '/footer.php'); ?>