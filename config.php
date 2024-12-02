<?php
$hostname = "localhost";
$dbuser = "root";
$dbpassword = "Nisura123#";
$dbname = "shop";
$conn= mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);
if (!$conn) {
    die("Something Went Wrong");
    
}
?>