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
    <title><?php echo $settings['sitename']; ?> - Website Design</title>
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
                <a href="/admin/users.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-user fa-fw me-3"></i><span>Manage Users</span></a>
                <a href="/admin/messages.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-envelope fa-fw me-3"></i><span>Manage Messages</span></a>
                <a href="/admin/plugins.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-toolbox fa-fw me-3"></i><span>Manage Plugins</span></a>
                <a href="/admin/manage-ads.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-tools fa-fw me-3"></i><span>Manage Ads</span></a>
                <a href="/admin/design.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true"><i class="fas fa-palette fa-fw me-3"></i><span>Design / SEO</span></a>
                <a href="/admin/settings.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-cog fa-fw me-3"></i><span>Website Settings</span></a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <section>
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
                                                        <h5>Website Design / SEO</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <table class="table align-middle">

                                <!--Section: webite settings -->
                                <form action="includes/files/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Custom Css</label>
                                            <textarea class="form-control ckeditor" name="css" rows="4"><?php echo $settings['css']; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Custom Js</label>
                                            <textarea class="form-control ckeditor" name="js" rows="4"><?php echo $settings['js']; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Google Analytics ID</label>
                                            <input type="text" value="<?php echo $settings['analytics']; ?>" class="form-control" name="analytics">
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" name="design" class="btn btn-primary" value="UPDATE SETTINGS">
                                </form>
                                <!--Section: add posts-->

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!--Main layout-->
    <!-- MDB -->
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="assets/js/admin.js"></script>

</body>

</html>