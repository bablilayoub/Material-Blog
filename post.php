<?php

if (!file_exists('includes/database/backup.php')) {
	header('location:/install');
	die();
}

$file_pointer = 'install/index.php';
if (file_exists($file_pointer)) {
	$dirname = "install";
	$cheked = "1";
}

require('includes/database/config.php');

ob_start();
if (!isset($_SESSION)) {
  session_start();
}
?>

<?php include_once('./includes/themes/' . $theme . '/header.php'); ?>
<!--  get header -->

<!--  get navbar -->
<?php include_once('./includes/themes/' . $theme . '/navbar.php'); ?>

<!--  post page structure -->
<?php include_once('./includes/themes/' . $theme . '/view/post_page.php'); ?>

<!--  get sidebar -->
<?php include_once('./includes/themes/' . $theme . '/post-sidebar.php'); ?>

<!--  get footer -->
<?php include_once('./includes/themes/' . $theme . '/footer.php'); ?>