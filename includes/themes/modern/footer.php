</div>
</main>
<!--Main layout-->
<!--Footer-->
<footer class="bg-primary text-white text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase"><?php echo $settings['sitename']; ?></h5>
        <p>
          <?php echo $settings['description']; ?>
        </p>
        <!-- Section: Social media -->
        <section class="mb-4">
          <a href="<?php echo $settings['youtube']; ?>" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="<?php echo $settings['facebook']; ?>" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="<?php echo $settings['instagram']; ?>" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="<?php echo $settings['twitter']; ?>" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="<?php echo $settings['github']; ?>" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
            <i class="fab fa-github"></i>
          </a>
        </section>
        <!-- Section: Social media -->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Categories</h5>
        <ul class="list-unstyled mb-0">
          <?php
          $categories = getAllCategory($conn);
          foreach ($categories as $ct) {
          ?>
            <li>
              <a href="<?php echo _SITE_URL ?>/category<?= $ct['slug'] ?>" class="text-white"><?= $ct['name'] ?></a>
            </li>

          <?php
          }
          ?>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Pages</h5>
        <ul class="list-unstyled">
          <?php
          $pages = getAllPagesToMenus($conn);
          foreach ($pages as $page) {
          ?>
            <li>
              <a href="<?php echo _SITE_URL ?>/page<?= $page['slug'] ?>" class="text-white"><?= $page['name'] ?></a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © <?php echo date("Y"); ?> Copyright:
    <a class="text-white" href="<?php echo _SITE_URL ?>"><?php echo $settings['sitename']; ?></a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-66946065-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', <?php echo $settings['analytics']; ?>);
</script>
<!--Footer-->
<!-- MDB -->
<script type="text/javascript" src="<?php echo _SITE_URL ?>/assets/theme/modern/js/mdb.min.js"></script>

</body>

</html>