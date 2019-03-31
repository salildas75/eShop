<?php session_start(); ?>


 
<?php
    $_SESSION['customer_username'] = null;

header("Location: index.php");

?>