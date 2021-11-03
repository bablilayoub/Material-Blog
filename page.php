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
<?php include_once('includes/themes/' . $theme . '/header-page.php'); ?>
<!--  get header -->

<!--  get navbar -->
<?php include_once('includes/themes/' . $theme . '/navbar.php'); ?>

<!--  fetch posts data -->
<?php include_once('includes/themes/' . $theme . '/view/page-data.php'); ?>

<!--  get sidebar -->
<?php include_once('includes/themes/' . $theme . '/sidebar.php'); ?>

<!--  get footer -->
<?php include_once('includes/themes/' . $theme . '/footer.php'); ?>