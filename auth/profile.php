<?php 
require('../includes/database/config.php');

    ob_start();
    if(!isset($_SESSION)) {
      session_start();
  }
?>

    <!--  get header -->
    <?php include_once('../includes/themes/modern/header.php'); ?>

    <!--  get navbar -->
    <?php include_once('../includes/themes/modern/navbar.php'); ?>
  

    <!--  fetch posts data -->
    <form action="Profile_update.php" method="post">
   fname: <input type="text" name="fname"><br>
 
   lname: <input type="text" name="lname"><br>
 
   email: <input type="email" name="email"><br>
   
   <input type="submit" name="edit">
   
</form>

    
    <!--  get pages -->
    <?php include_once('../includes/themes/modern/view/navigation.php'); ?>

    
    <!--  get footer -->
    <?php include_once('../includes/themes/modern/footer.php'); ?>
          
