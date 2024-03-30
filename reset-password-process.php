<?php

// Include the database configuration file
include_once 'config.php';

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the token and new password from the form
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the token (You might want to implement token validation logic here)

    // Check if passwords match
    if ($new_password === $confirm_password) {
        // Hash the new password (You should use a secure hashing algorithm such as password_hash)
        // For demonstration purposes, we'll just use md5 here
        // $hashed_password = md5($new_password);

        // Update the user's password in the database
        $sql = "UPDATE course_users SET password = '$new_password' WHERE reset_token = '$token'";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Password reset successful
            echo "Password reset successfully!";
        } else {
            // Error updating password
            echo "Error updating password: " . mysqli_error($conn);
        }
    } else {
        // Passwords don't match
        echo "Passwords do not match. Please try again.";
    }
} else {
    // If the form is not submitted via POST method, redirect to the login page or display an error message
    echo "Error: Form not submitted.";
}

?>
