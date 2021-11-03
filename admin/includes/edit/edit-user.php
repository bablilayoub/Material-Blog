<?php
include('../../../includes/database/config.php');
include('../../includes/app/functions.php');
include('../../includes/app/core.php');
if (isAdmin($conn)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $users = getUserData($conn, $id);
    }
} else {
    header('Location: ' . _SITE_URL . '/error.php');
    $sit_url = _SITE_URL;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo $settings['sitename']; ?> - Edit User</title>
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
    <?php include('../template/navbar.php'); ?>
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
                <div class="mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table align-middle">
                                <!--Section: webite settings -->
                                <form action="../files/update-user.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>First Name</label>
                                                <input type="text" value="<?php echo $users['firstname']; ?>" class="form-control" name="firstname" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Last Name</label>
                                                <input type="text" value="<?php echo $users['lastname']; ?>" class="form-control" name="lastname" required>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>About</label>
                                            <textarea class="form-control ckeditor" name="about" rows="2" required><?php echo $users['about']; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Email</label>
                                            <input type="email" value="<?php echo $users['email']; ?>" class="form-control" name="email" required>
                                            <input type="text" value="<?php echo $users['id']; ?>" class="form-control" name="id" required hidden>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Is Admin</label>
                                                <select name="isAdmin" class="form-control" required>
                                                    <?php
                                                    $getsignup = $users['isAdmin'];
                                                    $settext = "1";
                                                    if ($getsignup == $settext) {
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
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Is Active</label>
                                                <select name="is_active" class="form-control" required>
                                                    <?php
                                                    $getsignup = $users['is_active'];
                                                    $settext = "1";
                                                    if ($getsignup == $settext) {
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
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Mobile Number</label>
                                                <input type="tel" value="<?php echo $users['mobilenumber']; ?>" class="form-control" name="mobilenumber" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>User Image</label>
                                                <input type="file" class="form-control" name="image" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <section>
                                                <div class="row">
                                                    <div class="mb-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5>Social Settings</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Facebook Page</label>
                                            <input type="text" value="<?php echo $users['facebook']; ?>" class="form-control" name="facebook" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Instagram Page</label>
                                            <input type="text" value="<?php echo $users['instagram']; ?>" class="form-control" name="instagram" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Youtube Channel</label>
                                            <input type="text" value="<?php echo $users['youtube']; ?>" class="form-control" name="youtube" required>
                                        </div>
                                    </div>
                                    <br>

                                    <input type="submit" name="updateuser" class="btn btn-primary" value="UPDATE USER">
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
    <script type="text/javascript" src="../../assets/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="../../assets/js/admin.js"></script>

</body>

</html>