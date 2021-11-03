<?php

include('../includes/controllers/auth.php');

if (isLogged()) {

    header('Location: ' . _SITE_URL);
}


$email = $_SESSION['email'];
if ($email == false) {
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
    <h1 class="mb-0 h4">New Password</h1>
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
                        <form action="new-password.php" method="POST" autocomplete="off" style="width: 40%;">
                            <?php
                            if (isset($_SESSION['info'])) {
                            ?>
                            <div class="alert alert-success text-center">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                            <?php
                            }
                            ?>
                            <?php
                            if (count($errors) > 0) {
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                            </div>
                            <?php
                            }
                            ?>

                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="password" id="password_signin"
                                    required />
                                <label class="form-label" for="form2Example2">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="cpassword" id="password_signin"
                                    required />
                                <label class="form-label" for="form2Example2">Comfirm Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <button type="submit" name="change-password" id="sign_in"
                                    class="btn btn-primary btn-block mb-4">Change Password</button>
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