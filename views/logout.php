<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the home page or any other page after logout
    header("Location: index.php");
    exit();
} else {
    // If the user is not logged in, redirect to the home page
    header("Location: login.php");
    exit();
}
?>
