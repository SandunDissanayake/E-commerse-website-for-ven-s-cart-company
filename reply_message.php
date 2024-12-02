<!-- reply_message.php -->

<?php
session_start();
include 'config.php';

if (isset($_POST['reply']) && isset($_POST['message_id'])) {
    $reply = $_POST['reply'];
    $message_id = $_POST['message_id'];

    $insert_reply_query = "UPDATE messag SET reply = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $insert_reply_query);
    mysqli_stmt_bind_param($stmt, "si", $reply, $message_id);
    mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    header("Location: messages.php");
    exit;
}
?>
