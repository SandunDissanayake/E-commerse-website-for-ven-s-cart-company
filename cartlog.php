<?php
session_start();
require_once "config.php"; // Include the database connection file

// Redirect logged-in users to the cart page
if (isset($_SESSION["user"])) {
    header("Location: cart.php");
    exit; // Terminate the script after redirection
}

$errors = [];

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
            header("Location: cart.php");
            exit;
        } else {
            $errors[] = "Incorrect password";
        }
    } else {
        $errors[] = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ve's Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-form h2 {
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
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <form class="login-form" method="post">
        <h2 class="text-center">Log In to Ve's Cart</h2>
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email Address" required="required" name="email" id="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-blue btn-block" name="submit">Login</button>
        </div>
        <div class="register-link">
            <p>Don't have an account? <a href="signup.php">Signup here</a></p>
        </div>
    </form>
</div>

<!-- Bootstrap JS, jQuery and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
