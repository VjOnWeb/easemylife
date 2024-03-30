<?php
// Include the database configuration file
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
