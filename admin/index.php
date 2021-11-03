<?php
include('../includes/database/config.php');
include('includes/app/functions.php');
include('includes/app/core.php');


if (isAdmin($conn)) {
} else {
  header('Location: ' . _SITE_URL . '/error.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?php echo $settings['sitename']; ?> - Dashboard</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="assets/css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="assets/css/admin.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>

<body>

  <?php include('includes/template/navbar.php'); ?>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="/admin" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
        </a>
        <a href="/admin/add-post.php" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-plus fa-fw me-3"></i><span>Add Post</span>
        </a>
        <a href="/admin/manage-posts.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-folder-open fa-fw me-3"></i><span>Manage Post</span></a>
        <a href="/admin/manage-pages.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-file fa-fw me-3"></i><span>Manage Pages</span></a>

        <a href="/admin/comments.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-comments fa-fw me-3"></i><span>Manage Comments</span></a>
        <a href="/admin/categories.php" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-folder fa-fw me-3"></i><span>Manage Category</span>
        </a>
        <a href="/admin/menus.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-bars fa-fw me-3"></i><span>Manage Menus</span></a>
        <a href="/admin/users.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-user fa-fw me-3"></i><span>Manage Users</span></a>
        <a href="/admin/messages.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-envelope fa-fw me-3"></i><span>Manage Messages</span></a>
        <a href="/admin/plugins.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-toolbox fa-fw me-3"></i><span>Manage Plugins</span></a>
        <a href="/admin/manage-ads.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-tools fa-fw me-3"></i><span>Manage Ads</span></a>
        <a href="/admin/design.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-palette fa-fw me-3"></i><span>Design / SEO</span></a>

        <a href="/admin/settings.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-cog fa-fw me-3"></i><span>Website Settings</span></a>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
      <!--Section: Minimal statistics cards-->
      <section>
        <div class="row">
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fas fa-pencil-alt text-info fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3><?php echo $posts_total_week; ?></h3>
                    <p class="mb-0">New Posts</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3><?php echo $posts_comments_week; ?></h3>
                    <p class="mb-0">New Comments</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fas fa-user text-success fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3><?php echo $users; ?></h3>
                    <p class="mb-0">Total Users</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fas fa-map-marker-alt text-danger fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3><?php echo $views; ?></h3>
                    <p class="mb-0">Total Visits</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->

      <!--Section: Statistics with subtitles-->
      <section>
        <div class="row">
          <div class="col-xl-6 col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between p-md-1">
                  <div class="d-flex flex-row">
                    <div class="align-self-center">
                      <i class="fas fa-pencil-alt text-info fa-3x me-4"></i>
                    </div>
                    <div>
                      <h4>Total Posts</h4>
                      <p class="mb-0">Posts on the site</p>
                    </div>
                  </div>
                  <div class="align-self-center">
                    <h2 class="h1 mb-0"><?php echo $posts_total; ?></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between p-md-1">
                  <div class="d-flex flex-row">
                    <div class="align-self-center">
                      <i class="far fa-comment-alt text-warning fa-3x me-4"></i>
                    </div>
                    <div>
                      <h4>Total Comments</h4>
                      <p class="mb-0">Monthly blog posts</p>
                    </div>
                  </div>
                  <div class="align-self-center">
                    <h2 class="h1 mb-0"><?php echo $posts_comments; ?></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Statistics with subtitles-->

      <!--Section: posts-->
      <section>
        <div class="row">
          <div class="mb-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <section>
                      <div class="row">
                        <div class="mb-4">
                          <div class="card">
                            <div class="card-body">
                              <h5>Manage Posts</h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
                <table class="table align-middle">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Post Title</th>
                      <th>Post Category</th>
                      <th>Post Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $limit = 10;
                    $posts = getAllPost($conn,$limit);
                    $count = 1;
                    foreach ($posts as $post) {
                    ?>

                    <tr>
                      <td scope="row"><?= $count ?></td>
                      <td style="
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 50ch;"><?= $post['title'] ?></td>
                      <td><?= getCategory($conn, $post['category_id']) ?></td>
                      <td><?= date('F jS, Y', strtotime($post['created_at'])) ?></td>
                      <td>
                        <a type="button" href="includes/files/delete-post.php?id=<?= $post['id'] ?>" onclick="return confirm('Do You Really Want To Delete this Post ?');" class="btn btn-danger btn-rounded btn-floating">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                        <a type="button" href="includes/edit/edit-post.php?id=<?= $post['id'] ?>" class="btn btn-success btn-rounded btn-floating">
                          <i class="fas fa-edit"></i>
                        </a>
                      </td>


                    </tr>
                    <?php
                      $count++;
                    }
                  ?>
 
                  </tbody>
                </table>

                <?php
                $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM posts");
                $row_db = mysqli_fetch_row($result_db);
                $total_records = $row_db[0];
                $total_pages = ceil($total_records / $limit);
                /* echo  $total_pages; */
                $pagLink = "<ul class='pagination'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                  $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=" . $i . "'>" . $i . "</a></li>";
                }
                echo $pagLink . "</ul>";
                ?>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: posts-->
    </div>
  </main>


  <!-- Modal -->

  <!-- Modal -->


  <!--Main layout-->
  <!-- MDB -->
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="assets/js/admin.js"></script>

</body>

</html>