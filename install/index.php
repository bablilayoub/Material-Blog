<?php
$server = $_SERVER['SERVER_SOFTWARE'];

if (!file_exists('../includes/database/backup.php')) {
} else {
  header('Location: /');
}

require '../includes/lib/vendor/composer/autoload_get.php';
$api = new LicenseBoxExternalAPI();
$filename = '../includes/database/database.sql';

if (isset($_POST['submit'])) {
  $empty = "";
  if ($_POST["host"] == $empty) {
  } else {

    $db_host = $_POST["host"];
    $db_user = $_POST["user"];
    $db_pass = $_POST["pass"];
    $db_name = $_POST["name"];

    // Create connection
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      copy("../includes/database/config.php", "../includes/database/backup.php");
      $file = "../includes/database/config.php";
      file_put_contents($file, str_replace("db_host", $db_host, file_get_contents($file)));
      file_put_contents($file, str_replace("db_username", $db_user, file_get_contents($file)));
      file_put_contents($file, str_replace("db_password", $db_pass, file_get_contents($file)));
      file_put_contents($file, str_replace("db_name", $db_name, file_get_contents($file)));
    }
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>INDIEXD - Installer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" crossorigin="anonymous" />
  <style type="text/css">
    body,
    html {
      background: #4281ff;
      color: #ffffff;
    }

    .title {
      color: #ffffff;
    }
  </style>
</head>

<body>
  <?php
  $errors = false;
  $step = isset($_GET['step']) ? $_GET['step'] : '';
  ?>
  <div class="container" style="padding-top: 20px;">
    <div class="section">
      <div class="columns is-centered">
        <div class="column is-two-fifths">
          <center>
            <h1 class="title" style="padding-top: 20px">INDIEXD INSTALLER</h1><br>
          </center>
          <div class="box">
            <?php
            switch ($step) {
              default: ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li class="is-active">
                      <a>
                        <span><b>Requirements</b></span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Verify</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Database</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Website Settings</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php
                // Add or remove your script's requirements below
                if (phpversion() < "7.4") {
                  $errors = true;
                  echo "<div class='notification is-danger is-light' style='padding:12px;'><i class='fa fa-times'></i> Minimum PHP 7.4 or higher required.</div>";
                } else {
                  echo "<div class='notification is-success is-light' style='padding:12px;'><i class='fa fa-check'></i> You are running PHP version " . phpversion() . "</div>";
                }
                if (!extension_loaded('mysqli')) {
                  $errors = true;
                  echo "<div class='notification is-danger is-light' style='padding:12px;'><i class='fa fa-times'></i> MySQLi PHP extension missing!</div>";
                } else {
                  echo "<div class='notification is-success is-light' style='padding:12px;'><i class='fa fa-check'></i> MySQLi PHP extension available</div>";
                }
                if (!extension_loaded('gd')) {
                  $errors = true;
                  echo "<div class='notification is-danger is-light' style='padding:12px;'><i class='fa fa-times'></i> GD PHP extension missing!</div>";
                } else {
                  echo "<div class='notification is-success is-light' style='padding:12px;'><i class='fa fa-check'></i> GD PHP extension available</div>";
                }
                ?>
                <div style='text-align: right;'>
                  <?php if ($errors == true) { ?>
                    <a href="#" class="button is-link is-rounded" disabled>Next</a>
                  <?php } else { ?>
                    <a href="index.php?step=0" class="button is-link is-rounded">Next</a>
                  <?php } ?>
                </div><?php
                      break;
                    case "0": ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Requirements</span>
                      </a>
                    </li>
                    <li class="is-active">
                      <a>
                        <span><b>Verify</b></span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Database</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Website Settings</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php
                      $license_code = null;
                      $client_name = null;
                      if (!empty($_POST['license']) && !empty($_POST['client'])) {
                        $license_code = strip_tags(trim($_POST["license"]));
                        $client_name = strip_tags(trim($_POST["client"]));
                        /* Once we have the license code and client's name we can use LicenseBoxExternalAPI's activate_license() function for activating/installing the license, if the third parameter is empty a local license file will be created which can be used for background license checks. */
                        $activate_response = $api->activate_license($license_code, $client_name);
                        if (empty($activate_response)) {
                          $msg = 'Server is unavailable.';
                        } else {
                          $msg = $activate_response['message'];
                        }
                        if ($activate_response['status'] != true) { ?>
                    <form action="index.php?step=0" method="POST">
                      <div class="notification is-danger is-light"><?php echo ucfirst($msg); ?></div>
                      <div class="field">
                        <label class="label">License code</label>
                        <div class="control">
                          <input class="input" type="text" placeholder="Enter Your License Code" name="license" required>
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Your name</label>
                        <div class="control">
                          <input class="input" type="text" placeholder="Enter Your Client Username" name="client" required>
                        </div>
                      </div>
                      <div style='text-align: right;'>
                        <a href="https://indiexd.com" class="button is-link is-rounded">Get Free License</a>

                        <button type="submit" class="button is-link is-rounded">Verify</button>
                      </div>
                    </form><?php
                          } else { ?>
                    <form action="index.php?step=1" method="POST">
                      <div class="notification is-success is-light"><?php echo ucfirst($msg); ?></div>
                      <input type="hidden" name="lcscs" id="lcscs" value="<?php echo ucfirst($activate_response['status']); ?>">
                      <div style='text-align: right;'>
                        <button type="submit" class="button is-link">Next</button>
                      </div>
                    </form><?php
                          }
                        } else { ?>
                  <form action="index.php?step=0" method="POST">
                    <div class="field">
                      <label class="label">License code</label>
                      <div class="control">
                        <input class="input" type="text" placeholder="Enter Your License Code" name="license" required>
                      </div>
                    </div>
                    <div class="field">
                      <label class="label">Your name</label>
                      <div class="control">
                        <input class="input" type="text" placeholder="Enter Your Client Username" name="client" required>
                      </div>
                    </div>
                    <div style='text-align: right;'>
                      <a href="https://indiexd.com" class="button is-link is-rounded">Get Free License</a>
                      <button type="submit" class="button is-link is-rounded">Verify</button>
                    </div>
                  </form>
                <?php }
                        break;
                      case "1": ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Requirements</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Verify</span>
                      </a>
                    </li>
                    <li class="is-active">
                      <a>
                        <span><b>Database</b></span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Website Settings</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php
                        if ($_POST && isset($_POST["lcscs"])) {
                          $valid = strip_tags(trim($_POST["lcscs"]));
                          $db_host = strip_tags(trim($_POST["host"]));
                          $db_user = strip_tags(trim($_POST["user"]));
                          $db_pass = strip_tags(trim($_POST["pass"]));
                          $db_name = strip_tags(trim($_POST["name"]));
                          // Let's import the sql file into the given database
                          if (!empty($db_host)) {
                            $con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                            if (mysqli_connect_errno()) { ?>
                      <form action="index.php?step=1" method="POST">
                        <div class='notification is-danger is-light'>Failed to connect to MySQL: <?php echo mysqli_connect_error(); ?></div>
                        <input type="hidden" name="lcscs" id="lcscs" value="<?php echo $valid; ?>">
                        <div class="field">
                          <label class="label">Database Host</label>
                          <div class="control">
                            <input class="input" type="text" id="host" placeholder="enter your database host" name="host" required>
                          </div>
                        </div>
                        <div class="field">
                          <label class="label">Database Username</label>
                          <div class="control">
                            <input class="input" type="text" id="user" placeholder="enter your database username" name="user" required>
                          </div>
                        </div>
                        <div class="field">
                          <label class="label">Database Password</label>
                          <div class="control">
                            <input class="input" type="text" id="pass" placeholder="enter your database password" name="pass">
                          </div>
                        </div>
                        <div class="field">
                          <label class="label">Database Name</label>
                          <div class="control">
                            <input class="input" type="text" id="name" placeholder="enter your database name" name="name" required>
                          </div>
                        </div>
                        <div style='text-align: right;'>
                          <button type="submit" name="submit" class="button is-link is-rounded">Import</button>
                        </div>
                      </form>
                    <?php
                              exit;
                            }
                            $templine = '';
                            $lines = file($filename);
                            foreach ($lines as $line) {
                              if (substr($line, 0, 2) == '--' || $line == '')
                                continue;
                              $templine .= $line;
                              $query = false;
                              if (substr(trim($line), -1, 1) == ';') {
                                $query = mysqli_query($con, $templine);
                                $templine = '';
                              }
                            } ?>

                    <div class='notification is-success is-light'>Database was successfully imported.</div>
                    <input type="hidden" name="dbscs" id="dbscs" value="true">
                    <div style='text-align: right;'>
                      <a href="settings.php" class="button is-link">Next</a>
                    </div>

                  <?php
                          } else { ?>
                    <form action="index.php?step=1" method="POST">
                      <input type="hidden" name="lcscs" id="lcscs" value="<?php echo $valid; ?>">
                      <div class="field">
                        <label class="label">Database Host</label>
                        <div class="control">
                          <input class="input" type="text" id="host" placeholder="enter your database host" name="host" required>
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Database Username</label>
                        <div class="control">
                          <input class="input" type="text" id="user" placeholder="enter your database username" name="user" required>
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Database Password</label>
                        <div class="control">
                          <input class="input" type="text" id="pass" placeholder="enter your database password" name="pass">
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Database Name</label>
                        <div class="control">
                          <input class="input" type="text" id="name" placeholder="enter your database name" name="name" required>
                        </div>
                      </div>
                      <div style='text-align: right;'>
                        <button type="submit" name="submit" class="button is-link is-rounded">Import</button>
                      </div>
                    </form>

                  <?php
                          }
                        } else { ?>
                  <div class='notification is-danger is-light'>Sorry, something went wrong.</div><?php
                                                                                                }
                                                                                                break;
                                                                                              case "2": ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Requirements</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Verify</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Database</span>
                      </a>
                    </li>
                    <li class="is-active">
                      <a>
                        <span><b>Website Settings</b></span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php
                                                                                                if ($_POST && isset($_POST["dbscs"])) {
                                                                                                  $valid = $_POST["dbscs"];
                ?>

                <?php
                                                                                                } else { ?>
                  <div class='notification is-danger is-light'>Sorry, something went wrong.</div><?php
                                                                                                }
                                                                                                break;
                                                                                              case "3":
                                                                                            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content has-text-centered">
    <p>Copyright <?php echo date('Y'); ?> INDIEXD LTD, All rights reserved.</p><br>
  </div>
</body>

</html>