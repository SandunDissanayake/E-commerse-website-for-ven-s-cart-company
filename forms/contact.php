<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_message'])) {
    $name = strip_tags(trim($_POST['name']));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST['message']);
    $subject = trim($_POST['subject']);

    // Set up email details
    $recipient = "nisurasahan12@gmail.com";
    $subject = "New Contact Form Submission: $subject";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Send the email
    if (wp_mail($recipient, $subject, $email_content)) {
      echo '<script>alert("Thank you! Your message has been sent.");</script>';
    } else {
      echo '<script>alert("Oops! Something went wrong and we couldn\'t send your message.");</script>';
    }
  }
  ?>