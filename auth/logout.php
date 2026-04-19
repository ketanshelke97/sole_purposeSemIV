<?php
    // This file logs the user out and redirects them to the homepage.
    session_start();

    session_unset();
    session_destroy();

    // Include config to get BASE_URL for redirection
    include __DIR__ . '/../config.php';
    header("location: " . BASE_URL . "index.php"); // Redirect to the homepage
    exit;

?>
