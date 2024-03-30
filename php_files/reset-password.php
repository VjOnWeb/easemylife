<?php
include_once 'config.php';

// Check if a token is present in the URL
if (isset($_GET['token'])) {
    // Retrieve the token from the URL
    $token = $_GET['token'];

    // Validate the token (You might want to implement token validation logic here)

    // Prepare and execute a query to check if the token exists and is valid
    $stmt = $db->prepare("SELECT * FROM reset_tokens WHERE token = ? AND expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row with the token exists and it has not expired
    if ($result->num_rows == 1) {
    // If the token is valid, display the password reset form
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Reset</title>
    </head>
    <body>
        <h2>Password Reset</h2>
        <form action="reset_password_process.php" method="post">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <div>
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </body>
    </html>
    <?php
} else {
 // If the token is not present or invalid, display an error message
 echo "Invalid or expired token.";
}
} else {
// If the token is not present in the URL, display an error message
echo "Token not found.";
}

?>
