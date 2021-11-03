        <!--Grid column-->
        <div class="col-md-4 mb-4">
          <!--Section: Sidebar-->
          <section class="sticky-top" style="top: 80px;">

            <!--Section: Related-->
            <?php
            $getrealatedstatus = $settings['enable_related'];
            $settocheck = 1;
            if ($getrealatedstatus == $settocheck) {
            ?>
              <section class="text-center border-bottom pb-4 mb-4">
                <h5 class="mb-4">Related Posts</h5>
                <?php
                $get_limit = $settings['related_limit'];
                $status = 1;
                $pquery = "SELECT * FROM posts WHERE category_id={$posts['category_id']} AND status=$status ORDER BY id DESC LIMIT $get_limit";
                $prun = mysqli_query($conn, $pquery);
                while ($rpost = mysqli_fetch_assoc($prun)) {
                  if ($rpost['id'] == $post_id) {
                    continue;
                  }
                ?>
                  <div class="bg-image hover-overlay ripple mb-4">
                    <img src="<?php echo _SITE_URL ?>/assets/images/upload/<?= getPostThumb($conn, $rpost['id']) ?>" class="img-fluid" />
                    <a href="<?= $rpost['slug'] ?>" target="_blank">
                      <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);"></div>
                    </a>
                  </div>
                  <a href="<?= $rpost['slug'] ?>">
                    <h6><?= $rpost['title'] ?></h6>
                  </a>
                <?php
                }
                ?>

              </section>

              <?php
              $idadssidebar = 1;
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

            <?php
            }
            ?>
            <!--Section: Related-->
          </section>
          <!--Section: Sidebar-->
        </div>
        <!--Grid column-->