<?php

@include 'database.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header("Location: indexs.php"); // Redirect to homepage after login
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sas.css">
</head>
<body>
    <!-- Login form -->
<form id="login-form" method="POST" action="login.php">
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit" name="login">Login</button>
</form>

<!-- Signup form -->

<div id="user-info" style="display: none;">
  <span id="user-name"></span>
</div>
</body>
</html>