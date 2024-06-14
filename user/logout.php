<?php
session_start(); // Start the session

// Destroy the session to log out the user
session_destroy(); 

// Redirect to the home page
header("Location: index.php?page=home");
exit; // Ensure no further code is executed
?>
