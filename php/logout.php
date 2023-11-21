<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the index page or any other desired page
header("Location: ../index.html");
exit();
?>
