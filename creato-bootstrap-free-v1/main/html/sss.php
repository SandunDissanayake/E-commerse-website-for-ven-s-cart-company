<?php

@include 'database.php';


if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];
        header("Location: indexs.php"); // Redirect to homepage after signup
        exit();
    } else {
        $error = "Error occurred while signing up";
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
<form id="signup-form">
  <input type="text" placeholder="Full Name" required>
  <input type="email" placeholder="Email" required>
  <input type="password" placeholder="Password" required>
  <input type="password" placeholder=" Confirm Password" required>
  <button type="submit">Sign Up</button>
</form>



</body>
</html>