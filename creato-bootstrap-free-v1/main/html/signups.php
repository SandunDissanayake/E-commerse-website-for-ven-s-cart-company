<?php
session_start();
require_once "database.php"; // Include the database connection file

if (isset($_SESSION["user"])) {
    header("Location: indexs.php");
    exit; // Terminate the script after redirection
}

if (isset($_POST["submit"])) {
    $fullname = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat = $_POST["cpassword"];

    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    if (empty($fullname) || empty($email) || empty($password) || empty($repeat)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not Valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters");
    }
    if ($password !== $repeat) {
        array_push($errors, "Password doesn't match");
    }

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        array_push($errors, "Email already exists");
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordhash);
        mysqli_stmt_execute($stmt);

        echo "<div class='alert alert-success'>Registered Successfully.</div>";

        header("Location: logout.php"); // Redirect to login page after successful registration
        exit; // Terminate the script after redirection
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <style>
        body { background-color: #000; }
        .padding { padding: 5rem !important; }
        .signup-form { background-color: #fff; padding: 45px; border-radius: 1px; }
        h2 { font-size: 36px; letter-spacing: 0.08em; }
        .signup-form .form-control { font-size: 16px; padding: 10px 15px; color: #555; background-color: #fff; border-radius: 3px; }
        .signup-form input { border: 1px solid #eee; height: 38px; box-shadow: none !important; }
        .btn-blue { background: #44c5ee; padding: 10px 28px; border: 2px solid #44c5ee; color: #fff; border-radius: 50px; font-weight: 700; letter-spacing: 0.08em; -webkit-transition: 0.5s all; transition: 0.5s all; box-shadow: 0px 0px 60px 0px rgba(68, 197, 238, 0.6); outline: none !important; }
        .btn-blue:hover, .btn-blue:focus, .btn-blue:active { background: #fff; color: #496174; }
    </style>
</head>
<body>
<div class="padding container d-flex justify-content-center">
    <div class="col-md-10 col-md-offset-1">
        <form class="signup-form" method="post">
            <h2 class="text-center">SIGNUP NOW</h2>
            <hr>
            <div class="form-group"> <input type="text" class="form-control" placeholder="User Name" required="required" name="username" id="username"> </div>
            <div class="form-group"> <input type="email" class="form-control" placeholder="Email Address" required="required" name="email" id="email" > </div>
            <div class="form-group"> <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password" > </div>
            <div class="form-group"> <input type="password" class="form-control" placeholder="Confirm Password" required="required" name="cpassword" id="cpassword" > </div>
            <div class="form-group text-center"> <input type="submit" class="btn btn-blue btn-block" name="submit" id="submit" ></div>
            <br>
            <p> Have an account? <a href="logout.php"> Login</a></p>
        </form>
    </div>
</div>
</body>
</html>
