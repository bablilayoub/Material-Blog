</div>
<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light">
    <h1 class="mb-3 h2"><?php echo $pages['name']; ?></h1>
    <?php $checkdata = $settings['show_description'];
    $set = "yes";
    if ($checkdata == $set) {
    ?>
        <p class="mb-3"><?php echo $pages['description']; ?></p>
    <?php
    } else {
    }
    ?>
    <?php
    if ($cheked == "1") {
    ?>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            WARNING !!!!!
        </button>
        <!-- delte install folder -->
        <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="false">
            <div class="modal-dialog   modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Please DELETE install folder from your host NOW for your safety</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- delte install folder -->
    <?php
    }
    ?>
</div>
<!-- Jumbotron -->
<style>
    .col-md-4 {
        width: 33.3333333333%;
    }
</style>
</header>
<!--Main Navigation-->
</div>
</div>
</div>
<?php
$idadssidebar = 3;
$getstatusforads = 1;
$adssidebar = getads($conn, $idadssidebar);
if ($adssidebar['status'] == $getstatusforads) {
?>
    <!--  section ad -->
    <section class="text-center">
        <center>
            <?php
            echo $adssidebar['code'];
            ?>
        </center>
    </section>
    <!--  section ad -->
<?php
}
?>
<br>
<!--Main layout-->
<main class="mt-4 mb-5">

    <div class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-8 mb-4" style="width: 74.666667%;">
                <!--Section: Post data-mdb-->
                <section class="border-bottom mb-4">
                    <?php
                    if ($slug_url == "/contact") {
                    ?>
                        <!-- contact -->
                        <?php
                        if (isset($_POST['send'])) {
                            global $success_msg, $error_msg;
                            $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            $message = mysqli_real_escape_string($conn, $_POST['message']);
                            $empty = "";

                            if ($fullname == $empty && $email == $empty && $message == $empty) {
                                $error_msg = '<div class="alert alert-danger">
                                    Failed to send message.
                                </div>';
                            } else {
                                $query = "INSERT INTO contacts(fullname,email,message) VALUES('$fullname','$email','$message')";
                                if (mysqli_query($conn, $query)) {
                                    $success_msg = '<div class="alert alert-success">
                                        Message sent successfully.
                                    </div>';
                                } else {
                                    $error_msg = '<div class="alert alert-danger">
                                    Failed to send message.
                                </div>';
                                }
                            }
                        }
                        if (isLogged()) {
                        ?>
                            <center>
                                <div class="col-md-8 mb-4" style="width: 50.666667%;">
                                    <form action="" method="post">
                                        <!-- Name input -->
                                        <?php echo $success_msg; ?>
                                        <?php echo $error_msg; ?>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="fullname" id="form4Example1" value="<?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?>" class="form-control" readonly required />
                                            <label class="form-label" for="form4Example1">Full Name</label>
                                        </div>
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="form4Example2" value="<?php echo $_SESSION['email']; ?>" class="form-control" readonly required />
                                            <label class="form-label" for="form4Example2">Email address</label>
                                        </div>
                                        <!-- Message input -->
                                        <div class="form-outline mb-4">
                                            <textarea class="form-control" name="message" id="form4Example3" rows="4" required></textarea>
                                            <label class="form-label" for="form4Example3">Message</label>
                                        </div>
                                        <!-- Submit button -->
                                        <button type="submit" name="send" class="btn btn-primary btn-block mb-4">Send</button>
                                    </form>
                                </div>
                            </center>
                        <?php
                        } else {
                            if (isset($_POST['send'])) {
                                global $success_msg, $error_msg;
                                $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                                $email = mysqli_real_escape_string($conn, $_POST['email']);
                                $message = mysqli_real_escape_string($conn, $_POST['message']);
                                $empty = "";

                                if ($fullname == $empty && $email == $empty && $message == $empty) {
                                    $error_msg = '<div class="alert alert-danger">
                                        Failed to send message.
                                    </div>';
                                } else {
                                    $query = "INSERT INTO contacts(fullname,email,message) VALUES('$fullname','$email','$message')";
                                    if (mysqli_query($conn, $query)) {
                                        $success_msg = '<div class="alert alert-success">
                                            Message sent successfully.
                                        </div>';
                                    } else {
                                        $error_msg = '<div class="alert alert-danger">
                                        Failed to send message.
                                    </div>';
                                    }
                                }
                            }
                        ?>
                            <center>
                                <div class="col-md-8 mb-4" style="width: 50.666667%;">
                                    <form action="" method="post">
                                        <?php echo $success_msg; ?>
                                        <?php echo $error_msg; ?>
                                        <!-- Name input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" name="fullname" id="form4Example1" class="form-control" required />
                                            <label class="form-label" for="form4Example1">Full Name</label>
                                        </div>
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="form4Example2" class="form-control" required />
                                            <label class="form-label" for="form4Example2">Email address</label>
                                        </div>
                                        <!-- Message input -->
                                        <div class="form-outline mb-4">
                                            <textarea name="message" class="form-control" id="form4Example3" rows="4"></textarea>
                                            <label class="form-label" name="message" for="form4Example3">Message</label>
                                        </div>
                                        <!-- Submit button -->
                                        <button type="submit" name="send" class="btn btn-primary btn-block mb-4">Send</button>
                                    </form>
                                </div>
                            </center>
                        <?php
                        }
                        ?>
                        <!-- contact -->
                    <?php
                    } else {
                    ?>
                        <?= $pages['content'] ?>
                    <?php
                    }
                    ?>
                </section>
            </div>

            <!--Grid column-->
            <!--  get sidebar -->
            <?php include_once('./includes/themes/' . $theme . '/sidebar.php'); ?>
            <?php
            $idadssidebar = 3;
            $getstatusforads = 1;
            $adssidebar = getads($conn, $idadssidebar);
            if ($adssidebar['status'] == $getstatusforads) {
            ?>
                <!--  section ad -->
                <section class="text-center">
                    <center>
                        <?php
                        echo $adssidebar['code'];
                        ?>
                    </center>
                </section>
                <!--  section ad -->
            <?php
            }
            ?>
        </div>
        <!--Grid row-->
    </div>
</main>
<!--Main layout-->