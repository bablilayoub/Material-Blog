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

<?php
$check = $settings['status'];
$set = "live";
if ($check == $set) {
    header('Location: ' . _SITE_URL . '/');
} else {
?>

<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $settings['sitename']; ?> - We will be back soon</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo _SITE_URL ?>/assets/css/style.css" />


</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Soon</h1>
			</div>
			<h2>We&rsquo;ll be back soon!</h2>
			<p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. We are working hard to reopen the site as soon as possible !</p>
		</div>
	</div>

</body>

</html>
