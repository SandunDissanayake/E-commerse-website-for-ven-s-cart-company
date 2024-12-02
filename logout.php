<?php
session_start();
require_once "config.php";

$errors = [];

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name']
            ];
            header("Location: profile.php");
            exit;
        } else {
            $errors[] = "Incorrect password. Please try again.";
        }
    } else {
        $errors[] = "User not found. Please check your email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ven's Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
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
        .signup-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <form class="login-form" method="post">
        <h2>Login to Ven's Cart</h2>
        <?php
        if (!empty($errors)) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }
        ?>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email Address" name="email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-blue btn-block" name="submit">Login</button>
        </div>
        <div class="signup-link">
            <p>Don't have an account? <a href="signup.php">Sign Up Here</a></p>
        </div>
    </form>
</div>

<!-- Bootstrap JS, jQuery and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
