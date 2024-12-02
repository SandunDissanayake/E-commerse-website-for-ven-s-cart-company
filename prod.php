<?php
// Include database connection
@include 'config.php';
$message = '';

if (!isset($_SESSION['id'], $_SESSION['username'])) {
   header('Location: adminlog.php');
   exit;
}
// Check if site is in maintenance mode
if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') {
   // Display message and prevent actions if site is in maintenance mode
   $message = 'The site is currently in maintenance mode. Please try again later.';
}

// Delete Product and Related Reviews
if(isset($_GET['delete']) && empty($message)){
   $delete_id = $_GET['delete'];

   // Check if there are related records in product_reviews
   $check_reviews_query = mysqli_query($conn, "SELECT COUNT(*) AS review_count FROM `product_reviews` WHERE product_id = $delete_id");
   $review_count_data = mysqli_fetch_assoc($check_reviews_query);
   $review_count = $review_count_data['review_count'];

   if ($review_count > 0) {
      // Delete related product reviews first
      $delete_reviews_query = mysqli_query($conn, "DELETE FROM `product_reviews` WHERE product_id = $delete_id");
      if (!$delete_reviews_query) {
         $message = 'Failed to delete related product reviews';
      }
   }

   // Proceed to delete the product after handling related records
   if (empty($message)) {
      $delete_query = mysqli_query($conn, "DELETE FROM `product` WHERE id = $delete_id ");

      if($delete_query){
         header('location:admin.php');
         $message = 'Product has been deleted';
      } else {
         header('location:admin.php');
         $message = 'Failed to delete the product';
      }
   }
}

// Fetch total orders and income
$total_orders_result = mysqli_query($conn, "SELECT COUNT(id) AS total_orders, SUM(total_price) AS total_income FROM `order`");
$total_orders_data = mysqli_fetch_assoc($total_orders_result);
$total_orders = $total_orders_data['total_orders'];
$total_income = $total_orders_data['total_income'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <style>
      body {
         font-family: Arial, sans-serif;
         padding-top: 70px; /* Offset the fixed navbar height */
      }
      .sidebar {
         position: fixed;
         top: 0;
         bottom: 0;
         left: 0;
         z-index: 100;
         padding: 60px 0 20px;
         box-shadow: 0 0 10px rgba(0,0,0,0.1);
         background-color: #f8f9fa;
      }
      .nav-link {
         color: #333;
      }
      .nav-link:hover {
         color: #0056b3;
      }
      .content {
         margin-left: 250px; /* Adjust this value to match sidebar width */
         padding: 20px;
      }
      .message {
         position: fixed;
         top: 20px;
         right: 20px;
         padding: 10px;
         border-radius: 5px;
         background-color: #28a745;
         color: #fff;
         z-index: 9999;
      }
      .product-img {
         max-width: 100px;
         height: auto;
      }
   </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
   <nav class="nav flex-column">
      <a class="nav-link" href="dash.php">Dashboard</a>
      <a class="nav-link" href="admin.php">Add Product</a>
      <a class="nav-link" href="prod.php">Products</a>
      <a class="nav-link" href="orders.php">Orders</a>
      <a class="nav-link" href="tshirts_admin.php">Designs</a>
      <a class="nav-link" href="aboutus_admin.php">About Us</a>
      <a class="nav-link" href="services_admin.php">Services</a>
      <a class="nav-link" href="messages.php">Messages</a>

      <!-- Shutdown Switch -->
      <div class="form-check mt-3">
         <input class="form-check-input" type="checkbox" id="shutdownSwitch" name="shutdownSwitch">
         <label class="form-check-label" for="shutdownSwitch">Shutdown Site</label>
      </div>
   </nav>
</div>

<!-- Page Content -->
<div class="content">
   <h1 class="my-4">Manage Products</h1>

   <?php
   // Display success/error message
   if(!empty($message)){
      echo '<div class="message">'.$message.'</div>';
   }
   ?>

   <!-- Display Products Table -->
   <div id="products" class="card">
      <div class="card-header">
         Manage Products
      </div>
      <div class="card-body">
         <table class="table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $select_products = mysqli_query($conn, "SELECT * FROM `product`");
               if(mysqli_num_rows($select_products) > 0){
                  while($row = mysqli_fetch_assoc($select_products)){
               ?>
                     <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>Rs.<?php echo $row['price']; ?></td>
                        <td><img src="uploaded_img/<?php echo $row['image']; ?>" class="product-img"></td>
                        <td>
                           <?php if (empty($message)) { ?>
                              <a href="#editProduct<?php echo $row['id']; ?>" class="btn btn-primary" data-toggle="modal">Edit</a>
                              <a href="prod.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                           <?php } else { ?>
                              <button class="btn btn-primary" disabled>Edit</button>
                              <button class="btn btn-danger" disabled>Delete</button>
                           <?php } ?>
                        </td>
                     </tr>

                     <!-- Edit Product Modal -->
                     <div class="modal fade" id="editProduct<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProductLabel<?php echo $row['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="editProductLabel<?php echo $row['id']; ?>">Edit Product</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form action="" method="post">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="p_id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                       <label for="edit_p_name">Product Name:</label>
                                       <input type="text" class="form-control" id="edit_p_name" name="p_name" value="<?php echo $row['name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="edit_p_price">Product Price:</label>
                                       <input type="number" class="form-control" id="edit_p_price" name="p_price" value="<?php echo $row['price']; ?>" min="0" step="0.01" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Update Product</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
               <?php
                  }
               } else {
                  echo '<tr><td colspan="5">No products found</td></tr>';
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
   // JavaScript to handle shutdown switch toggle
   $(document).ready(function() {
      $('#shutdownSwitch').change(function() {
         if ($(this).is(':checked')) {
            document.cookie = "site_shutdown=true; expires=Thu, 01 Jan 2099 00:00:00 UTC; path=/";
         } else {
            document.cookie = "site_shutdown=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
         }
      });
   });
</script>

</body>
</html>
