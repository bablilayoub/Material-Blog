 <!--Grid column-->
 <div class="col-md-3 mb-4">
      <!--Section: Sidebar-->
      <section class="sticky-top" style="top: 80px;">
           <!--Section: Ad-->
           <section class="text-center border-bottom pb-4 mb-4">
                <?php
                    if (isLogged()) {
                    ?>
                     <h5 class="card-header">ACCOUNT</h5>
                     <div class="card-body">
                          <h6 class="card-subtitle mb-2 text-muted">Welcome, <?php echo $_SESSION['firstname']; ?>
                               <?php echo $_SESSION['lastname']; ?></h6>
                          <br>
                          <?php if (isAdmin($conn)) { ?>
                               <a class="btn btn-danger btn-block" href="<?php echo _SITE_URL ?>/admin">Admin Panel</a>
                               <a class="btn btn-danger btn-block" href="<?php echo _SITE_URL ?>/profile.php">Edit Profile</a>
                               <a class="btn btn-danger btn-block" href="<?php echo _SITE_URL ?>/auth/logout.php">Log out</a>
                     </div>
                <?php
                              } else { ?>
                     <a class="btn btn-danger btn-block" href="<?php echo _SITE_URL ?>/profile.php">Edit Profile</a>
                     <a class="btn btn-danger btn-block" href="<?php echo _SITE_URL ?>/auth/logout.php">Log out</a>

                <?php
                              }
                    ?>
           <?php
                    } else {
               ?>
                <!-- get data -->
                <?php
                         $check = $settings['signup'];
                         $set = "yes";
                         if ($check == $set) {
                    ?>
                     <h5 class="card-header">LOGIN OR SIGN UP</h5>
                     <div class="card-body">
                          <h5 class="card-title">HELLO VISITOR</h5>
                          <p class="card-text">LOGIN OR SIGN UP ON THE SITE</p>
                          <a href="<?php echo _SITE_URL ?>/auth/login.php" class="btn btn-primary">Login Or SignUp</a>
                     </div>
                <?php
                         } else {
                    ?>
                     <h5 class="card-header">LOGIN</h5>
                     <div class="card-body">
                          <h5 class="card-title">HELLO VISITOR</h5>
                          <p class="card-text">LOGIN TO YOUR ACCOUNT FROM HERE</p>
                          <a href="<?php echo _SITE_URL ?>/auth/login.php" class="btn btn-primary">Login</a>
                     </div>
                <?php
                         }
                    ?>
                <!-- get data -->


           <?php
                    } ?>
           </section>
           <!--Section: Ad-->

           <?php
               $idadssidebar = 6;
               $getstatusforads = 1;
               $adssidebar = getads($conn, $idadssidebar);
               if ($adssidebar['status'] == $getstatusforads) {
               ?>
                <!--  section ad -->
                <section class="text-center">
                     <center>
                          <?php
                              echo $adssidebar['code'];
                              ?>
                     </center>
                </section>
                <!--  section ad -->
           <?php
               }
               ?>
      </section>
      <!--Section: Sidebar-->
 </div>
 <!--Grid column-->
 </div>
 <!--Grid row-->
 <!--Main layout-->