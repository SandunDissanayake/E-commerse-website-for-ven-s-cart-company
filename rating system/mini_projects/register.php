<?php
// Function to generate a unique ID
function generate_unique_id() {
    return uniqid(); // Generates a unique ID based on the current timestamp
}

// Database connection and error handling
include 'components/connect.php'; // Include database connection

$warning_msg = []; // Array to store warning messages
$success_msg = []; // Array to store success messages

if(isset($_POST['submit'])) {
    // Retrieve and sanitize form inputs
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['pass'];
    $confirm_password = $_POST['c_pass'];

    // Validate form data
    if(empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $warning_msg[] = 'All fields are required.';
    } elseif($password !== $confirm_password) {
        $warning_msg[] = 'Passwords do not match.';
    } else {
        try {
            // Check if email is already registered
            $verify_email = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
            $verify_email->execute([$email]);

            // Use fetch() to check for existing user
            $existing_user = $verify_email->fetch();

            if($existing_user) {
                $warning_msg[] = 'Email already taken.';
            } else {
                // Generate a unique ID for the user
                $id = generate_unique_id();

                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Upload user profile picture (if provided)
                $image_name = $_FILES['image']['name'];
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_folder = 'uploaded_files/';

                if(!empty($image_name)) {
                    $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                    $new_image_name = $id . '.' . $image_extension;

                    // Check and move uploaded image to the desired folder
                    if(move_uploaded_file($image_tmp_name, $image_folder . $new_image_name)) {
                        // Insert user data into database
                        $insert_user = $conn->prepare("INSERT INTO `users` (id, name, email, password, image) VALUES (?, ?, ?, ?, ?)");
                        $insert_user->execute([$id, $name, $email, $hashed_password, $new_image_name]);

                        $success_msg[] = 'Registration successful!';
                    } else {
                        $warning_msg[] = 'Failed to upload image.';
                    }
                } else {
                    // Insert user data into database without image
                    $insert_user = $conn->prepare("INSERT INTO `users` (id, name, email, password) VALUES (?, ?, ?, ?)");
                    $insert_user->execute([$id, $name, $email, $hashed_password]);

                    $success_msg[] = 'Registration successful!';
                }
            }
        } catch (PDOException $e) {
            $warning_msg[] = 'Database error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<!-- Header section -->
<?php include 'components/header.php'; ?>

<section class="account-form">
   <form action="" method="post" enctype="multipart/form-data">
      <h3>Create Your Account</h3>
      <?php
      if(!empty($warning_msg)) {
          foreach($warning_msg as $warning) {
              echo '<p class="warning">' . $warning . '</p>';
          }
      }
      if(!empty($success_msg)) {
          foreach($success_msg as $success) {
              echo '<p class="success">' . $success . '</p>';
          }
      }
      ?>
      <p>Your Name <span>*</span></p>
      <input type="text" name="name" maxlength="50" placeholder="Enter your name" class="box" required>
      <p>Your Email <span>*</span></p>
      <input type="email" name="email" maxlength="50" placeholder="Enter your email" class="box" required>
      <p>Password <span>*</span></p>
      <input type="password" name="pass" maxlength="50" placeholder="Enter your password" class="box" required>
      <p>Confirm Password <span>*</span></p>
      <input type="password" name="c_pass" maxlength="50" placeholder="Confirm your password" class="box" required>
      <p>Profile Picture</p>
      <input type="file" name="image" class="box" accept="image/*">
      <p>Already have an account? <a href="login.php">Log in now</a></p>
      <input type="submit" value="Register Now" name="submit" class="btn">
   </form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/script.js"></script>

<?php include 'components/alers.php'; ?>

</body>
</html>
