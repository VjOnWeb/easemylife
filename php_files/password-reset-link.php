<?php
 
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
// Required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
 
// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" ) { // Check for form submission properly
    $email = $_POST["email"]; // Retrieve email from form
    
    // Create PHPMailer instance
    $mail = new PHPMailer(true);
 
    // Server settings
    $mail->isSMTP();                              // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';         // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                      // Enable SMTP authentication
    $mail->Username   = 'vijayanandvj1998@gmail.com'; // SMTP email address
    $mail->Password   = 'fkpg xhni cnhj qxkj';      // SMTP password
    $mail->SMTPSecure = 'ssl';                    // Enable implicit SSL encryption
    $mail->Port       = 465;                      // TCP port to connect to
 
    // Recipients
    $mail->setFrom('vijayanandvj1998@gmail.com', 'From Vijay'); // Set your email address and name as the sender
    $mail->addAddress($email); // Add the recipient email address

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Password Reset'; // Email subject

    // Construct the password reset link
    $reset_link = 'https://localhost/online-course/get-started/reset_password.php?token=' . md5(uniqid(rand(), true));

    // HTML content for the email body
    $mail->Body = "
        <p>Hello,</p>
        <p>You have requested to reset your password. Click the button below to reset your password:</p>
        <p><a href='$reset_link'><button style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>Reset Password</button></a></p>
        <p>If you did not request this, please ignore this email.</p>
    ";

    // Send email
    try {
        $mail->send();
        echo "<script>alert('Message was sent successfully!'); document.location.href = 'index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
} else {
    // Handle case when form is not submitted properly
    echo "<script>alert('Form not submitted properly.'); document.location.href = 'index.html';</script>";
}

?>
