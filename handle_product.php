<?php
// Include database connection
@include 'config.php';

$message = '';

// Check if form is submitted
if(isset($_POST['submit'])){
   // Check if site is in shutdown mode
   if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') {
      $message = 'Site is currently in maintenance. Product cannot be added.';
   } else {
      $action = $_POST['action'];

      $p_name = $_POST['p_name'];
      $p_price = $_POST['p_price'];
      $p_image = $_FILES['p_image']['name'];
      $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
      $p_image_folder = 'uploaded_img/'.$p_image;

      if($action == 'add'){
         $insert_query = mysqli_query($conn, "INSERT INTO `product` (name, price, image) VALUES ('$p_name', '$p_price', '$p_image')");

         if($insert_query){
            move_uploaded_file($p_image_tmp_name, $p_image_folder);
            $message = 'Product added successfully';
         } else {
            $message = 'Failed to add the product';
         }
      }
   }
}

// Redirect back to admin.php with message
header("Location: admin.php?message=".urlencode($message));
exit;
?>
