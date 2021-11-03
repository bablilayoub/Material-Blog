<?php include_once('includes/plugins/adblock.php'); ?>
<body>
  <!--Main Navigation-->
  <header>
    <!-- Intro settings -->
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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <?php
        $check = $settings['interface'];
        $set = "logo";
        if ($check == $set) {
        ?>
          <a class="navbar-brand" href="<?php echo _SITE_URL ?>">
            <img src="<?php echo _SITE_URL ?>/<?php echo $settings['logo']; ?>" height="30" alt="" loading="lazy" style="margin-top: -3px;" />
          </a>
        <?php
        } else {
        ?>
          <a class="navbar-brand" href="<?php echo _SITE_URL ?>"><?php echo $settings['sitename']; ?></a>
        <?php
        }
        ?>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php

            $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

            if ($curPageName == 'activate.php') {
              $res = $api->verify_license();

              if ($res['status'] != true) {
              } else {
                header('Location: ' . _SITE_URL . '/');
              }
            } else {
              $res = $api->verify_license();

              if ($res['status'] != true) {
                header('Location: ' . _SITE_URL . '/auth/activate.php');
              } else {
              }
            }

            $navQuery = "SELECT * FROM menus";
            $runNav = mysqli_query($conn, $navQuery);

            while ($menu = mysqli_fetch_assoc($runNav)) {
              $no = getSubMenuNo($conn, $menu['id']);

              if (!$no) {
            ?>

                <li class="nav-item active">
                  <a class="nav-link" aria-current="page" href="<?= $menu['action'] ?>"><?= $menu['name'] ?></a>
                </li>


              <?php } else {
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="<?= $menu['action'] ?>" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <?= $menu['name'] ?></a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    $submenus = getSubMenu($conn, $menu['id']);
                    foreach ($submenus as $sm) {
                    ?>
                      <li>
                        <a class="dropdown-item" href="<?= $sm['action'] ?>"><?= $sm['name'] ?></a>
                      </li>
                    <?php
                    }
                    ?>
                  </ul>
                </li>
              <?php
              }
              ?>
            <?php
            }
            ?>
          </ul>

          <!-- Search -->
          <form action="/" class="d-flex">
            <div class="input-group">
              <div class="form-outline">
                <input name="search" type="search" id="form1" class="form-control" required />
                <label class="form-label" for="form1">Search</label>
              </div>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <!-- Search -->
        </div>
      </div>
    </nav>
    <!-- Navbar -->