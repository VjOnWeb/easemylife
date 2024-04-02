<?php
// Include the database configuration file
include_once 'config.php';

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Fetch user data from database
$sql = "SELECT * FROM course_users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User exists, verify password
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
        // Password is correct, set session and redirect to dashboard
        // Set session cookie parameters
        session_set_cookie_params(1200); // 1200 seconds = 20 minutes

        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Incorrect password
        echo "Incorrect password. Please try again.";
    }
} else {
    // User does not exist
    echo "User not found. Please register first.";
}

// Close connection
mysqli_close($conn);
?>
