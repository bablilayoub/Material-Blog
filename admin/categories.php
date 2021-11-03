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
    <title><?php echo $settings['sitename']; ?> - Categories</title>
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
                <a href="/admin/categories.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
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

            <!--Section: posts-->
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <section>
                            <div class="row">
                                <div class="mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                                Add New Category
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
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
                                                            <h5>Manage Categories</h5>
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
                                            <th>Category Name</th>
                                            <th>Slug</th>
                                            <th>Parent ID</th>
                                            <th>Action</th>

                                        </tr>
                                        <?php
                                        $categories = getAllCategory($conn);
                                        $count = 1;
                                        foreach ($categories as $ct) {
                                        ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $ct['name'] ?></td>
                                            <td>/category<?= $ct['slug'] ?></td>
                                            <td><?= $ct['parent_id'] ?></td>
                                            <td>
                                                <a type="button" href="includes/files/delete-category.php?id=<?= $ct['id'] ?>" onclick="return confirm('Do You Really Want To Delete this Category ?');" class="btn btn-danger btn-rounded btn-floating">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php
                                            $count++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Section: posts-->
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="includes/files/add-category.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="category-name" class="form-control" id="exampleInputEmail3" placeholder="Enter category name.." required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Description</label>
                            <input type="text" name="category-description" class="form-control" id="exampleInputEmail3" placeholder="Enter category description.." required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="addct" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!--Main layout-->
    <!-- MDB -->
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="assets/js/admin.js"></script>

</body>

</html>