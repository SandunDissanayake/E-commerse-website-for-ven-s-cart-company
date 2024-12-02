<?php
include 'components/connect.php';

$warning_msg = []; // Array to store warning messages

if(isset($_POST['submit'])){
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

   try {
      // Check if email exists in the database
      $verify_email = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
      $verify_email->execute([$email]);

      // Use fetch() to get the first row from the result set
      $fetch = $verify_email->fetch(PDO::FETCH_ASSOC);

      if($fetch) {
         // Verify the password
         if(password_verify($pass,$fetch['password'])) {
            // Password is correct, set user_id cookie and redirect
            setcookie('user_id', $fetch['id'], time() + 60*60*24*30, '/');
            header('Location: all_posts.php');
            exit;
         } else {
            $warning_msg[] = 'Incorrect password!';
         }
      } else {
         $warning_msg[] = 'Email not found!';
      }
   } catch (PDOException $e) {
      $warning_msg[] = 'Database error: ' . $e->getMessage();
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<!-- Header section -->
<?php include 'components/header.php'; ?>

<section class="account-form">
   <form action="" method="post">
      <h3>Welcome back!</h3>
      <?php
      if(!empty($warning_msg)) {
         foreach($warning_msg as $warning) {
            echo '<p class="warning">' . $warning . '</p>';
         }
      }
      ?>
      <p class="placeholder">Your Email <span>*</span></p>
      <input type="email" name="email" required maxlength="50" placeholder="Enter your email" class="box">
      <p class="placeholder">Your Password <span>*</span></p>
      <input type="password" name="pass" required maxlength="50" placeholder="Enter your password" class="box">
      <p class="link">Don't have an account? <a href="register.php">Register now</a></p>
      <input type="submit" value="Login now" name="submit" class="btn">
   </form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/script.js"></script>

<?php include 'components/alerts.php'; ?>

</body>
</html>
