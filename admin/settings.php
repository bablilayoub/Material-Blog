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
    <title><?php echo $settings['sitename']; ?> - Settings</title>
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
                <a href="/admin/design.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-palette fa-fw me-3"></i><span>Design / SEO</span></a>

                <a href="/admin/settings.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true"><i class="fas fa-cog fa-fw me-3"></i><span>Website Settings</span></a>
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
                                                        <h5>Website Settings</h5>
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
                                            <label>Website Name</label>
                                            <input type="text" value="<?php echo $settings['sitename']; ?>" class="form-control" name="website_name" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Website link</label>
                                            <input type="text" value="<?php echo $settings['url']; ?>" class="form-control" name="website_url" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Descrption - SEO</label>
                                            <textarea class="form-control ckeditor" name="website_description" rows="2" required><?php echo $settings['description']; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Keywords - SEO</label>
                                            <textarea class="form-control ckeditor" name="website_keywords" rows="2" required><?php echo $settings['keywords']; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Show Home Description</label>
                                            <select name="show_description" class="form-control" required>
                                                <?php
                                                $getsignup = $settings['show_description'];
                                                $settext = "yes";
                                                if ($getsignup == $settext) {
                                                ?>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                <?php
                                                } else {
                                                ?><option value="no">No</option>
                                                    <option value="yes">Yes</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
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
                                                                <h5>Website Design</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Website Template</label>
                                                <?php
                                                $dir = '../includes/themes';
                                                $exclude = array('index.php');
                                                if (is_dir($dir)) {
                                                    $contents = scandir($dir);
                                                ?>
                                                    <select name="website_theme" class="form-control" required>
                                                    <?php
                                                    foreach ($contents as $file) {
                                                        if (!in_array($file, $exclude) && substr($file, 0, 1) != '.') {
                                                            echo "<option value='{$file}'" . ($pageImage == $file ? " selected" : "") . ">{$file}</option>";
                                                        }
                                                    }
                                                    echo "</select>";
                                                }
                                                    ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Website Favicon</label>
                                                <input type="file" class="form-control" name="favicon" accept="image/*" />
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Logo / Website Name</label>
                                                <select name="interface" class="form-control" required>
                                                    <?php
                                                    $getsignup = $settings['interface'];
                                                    $settext = "logo";
                                                    if ($getsignup == $settext) {
                                                    ?>
                                                        <option value="logo">Use Logo</option>
                                                        <option value="text">Use Website Name</option>
                                                    <?php
                                                    } else {
                                                    ?><option value="text">Use Website Name</option>
                                                        <option value="logo">Use Logo</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Website Logo</label>
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
                                            <input type="text" value="<?php echo $settings['facebook']; ?>" class="form-control" name="facebook" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Instagram Page</label>
                                            <input type="text" value="<?php echo $settings['instagram']; ?>" class="form-control" name="instagram" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Youtube Channel</label>
                                            <input type="text" value="<?php echo $settings['youtube']; ?>" class="form-control" name="youtube" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Twitter Page</label>
                                            <input type="text" value="<?php echo $settings['twitter']; ?>" class="form-control" name="twitter" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Github Page</label>
                                            <input type="text" value="<?php echo $settings['github']; ?>" class="form-control" name="github" required>
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
                                                                <h5>Internal Settings</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Posts Per Page</label>
                                            <input type="text" value="<?php echo $settings['post_per_page']; ?>" class="form-control" name="post_per_page" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-12">
                                                <label>Enable Related Posts</label>
                                                <select name="enable_related" class="form-control" required>
                                                    <?php
                                                    $setrelated = $settings['enable_related'];
                                                    $settextrelated = "1";
                                                    if ($setrelated == $settextrelated) {
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
                                                <label>Related Posts Limit</label>
                                                <?php $getlimit = $settings['related_limit'] - 1; ?>
                                                <input type="text" value="<?php echo $getlimit; ?>" class="form-control" name="related_limit" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <label>Enable Sign Up</label>
                                        <select name="signup" class="form-control" required>

                                            <?php
                                            $getsignup = $settings['signup'];
                                            $settext = "yes";
                                            if ($getsignup == $settext) {
                                            ?>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <label>Enable Comments</label>
                                        <select name="comments" class="form-control" required>
                                            <?php
                                            $getsignup = $settings['comments'];
                                            $settext = "yes";
                                            if ($getsignup == $settext) {
                                            ?>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <section>
                                                <div class="row">
                                                    <div class="mb-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5>Email Settings</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Website Email</label>
                                            <input type="email" value="<?php echo $settings['website_email']; ?>" class="form-control" name="website_email" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <label>Website Status</label>
                                        <select name="status" class="form-control" required>
                                            <?php
                                            $getsignup = $settings['status'];
                                            $settext = "close";
                                            if ($getsignup == $settext) {
                                            ?>
                                                <option value="close">Close</option>
                                                <option value="live">Live</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="live">Live</option>
                                                <option value="close">Close</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <br>

                                    <input type="submit" name="update" class="btn btn-primary" value="UPDATE SETTINGS">
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