<?php
include('../includes/controllers/login.php');

if (isLogged()) {

  header('Location: ' . _SITE_URL);
} else {
}

?>

<!--  get header -->
<?php include_once('../includes/themes/' . $theme . '/header.php'); ?>

<!--  get navbar -->
<?php include_once('../includes/themes/' . $theme . '/navbar.php'); ?>

</div>
<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light">
  <h1 class="mb-0 h4">Login Page</h1>
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

            <form action="" method="post" style="width: 40%;">
              <?php echo $accountNotExistErr; ?>
              <?php echo $emailPwdErr; ?>
              <?php echo $verificationRequiredErr; ?>
              <?php echo $email_empty_err; ?>
              <?php echo $pass_empty_err; ?><br>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" class="form-control" name="email_signin" id="email_signin" />
                <label class="form-label" for="form2Example1">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" class="form-control" name="password_signin" id="password_signin" />
                <label class="form-label" for="form2Example2">Password</label>
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example3" checked />
                    <label class="form-check-label" for="form2Example3"> Remember me </label>
                  </div>
                </div>

                <div class="col">
                  <!-- Simple link -->
                  <a href="<?php echo _SITE_URL ?>/auth/forgot-password.php">Forgot password?</a>
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" name="login" id="sign_in" class="btn btn-primary btn-block mb-4">Sign in</button>
              <!-- get data -->
              <?php
              $check = $settings['signup'];
              $set = "yes";
              if ($check == $set) {
              ?>
                <a href="<?php echo _SITE_URL ?>/auth/register.php" class="btn btn-primary btn-block mb-4">Sign Up</a>
              <?php
              } else {
              ?>
              <?php
              }
              ?>
              <!-- get data -->

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