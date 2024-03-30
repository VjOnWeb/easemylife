<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email address from the form
    $email = $_POST["email"];

    // Output the email address for debugging
    echo "Email: " . $email;

    // Perform further processing here...
}
?>
