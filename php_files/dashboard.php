<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: /easemylife/index.html");
    exit();
}

// Display dashboard content
echo "Welcome, " . $_SESSION['username'] . "! You are logged in as a " . $_SESSION['user_type'];
?>
