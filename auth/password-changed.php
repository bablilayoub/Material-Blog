<?php include('../includes/database/config.php'); ?>
<?php
if ($_SESSION['info'] == false) {
    header('Location: login.php');
}
?>
<!--  get header -->
<?php include_once('../includes/themes/' . $theme . '/header.php'); ?>

<!--  get navbar -->
<?php include_once('../includes/themes/' . $theme . '/navbar.php'); ?>

</div>
<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light">
    <h1 class="mb-0 h4">Done</h1>
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

                        <div class="row">
                            <div class="col-md-4 offset-md-4 form login-form">
                                <?php
                                if (isset($_SESSION['info'])) {
                                ?>
                                    <div class="alert alert-success text-center">
                                        <?php echo $_SESSION['info']; ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <form action="login.php" method="POST">
                                    <div class="form-outline mb-4">
                                        <button type="submit" name="login-now" id="sign_in" class="btn btn-primary btn-block mb-4">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </center></br>

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