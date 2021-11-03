<?php

$slug_url = $_SERVER['PATH_INFO'];

$getidfromslug = $conn->query("SELECT id FROM posts WHERE slug = '$slug_url'");
$row = $getidfromslug->fetch_assoc();
if (!empty($row)) {
  $post_id = $row['id'];
} else {
  header('Location: ' . _SITE_URL . '/error.php');
}

$postQuery = "SELECT * FROM posts WHERE id=$post_id";
$runPQ = mysqli_query($conn, $postQuery);
$posts = mysqli_fetch_assoc($runPQ);


if (mysqli_num_rows($runPQ) == 0) {
  header('Location: ' . _SITE_URL);
} else {
  $sql = "UPDATE posts SET pageview = pageview+1 WHERE id=$post_id";
  if ($conn->query($sql) === TRUE) {
    $userId = $posts['publisher'];
    $users = getUserData($conn, $userId);
  }

  $email = $_SESSION['email'];
  $getmyid = $conn->query("SELECT * FROM users WHERE email = '$email'");
  $row = $getmyid->fetch_assoc();
  if (!empty($row)) {
    $myid = $row['id'];
  }
}

?>
</div>
<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light">
  <h1 class="mb-0 h4"><?= $posts['title'] ?></h1>
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
            <h5 class="modal-title" id="exampleModalLabel">DELETE install folder</h5>
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
</div>
</div>
</div>
<!--Main layout-->
<main class="mt-4 mb-5">
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
    <!--  section ad -->
  <?php
  }
  ?>
  <br>
  <div class="container">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-md-8 mb-4">
        <!--Section: Post data-mdb-->
        <section class="border-bottom mb-4">
          <?php
          $check_slider = $sliderdata['post_page'];
          $setto1 = 1;
          if ($check_slider == $setto1) {
            include_once('slider-posts.php');
          }
          ?>
          <div class="row align-items-center mb-4">
            <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
              <img src="<?php echo _SITE_URL ?>/<?php echo $users['image']; ?>" class="rounded shadow-1-strong me-2" height="35" alt="" loading="lazy" />
              <span> Published On <u><?= date('F jS, Y', strtotime($posts['created_at'])) ?></u></span>
            </div>

            <div class="col-lg-6 text-center text-lg-end">
              <div class="badge bg-primary text-wrap" style="width: 8rem">Post Views : <?php echo $posts['pageview']; ?></div>
              <a href="category<?= getCategorySlug($conn, $posts['category_id']) ?>"><span class="badge bg-danger">Category : <?= getCategory($conn, $posts['category_id']) ?></span></a>
            </div>
          </div>
        </section>

        <?php
        $idadssidebar = 4;
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
        <br>
        <!--Section: Post data-mdb-->
        <?php
        $post_images = getThumbnail($conn, $posts['id']);
        ?>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <?php
            $c = 1;
            foreach ($post_images as $image) {
              if ($c > 1) {
                $sw = "";
              } else {
                $sw = "active";
              }
            ?>
              <div class="carousel-item <?= $sw ?>">
                <img src="<?php echo _SITE_URL ?>/assets/images/upload/<?= $image['image'] ?>" class="d-block w-100" alt="...">
              </div>
            <?php
              $c++;
            }
            ?>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <br>


        <!--Section: content-->
        <p class="card-text"><?= $posts['content'] ?></p>
        <!--Section: content-->
        <br>
        <?php
        $idadssidebar = 5;
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
        <br>
        <!--Section: Share buttons-->
        <section class="text-center border-top border-bottom py-4 mb-4">
          <p><strong>Share with your friends :</strong></p>
          <!-- Facebook -->
          <a class="btn btn-primary" style="background-color: #3b5998;" href="http://www.facebook.com/sharer.php?u=<?= $site_url ?><?= $posts['slug'] ?>" role="button"><i class="fab fa-facebook-f"></i></a>

          <!-- Twitter -->
          <a class="btn btn-primary" style="background-color: #55acee;" href="https://twitter.com/share?url=<?= $site_url ?><?= $posts['slug'] ?>&amp;text=<?= $posts['title'] ?>" role="button"><i class="fab fa-twitter"></i></a>

          <!-- Pinterest -->
          <a class="btn btn-primary" style="background-color: #c61118;" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" role="button"><i class="fab fa-pinterest"></i></a>

          <!-- Reddit -->
          <a class="btn btn-primary" style="background-color: #ff4500;" href="http://reddit.com/submit?url=<?= $site_url ?><?= $posts['slug'] ?>&amp;title=<?= $posts['title'] ?>" role="button"><i class="fab fa-reddit-alien"></i></a>
          <?php
          if (isLogged()) {
          ?>
            <!-- get data -->
            <?php
            $check = $settings['comments'];
            $set = "yes";
            if ($check == $set) {
            ?>
              <a class="btn btn-primary" href="#comments">Add Comment</a>
            <?php
            } else {
            ?>

            <?php
            }
            ?>
            <!-- get data -->

          <?php
          } else {
          ?>
            <!-- get data -->
            <?php
            $check = $settings['comments'];
            $set = "yes";
            if ($check == $set) {
            ?>
              <a class="btn btn-primary" href="<?php echo _SITE_URL ?>/auth/login.php">Login To Comment</a>
            <?php
            } else {
            ?>

            <?php
            }
            ?>
            <!-- get data -->


          <?php
          }
          ?>

        </section>

        <!--Section: Share buttons-->

        <!--Section: Author-->
        <section class="border-bottom mb-4 pb-4">
          <div class="row">
            <div class="col-3">
              <img src="<?php echo $users['image']; ?>" class="img-fluid shadow-1-strong rounded" alt="" />
            </div>

            <div class="col-9">
              <p class="mb-2"><strong><?php echo $users['firstname']; ?> <?php echo $users['lastname']; ?></strong></p>
              <a href="<?php echo $users['facebook']; ?>" class="text-dark"><i class="fab fa-facebook-f me-1"></i></a>
              <a href="<?php echo $users['instagram']; ?>" class="text-dark"><i class="fab fa-instagram me-1"></i></a>
              <a href="<?php echo $users['youtube']; ?>" class="text-dark"><i class="fab fa-youtube me-1"></i></a>
              <p>
                <?php echo $users['about']; ?>
              </p>
            </div>
          </div>
        </section>
        <!--Section: Author-->

        <?php
        if (isset($_SERVER['PATH_INFO'])) {
        ?>
          <!-- get data -->
          <?php
          $check = $settings['comments'];
          $set = "yes";
          if ($check == $set) {
          ?>
            <!--Section: Comments-->
            <section class="border-bottom mb-3">
              <p class="text-center"><strong>Comments</strong></p>
              <?php
              $comments = getComments($conn, $post_id);
              if (count($comments) < 1) {
                echo '<div class="row mb-4"><p class="text-center card-text">No Comments..</p></div>';
              }
              foreach ($comments as $comment) {

              ?>
                <!-- Comment -->
                <div class="row mb-4">

                  <div class="col-2">
                    <img src="<?= $comment['image'] ?>" class="img-fluid shadow-1-strong rounded" alt="" />
                  </div>
                  <div class="col-10">

                    <p class="mb-2"><strong><?= $comment['name'] ?></strong></p>
                    <p style="word-break: break-all;">
                      <?= $comment['comment'] ?>
                    </p>
                    <?php
                    if (isAdmin($conn)) {
                    ?>
                      <form action="<?php echo _SITE_URL ?>/includes/app/delete-comment.php" method="post">
                        <input type="hidden" name="userid" value="<?php echo $myid; ?>">
                        <input type="hidden" name="post_id" value="<?= $post_id ?>">
                        <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                        <button type="submit" name="delete" class="btn btn-danger btn-rounded btn-sm" data-mdb-ripple-color="#ffffff"> DELETE <i class="fas fa-trash ms-1"></i></button>
                      </form>

                      <?php
                      $commentid = $comment['id'];
                      $getuseridfromcomment = $conn->query("SELECT * FROM comments WHERE id = '$commentid'");
                      $row = $getuseridfromcomment->fetch_assoc();
                      if (!empty($row)) {
                        $user = $row['userid'];
                      }
                    } else {
                      $commentid = $comment['id'];
                      $getuseridfromcomment = $conn->query("SELECT * FROM comments WHERE id = '$commentid'");
                      $row = $getuseridfromcomment->fetch_assoc();
                      if (!empty($row)) {
                        $user = $row['userid'];
                      }

                      if ($myid == $user) {

                      ?>
                        <form action="<?php echo _SITE_URL ?>/includes/app/delete-comment.php" method="post">
                          <input type="hidden" name="userid" value="<?php echo $myid; ?>">
                          <input type="hidden" name="post_id" value="<?= $post_id ?>">
                          <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                          <button type="submit" name="delete" class="btn btn-danger btn-rounded   btn-sm" data-mdb-ripple-color="#ffffff"> DELETE <i class="fas fa-trash ms-1"></i></button>
                        </form>
                    <?php
                      } else {
                      }
                    }
                    ?>


                  </div>


                </div>
                <!-- Comment -->

                </br>

              <?php
              }
              ?>
            <?php
          }
            ?>
            </section>

            <!--Section: Comments-->
            <?php
            if (isLogged() && $check == $set) {
            ?>
              <!--Section: Reply-->
              <div id="comments">
                <section>
                  <p class="text-center"><strong>Leave a reply</strong></p>

                  <form action="<?php echo _SITE_URL ?>/includes/app/add_comment.php" method="post">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="name" id="form4Example1" value="<?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?>" class="form-control" readonly />
                      <label class="form-label" for="form4Example1">Name</label>
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                      <textarea class="form-control" name="comment" id="form4Example3" rows="4" required></textarea>
                      <label class="form-label" name="comment" for="form4Example3">Text</label>
                    </div>
                    <input type="hidden" name="userid" value="<?php echo $myid; ?>">
                    <input type="hidden" name="post_id" value="<?= $post_id ?>">
                    <!-- Submit button -->
                    <button type="submit" name="addcomment" class="btn btn-primary btn-block mb-4">
                      Publish
                    </button>
                  </form>

                </section>
              </div>
            <?php
            } else {
            ?>

            <?php
            } ?>
            <!--Section: Reply-->

          <?php
        } else {
          ?>

          <?php
        }
          ?>
          <!-- get data -->


      </div>

      <!--Grid column-->
      <!--  get sidebar -->
      <?php include_once('./includes/themes/' . $theme . '/post-sidebar.php'); ?>

    </div>
    <?php
    $idadssidebar = 3;
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
    <!--Grid row-->
  </div>
</main>
<script>
  function getComment() {
    getElementById("comment").innerHTML;
  }
</script>
<!--Main layout-->