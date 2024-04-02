<?php
// Include database configuration
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users from the database
$sql = "SELECT id, name, username, password, email, user_type FROM course_users";
$result = $conn->query($sql);

// Prepare data array for JSON
$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Add each row as an array to the data array
        $data[] = $row;
    }
}

// Close connection
$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
