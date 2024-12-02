<?php
session_start();
require_once "config.php"; // Include the database connection file

$errors = [];

if (isset($_POST["submit"])) {
    $fullname = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat = $_POST["cpassword"];

    // Validate input
    if (empty($fullname) || empty($email) || empty($password) || empty($repeat)) {
        $errors[] = "All fields are required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    if ($password !== $repeat) {
        $errors[] = "Passwords do not match";
    }

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Email already exists";
    }

    // Check if username already exists
    $sql_username = "SELECT * FROM users WHERE username = ?";
    $stmt_username = mysqli_prepare($conn, $sql_username);
    mysqli_stmt_bind_param($stmt_username, "s", $fullname);
    mysqli_stmt_execute($stmt_username);
    $result_username = mysqli_stmt_get_result($stmt_username);

    if (mysqli_num_rows($result_username) > 0) {
        $errors[] = "Username already exists";
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user into database
        $sql_insert = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $sql_insert);
        mysqli_stmt_bind_param($stmt_insert, "sss", $fullname, $email, $passwordhash);

        if (mysqli_stmt_execute($stmt_insert)) {
            // Registration successful, store user data in session
            $_SESSION['user'] = [
                'name' => $fullname,
                'email' => $email
                // You can also include other user data if needed
            ];
            // Redirect to profile or dashboard after successful signup
            header("Location: profile.php");
            exit;
        } else {
            $errors[] = "Registration failed. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Ven's Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .signup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .signup-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .signup-form h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            height: 45px;
            font-size: 16px;
        }
        .btn-blue {
            background-color: #44c5ee;
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.08em;
            transition: all 0.3s ease;
        }
        .btn-blue:hover {
            background-color: #1e90ff;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="signup-container">
    <form class="signup-form" method="post">
        <h2>SIGNUP TO VEN'S CART</h2>
        <?php
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }
        ?>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Full Name" name="username" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email Address" name="email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-blue btn-block" name="submit">Signup</button>
        </div>
        <div class="login-link">
            <p>Already have an account? <a href="logout.php">Login Here</a></p>
        </div>
    </form>
</div>

<!-- Bootstrap JS, jQuery and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
