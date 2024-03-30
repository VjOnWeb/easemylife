<?php
// // Database connection parameters

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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Get the user ID from the POST data
    $id = $_POST['id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("DELETE FROM course_users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
