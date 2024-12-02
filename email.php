<?php
$to = "jayarathnasahan257@gmail.com";
$subject = "Testing Mail";
$message = "This is a Testing Mail";
$headers = "From: nisurasahan12@gmail.com";

$check = mail($to, $subject, $message, $headers);

if ($check) {
    echo "Email sent successfully!";
} else {
    echo "Email not sent. Error: " . error_get_last()['message'];
}
?>
