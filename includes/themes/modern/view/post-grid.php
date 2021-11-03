<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light">
  <h1 class="mb-3 h2"><?php echo $settings['sitename']; ?></h1>
  <p class="mb-3"><?php echo $settings['description']; ?></p>
</div>
<!-- Jumbotron -->
</header>
<!--Main Navigation-->

  <!--Main layout-->
  <main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center">
        
          <?php
          // run code to get posts
          if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $status = 1;
            $postQuery = "SELECT * FROM posts WHERE title LIKE '%$keyword%' AND status=$status ORDER BY id DESC LIMIT $result,$post_per_page";
          } else {
            $status = 1;
            $postQuery = "SELECT * FROM posts WHERE status=$status ORDER BY id DESC LIMIT $result,$post_per_page";
          }

          $runPQ = mysqli_query($conn, $postQuery);
          while ($posts = mysqli_fetch_assoc($runPQ)) {
          ?>

            <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="<?php echo _SITE_URL ?>/assets/images/upload/<?= getPostThumb($conn, $posts['id']) ?>" class="img-fluid" />
                <a href="<?= $posts['slug'] ?>">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?= $posts['title'] ?></h5>
                <p class="card-text">
                <?= $posts['description'] ?>
                </p>
                <a href="<?= $posts['slug'] ?>" class="btn btn-primary">Read</a>
              </div>
            </div>
          </div>

          <?php
          }
          ?>
          <!-- Post -->

        
        <!--Section: Content-->
      </div>
      <!--Grid column-->

      <!--  get sidebar -->
      <?php include_once('./includes/themes/' . $theme . '/sidebar.php'); ?>