<?php
session_start();
$_SESSION["test"] = "Hello Session";

echo "Session variable 'test' set.<br>";

// Check if session variable is accessible
if (isset($_SESSION["test"])) {
    echo "Session variable 'test' value: " . $_SESSION["test"];
} else {
    echo "Session variable 'test' not found.";
}
?>
