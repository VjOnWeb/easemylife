<?php


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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users from the database
$sql = "SELECT * FROM course_users";
$result = $conn->query($sql);
$i = 1;
// Display users in a table format
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Username</th><th>password</th><th>Email</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["email"] . "</td><td> <button  class=\"delete-btn\" id=\"delete_" . $row["id"] . "\">Delete</button></td></tr>";
    }
    echo "</table>";
} else {
    echo "No users found";
}

// Close connection
$conn->close();
?>
