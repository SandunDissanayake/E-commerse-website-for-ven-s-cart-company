<?php
$hostname = "localhost";
$dbuser = "root";
$dbpassword = "Nisura123#";
$dbname = "review";
$conn= mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);
if (!$conn) {
    die("Something Went Wrong");
    
}
?>
