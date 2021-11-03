<?php
require('../includes/database/config.php');

if (isLogged()) {

        header('Location: ' . _SITE_URL);
        
} else {
        
        header('Location: ' . _SITE_URL . '/auth/login.php');
}
  
?>