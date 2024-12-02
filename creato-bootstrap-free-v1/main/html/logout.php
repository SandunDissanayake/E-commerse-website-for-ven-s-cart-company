<?php
session_start();
require_once "database.php"; // Include the database connection file

if (isset($_SESSION["user"])) {
    header("Location: indexs.php");
    exit; // Terminate the script after redirection
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION["user"] = $row['id']; // Assuming 'id' is the user ID column in your database
            header("Location: indexs.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Incorrect password</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email not found</div>";

        
        header("Location: indexs.php"); 
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <!-- CSS styles -->
</head>
<body>
<div class="padding container d-flex justify-content-center">
    <div class="col-md-10 col-md-offset-1">
        <form class="signup-form" method="post">
            <h2 class="text-center">Log In</h2>
            <hr>
            <div class="form-group"> <input type="email" class="form-control" placeholder="Email Address" required="required" name="email" id="email" > </div>
            <div class="form-group"> <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password" > </div>
            <div class="form-group text-center"> <input type="submit" class="btn btn-blue btn-block" name="submit" id="submit" ></div>
            <br>
            <p>Don't Have an account?<a href="signups.php"> Signup</a></p>
        </form>
    </div>
</div>
</body>
</html>
