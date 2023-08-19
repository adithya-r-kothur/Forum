<?php
session_start();

// Destroy the session and log the user out
session_destroy();

// Redirect to the main forum page (index.php)
header('Location: index.php');
exit();
?>
