<?php
session_start();
session_destroy(); // Destroy all session data
header("Location: logout.php"); // Redirect to login page after logout
exit;
?>