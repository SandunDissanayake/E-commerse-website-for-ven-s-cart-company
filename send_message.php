<!-- send_message.php -->

<?php
session_start();
include 'config.php';

if (isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $insert_query = "INSERT INTO messag (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insert_query);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
    mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    header("Location: customer_profile.php");
    exit;
}
?>
