<style>
  .p-5 {
    padding: 1rem !important;
  }
</style>
<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light">
  <?php
  if ($cheked == "1") {
  ?>
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
      WARNING !!!!!
    </button>
    <!-- delte install folder -->
    <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="false">
      <div class="modal-dialog   modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Please DELETE install folder from your host NOW for your safety</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- delte install folder -->
  <?php
  }
  ?>
</div>
<!-- Jumbotron -->
</header>
<!--Main Navigation-->
<!--Main layout-->
<main class="my-5">
  <?php
  $idadssidebar = 2;
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
    <br>
    <!--  section ad -->
  <?php
  }
  ?>

  <div class="container">
    <?php
    $check_slider = $sliderdata['other_pages'];
    $setto1 = 1;
    if ($check_slider == $setto1) {
      include_once('slider.php');
    } else {
    }
    ?>

    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-md-9 mb-4">
        <!--Section: Content-->
        <section>

          <?php
          // run code to get posts
          if (isset($_GET['search'])) {
            $status = 1;
            $keyword = $_GET['search'];
            $postQuery = "SELECT * FROM posts WHERE title LIKE '%$keyword%' AND status=$status ORDER BY id DESC LIMIT $result,$post_per_page";
          } else {
            $status = 1;
            $postQuery = "SELECT * FROM posts WHERE status=$status ORDER BY id DESC LIMIT $result,$post_per_page";
          }

          $runPQ = mysqli_query($conn, $postQuery);
          while ($posts = mysqli_fetch_assoc($runPQ)) {
          ?>

            <!-- Post -->
            <div class="row">
              <div class="col-md-4 mb-4">
                <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                  <img src="<?php echo _SITE_URL ?>/assets/images/upload/<?= getPostThumb($conn, $posts['id']) ?>" class="img-fluid" />
                  <a href="<?= $posts['slug'] ?>">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
              </div>

              <div class="col-md-8 mb-4">
                <h5><a href="<?= $posts['slug'] ?>"><?= $posts['title'] ?></a></h5>
                <p>
                  <?= $posts['description'] ?>
                </p>

                <a type="button" href="<?= $posts['slug'] ?>" class="btn btn-primary">Read</a>
              </div>
            </div>
          <?php
          }
          ?>
          <!-- Post -->

        </section>
        <!--Section: Content-->
      </div>
      <!--Grid column-->

      <!--  get sidebar -->
      <?php include_once('./includes/themes/' . $theme . '/sidebar.php'); ?>