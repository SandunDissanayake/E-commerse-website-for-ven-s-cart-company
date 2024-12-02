<?php
// Include database connection
include 'config.php';
include("head.php");
if (!isset($_SESSION['id'], $_SESSION['username'])) {
   header('Location: cartlog.php');
   exit;
}


// Check if site is in maintenance mode
if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') {
   // Display message and prevent cart operations if site is in maintenance mode
   $message = 'The site is currently in maintenance mode. Please try again later.';
}

// Handle updating quantity
if(isset($_POST['update_update_btn']) && empty($message)){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cartsss` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
      exit();
   }
}

// Handle removing item from cart
if(isset($_GET['remove']) && empty($message)){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cartsss` WHERE id = '$remove_id'");
   header('location:cart.php');
   exit();
}

// Handle deleting all items from cart
if(isset($_GET['delete_all']) && empty($message)){
   mysqli_query($conn, "DELETE FROM `cartsss`");
   header('location:cart.php');
   exit();
}
?>

<br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <style>
      /* Custom CSS styles */
      .shopping-cart {
         margin-top: 50px;
      }
   </style>
</head>
<body>

<div class="container">
   <div class="shopping-cart">
      <h1 class="mb-4">Shopping Cart</h1>

      <?php if(!empty($message)) { ?>
         <div class="alert alert-warning" role="alert">
            <?php echo $message; ?>
         </div>
      <?php } ?>

      <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
            <?php 
            $select_cart = mysqli_query($conn, "SELECT * FROM `cartsss`");
            $grand_total = 0;
            if(mysqli_num_rows($select_cart) > 0){
               while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                  $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                  $grand_total += $sub_total;
            ?>
               <tr>
                  <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                  <td><?php echo $fetch_cart['name']; ?></td>
                  <td>Rs.<?php echo number_format($fetch_cart['price'], 2); ?></td>
                  <td>
                     <form action="" method="post">
                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                        <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>" class="form-control" style="width: 80px;" <?php echo (!empty($message)) ? 'disabled' : ''; ?>>
                        <button type="submit" class="btn btn-sm btn-primary" name="update_update_btn" <?php echo (!empty($message)) ? 'disabled' : ''; ?>>Update</button>
                     </form>
                  </td>
                  <td>Rs.<?php echo number_format($sub_total, 2); ?></td>
                  <td>
                     <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove item from cart?')" class="btn btn-sm btn-danger" <?php echo (!empty($message)) ? 'disabled' : ''; ?>>
                        <i class="fas fa-trash"></i> Remove
                     </a>
                  </td>
               </tr>
            <?php 
               }
            }
            ?>
            <tr class="table-bottom">
               <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
               <td><strong>Rs.<?php echo number_format($grand_total, 2); ?></strong></td>
               <td>
                  <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="btn btn-sm btn-danger" <?php echo (!empty($message)) ? 'disabled' : ''; ?>>
                     <i class="fas fa-trash"></i> Delete All
                  </a>
               </td>
            </tr>
            </tbody>
         </table>
      </div>

      <div class="checkout-btn mt-4">
         <a href="products.php" class="btn btn-secondary mr-3">Continue Shopping</a>
         <a href="checkout.php" class="btn btn-primary <?= ($grand_total > 0 && empty($message)) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
         <br><br>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include("foot.php");
?>
