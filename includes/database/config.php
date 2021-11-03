<?php

// require core files
require $_SERVER['DOCUMENT_ROOT'] . '/includes/controllers/routes.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/app/functions.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/lib/vendor/composer/autoload_get.php';
$api = new LicenseBoxExternalAPI();

ob_start();
// Set sessions
if (!isset($_SESSION)) {
  session_start();
}

// database info   
$servername = "db_host";
$username = "db_username";
$password = "db_password";
$database = "db_name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// get core files
require $_SERVER['DOCUMENT_ROOT'] . '/includes/app/core.php';


//website url
define('_SITE_URL', $geturl);
