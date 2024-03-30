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
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO course_users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    // Set parameters from POST data and execute
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($stmt->execute()) {
        echo "User added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
