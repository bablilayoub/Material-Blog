<?php
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $status = 1;
    $q = "SELECT * FROM posts WHERE title LIKE '%$keyword%' AND status=$status";
} else {
    $status = 1;
    $q = "SELECT * FROM posts WHERE category_id ='$dataid' AND status=$status";
}
$r = mysqli_query($conn, $q);
$total_posts = mysqli_num_rows($r);
$total_pages = ceil($total_posts / $post_per_page);

?>
<nav class="my-4" aria-label="...">
    <ul class="pagination pagination-circle justify-content-center">
        <?php
        if ($page > 1) {
            $switch = "";
        } else {
            $switch = "disabled";
        }

        if ($page < $total_pages) {
            $nswitch = "";
        } else {
            $nswitch = "disabled";
        }


        ?>

        <li class="page-item <?= $switch ?>">
            <a class="page-link" href="?<?php if (isset($_GET['search'])) {
                                            echo "search=$keyword&";
                                        } ?>page=<?= $page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php
        for ($npage = 1; $npage <= $total_pages; $npage++) {
        ?>
            <li class="page-item">
                <a class="page-link" href="?<?php if (isset($_GET['search'])) {
                                                echo "search=$keyword&";
                                            } ?>page=<?= $npage ?>"><?= $npage ?></a>
            </li>
        <?php
        }
        ?>
        <li class="page-item <?= $nswitch ?>">
            <a class="page-link" href="?<?php if (isset($_GET['search'])) {
                                            echo "search=$keyword&";
                                        } ?>page=<?= $page + 1 ?>">Next</a>
        </li>
    </ul>
</nav>
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