<?php
include('../includes/controllers/register.php');

if (isLogged()) {

  header('Location: ' . _SITE_URL);
} else {
}

?>

<!-- get data -->
<?php
$check = $settings['signup'];
$set = "yes";
if ($check == $set) {
?>
<?php
} else {
?>
  <?php header('Location: ' . _SITE_URL); ?>
<?php
}
?>
<!-- get data -->

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
            <form action="" method="post" style="width: 50%;">
              <?php echo $success_msg; ?>
              <?php echo $email_exist; ?>
              <?php echo $email_verify_err; ?>
              <?php echo $email_verify_success; ?>
              <?php echo $l_NameErr; ?>
              <?php echo $lNameEmptyErr; ?>
              <?php echo $fNameEmptyErr; ?>
              <?php echo $f_NameErr; ?>
              <?php echo $_emailErr; ?>
              <?php echo $emailEmptyErr; ?>
              <?php echo $_mobileErr; ?>
              <?php echo $mobileEmptyErr; ?>
              <?php echo $_passwordErr; ?>
              <?php echo $passwordEmptyErr; ?>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" class="form-control" name="firstname" id="form3Example1" />
                    <label class="form-label" for="form3Example1">First name</label>

                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" class="form-control" name="lastname" id="form3Example1" />
                    <label class="form-label" for="form3Example2">Last name</label>

                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" class="form-control" name="email" id="form3Example3" />
                <label class="form-label" for="form3Example3">Email address</label>

              </div>

              <!-- phone number input -->
              <div class="form-outline mb-4">
                <input type="tel" class="form-control" name="mobilenumber" id="form3Example3" />
                <label class="form-label" for="form3Example3">Phone number</label>

              </div>



              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" class="form-control" name="password" id="form3Example4" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>


              <!-- Submit button -->
              <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
              <a href="<?php echo _SITE_URL ?>/auth/login.php" class="btn btn-primary btn-block mb-4">Sign In</a>

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