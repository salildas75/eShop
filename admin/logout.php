<?php session_start(); ?>


 
<?php
    $_SESSION['admin_user'] = null;
    $_SESSION['admin_id'] = null;

header("Location: login.php");

?>