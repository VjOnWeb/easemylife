<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
    // If logged in, return session details as JSON
    $response = array(
        'username' => $_SESSION['username'],
        'user_type' => $_SESSION['user_type'],
        'name' => $_SESSION['name'],
        'email' => $_SESSION['email']
    );
    echo json_encode($response);
} else {
    // If not logged in, return an error message
    $response = array('error' => 'User not logged in');
    echo json_encode($response);
}
?>
