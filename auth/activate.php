<?php
include('../includes/database/config.php');
?>
<!--  get header -->
<?php include_once('../includes/themes/modern/header.php'); ?>

<!--  get navbar -->
<?php include_once('../includes/themes/modern/navbar.php'); ?>

<style>
  #intro {
    /* Margin to fix overlapping fixed navbar */
    margin-top: 58px;
  }

  @media (max-width: 991px) {
    #intro {
      /* Margin to fix overlapping fixed navbar */
      margin-top: 45px;
    }
  }
</style>


<div id="intro" class="p-5 text-center bg-light">
  <h2 class="mb-0 h4">Activate Your Version</h2>
</div>
<!-- Jumbotron -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="mt-4 mb-5" style="margin-bottom: 17rem!important;">
  <div class="container">
    <!--Grid column-->
    <!--Section: Content-->
    <center>
      <?php
      $license_code = null;
      $client_name = null;
      if (!empty($_POST['license']) && !empty($_POST['client'])) {
        $license_code = strip_tags(trim($_POST["license"]));
        $client_name = strip_tags(trim($_POST["client"]));
        /* Once we have the license code and client's name we can use LicenseBoxExternalAPI's activate_license() function for activating/installing the license, if the third parameter is empty a local license file will be created which can be used for background license checks in the future using verify_license() function. */
        $activate_response = $api->activate_license($license_code, $client_name);
        if (empty($activate_response)) {
          $msg = 'Server is unavailable.';
        } else {
          $msg = $activate_response['message'];
        }
        if ($activate_response['status'] != true) { ?>
          <form action="activate.php" method="POST" style="width: 50%;">
            <div class="notification is-danger is-light"><?php echo ucfirst($msg); ?></div>

            <div class="form-outline mb-4">
              <input class="form-control" id="form1Example1" type="text" name="license" required />
              <label class="form-label" for="form1Example1">License code</label>
            </div>

            <div class="form-outline mb-4">
              <input class="form-control" id="form1Example1" type="text" name="client" required />
              <label class="form-label" for="form1Example1">Your name</label>
            </div>

            <div style='text-align: right;'>
              <button type="submit" class="btn btn-primary btn-block">Activate</button>
            </div>
          </form><?php
                } else { ?>
          <div class="notification is-success is-light"><?php echo ucfirst($msg); ?></div><?php
                                                                                        }
                                                                                      } else { ?>
        <form action="activate.php" method="POST" style="width: 50%;">
          <div class="form-outline mb-4">
            <input class="form-control" id="form1Example1" type="text" name="license" required />
            <label class="form-label" for="form1Example1">License code</label>
          </div>

          <div class="form-outline mb-4">
            <input class="form-control" id="form1Example1" type="text" name="client" required />
            <label class="form-label" for="form1Example1">Your name</label>
          </div>

          <div style='text-align: right;'>
            <button type="submit" class="btn btn-primary btn-block">Activate</button>
          </div>
        </form><?php
                                                                                      } ?>
    </center>
    <!--Section: Content-->
  </div>
  <!--  get footer -->
  <?php include_once('../includes/themes/modern/footer.php'); ?>
  </body>

  </html>