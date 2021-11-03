  <!--Main Navigation-->
  <header>
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" target="_blank" href="<?php echo _SITE_URL ?>"><?php echo $settings['sitename']; ?></a>

        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          <li class="nav-item dropdown">
            <?php
            $url = 'https://indiexd.com/info.php';
            $arrContextOptions = array(
              "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
              ),
            );
            $response = file_get_contents($url, false, stream_context_create($arrContextOptions));
            if ($response == $settings['version']) {
            ?>
              <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item">Version <?php echo $settings['version']; ?></a></li>
                <li><a class="dropdown-item">You are using the latest version</a></li>
              </ul>
            <?php
            } else {
            ?>
              <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell"></i>

                <span class="badge rounded-pill badge-notification bg-danger">1</span>
              </a>

              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item">New Version Is Here ! V <?php echo $response; ?></a></li>
                <li><a class="dropdown-item">Download Now Update From Codecanyon</a></li>
              </ul>
            <?php
            }
            ?>
          </li>
          <!-- Icon -->
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="https://support.indiexd.com">
              <i class="far fa-life-ring"></i>
            </a>
          </li>

          <!-- Avatar -->
          <li class="nav-item dropdown">
            <?php
            $email = $_SESSION['email'];
            $users_info_get = getUserAllInfo($conn, $email);
            ?>
            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo _SITE_URL ?>/<?php echo $users_info_get['image']; ?>" class="rounded-circle" height="22" alt="" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="<?php echo _SITE_URL ?>/profile.php">My profile</a></li>
              <li><a class="dropdown-item" href="<?php echo _SITE_URL ?>/auth/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->