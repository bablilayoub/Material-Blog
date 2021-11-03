<?php
include('../../../includes/database/config.php');
include('../../includes/app/functions.php');
include('../../includes/app/core.php');

if (isAdmin($conn)) {
    // dont change the token
    $token = 8741941626541;
    $sql = "SELECT * FROM plugins WHERE token = $token";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $status = $row['status'];
            $id = $row['id'];
            $where = $row['place'];
        }
    }
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
    <title><?php echo $settings['sitename']; ?> - <?php echo $name; ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../../assets/css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../../assets/css/admin.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>

<body>

    <?php include('../../includes/template/navbar.php'); ?>
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
                <a href="/admin/plugins.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true"><i class="fas fa-toolbox fa-fw me-3"></i><span>Manage Plugins</span></a>
                <a href="/admin/manage-ads.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-tools fa-fw me-3"></i><span>Manage Ads</span></a>
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
                                                        <h5><?= $name; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <table class="table align-middle">

                                <!--Section: watermark -->
                                <form action="../files/update-watermark.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Plugin Name</label>
                                            <input type="text" value="<?= $name; ?>" class="form-control" name="plugin_name" required>
                                            <input type="text" value="<?= $token; ?>" class="form-control" name="plugin_token" required hidden>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Enable Watermark</label>
                                            <select name="enabled" class="form-control" required>
                                                <?php
                                                $getstatus = $status;
                                                $settext = 1;
                                                if ($getstatus == $settext) {
                                                ?>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                <?php
                                                } else {
                                                ?><option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Watermark Place</label>
                                                <select name="place" class="form-control" required>
                                                    <option value="1">Right bottom</option>
                                                    <option value="2">Right Top</option>
                                                    <option value="3">Middle</option>
                                                    <option value="4">Left bottom</option>
                                                    <option value="5">Left Top</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Upload Watermark</label>
                                                <input type="file" class="form-control" name="image" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" name="update" class="btn btn-primary" value="UPDATE SETTINGS">
                                </form>
                                <!--Section: watermark-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!--Main layout-->
    <!-- MDB -->
    <script type="text/javascript" src="../../assets/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="../../assets/js/admin.js"></script>

</body>

</html>