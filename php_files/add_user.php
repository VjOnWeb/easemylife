<?php
// Database connection parameters (same as fetch_users.php)
// Database connection parameters

// $servername = "localhost";
// $username = "root"; // Update with your database username
// $password = "new_password"; // Update with your database password
// $dbname = "test";

// Infinityfree.com if0_36252249

// $servername = "sql210.infinityfree.com";
// $username = "if0_36252249"; // Update with your database username
// $password = "DPI0B23XX6h"; // Update with your database password
// $dbname = "if0_36252249_onlinecoursedb";

// $isOnline = false; // Set to true for online, false for offline

// // Choose the appropriate database connection parameters based on the environment
// if ($isOnline) {
     
 
// $servername = "sql210.infinityfree.com";
// $username = "if0_36252249"; // Update with your database username
// $password = "DPI0B23XX6h"; // Update with your database password
// $dbname = "if0_36252249_onlinecoursedb";
// } else {
    
// $servername = "localhost";
// $username = "root";
// $password = "new_password";
// $dbname = "test";
// }

// Include database configuration
include_once 'config.php';

// Get form data and sanitize
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password for security
// $password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Set default user type as 'user'
$user_type = 'user';

// Insert user data into database
$sql = "INSERT INTO course_users (name, email, username, password, user_type) VALUES ('$name', '$email', '$username', '$password', '$user_type')";
if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

