<?php


$isOnline = false; // Set to true for online, false for offline

// Choose the appropriate database connection parameters based on the environment
if ($isOnline) {
     
 
$servername = "sql210.infinityfree.com";
$username = "if0_36252249"; // Update with your database username
$password = "DPI0B23XX6h"; // Update with your database password
$dbname = "if0_36252249_onlinecoursedb";
} else {
    
$servername = "localhost";
$username = "root";
$password = "new_password";
$dbname = "test";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
