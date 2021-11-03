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
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $settings['sitename']; ?> - Error 404</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo _SITE_URL ?>/assets/css/style.css" />


</head>

<body>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<h2>We are sorry, Page not found!</h2>
			<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
			<a href="<?php echo _SITE_URL ?>">Back To Homepage</a>
		</div>
	</div>

</body>

</html>