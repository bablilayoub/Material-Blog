<?php
include('../includes/database/config.php');
include('includes/app/functions.php');
include('includes/app/core.php');


if (isAdmin($conn)) {
} else {
  header('Location: ' . _SITE_URL . '/error.php');
}

if (isset($_POST['search'])) {
  $valueToSearch = $_POST['valueToSearch'];
  // search in all table columns
  // using concat mysql function
  $query = "SELECT * FROM `users` WHERE CONCAT(`firstname`, `lastname`, `email`) LIKE '%" . $valueToSearch . "%'";
  $search_result = filterTable($conn, $query);
} else {

  $limit = 10;
  $users = getAllUsers($conn, $limit);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?php echo $settings['sitename']; ?> - Manage Users</title>
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
        <a href="/admin" class="list-group-item list-group-item-action py-2 ripple">
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
        <a href="/admin/users.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true"><i class="fas fa-user fa-fw me-3"></i><span>Manage Users</span></a>
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

      <section>
        <div class="row">
          <div class="mb-4">
            <div class="card">
              <div class="card-body">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg bg-link navbar-light ">
                  <!-- Container wrapper -->
                  <div class="container-fluid">
                    <!-- Navbar brand -->
                    <div>
                      <h5>Manage Users</h5>
                    </div>
                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      </ul>
                      <!-- Search -->
                      <form action="users.php" method="post">
                        <div class="input-group">
                          <div class="form-outline">
                            <input type="search" name="valueToSearch" id="form1" class="form-control" />
                            <label class="form-label" for="form1">Search</label>
                          </div>
                          <button type="submit" name="search" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Container wrapper -->
                </nav>
                <!-- Navbar -->
                <br>
                <table class="table align-middle">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>OTP Code</th>
                      <th>Edit / Delete</th>
                    </tr>
                    <?php
                    $count = 1;
                    ?>
                  </thead>
                  <tbody>

                    <?php if (isset($_POST['search'])) {
                      while ($row = mysqli_fetch_array($search_result)) :
                    ?>

                        <tr>
                          <td scope="row"><?= $count ?></td>
                          <td><?php echo $row['lastname']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['code']; ?></td>
                          <td>
                            <a type="button" href="includes/files/delete-user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Do You Really Want To Delete this User ?');" class="btn btn-danger btn-rounded btn-floating">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                            <a type="button" href="includes/edit/edit-user.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-rounded btn-floating">
                              <i class="fas fa-user-edit"></i>
                            </a>
                          </td>
                        </tr>
                        <?php $count++; ?>

                      <?php endwhile; ?>
                      <?php
                    } else {
                      $count2 = 1;
                      foreach ($users as $user) {

                      ?>

                        <tr>
                          <td scope="row"><?= $count2 ?></td>
                          <td><?= $user['lastname'] ?></td>
                          <td><?= $user['email'] ?></td>
                          <td><?= $user['code'] ?></td>
                          <td>
                            <a type="button" href="includes/files/delete-user.php?id=<?= $user['id'] ?>" onclick="return confirm('Do You Really Want To Delete this User ?');" class="btn btn-danger btn-rounded btn-floating">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                            <a type="button" href="includes/edit/edit-user.php?id=<?= $user['id'] ?>" class="btn btn-success btn-rounded btn-floating">
                              <i class="fas fa-user-edit"></i>
                            </a>
                          </td>

                        </tr>
                    <?php
                        $count2++;
                      }
                    }
                    ?>
                  </tbody>
                </table>


                <?php
                $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM users");
                $row_db = mysqli_fetch_row($result_db);
                $total_records = $row_db[0];
                $total_pages = ceil($total_records / $limit);
                /* echo  $total_pages; */
                $pagLink = "<ul class='pagination'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                  $pagLink .= "<li class='page-item'><a class='page-link' href='users.php?page=" . $i . "'>" . $i . "</a></li>";
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