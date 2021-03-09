<?php require ("logo.php"); ?>
<?php
    session_start();
    // session_destroy();
    unset($_SESSION['user']);
    unset($_SESSION['password']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    unset($_SESSION['status']);

    header('location: login.php?active=1');
?>