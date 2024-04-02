<?php
session_start();
$_SESSION = array();
session_destroy();

// Redirect the user to a login page or any other page as needed
header("Location: /easemylife/index.html");
exit();
?>
