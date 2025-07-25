<?php
    session_start(); // Start the session to access session variables
    session_unset();
    session_destroy(); // Destroy the session to log out the user
    header("Location: Login.php"); // Redirect to the login page
    exit();
?>
