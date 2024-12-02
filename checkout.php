<?php
session_start();
@include 'config.php';

// Check if the order form has been submitted
if(isset($_POST['order_btn'])){
   // Retrieve form input data
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   // Fetch cart items (assuming `cartsss` is your cart table)
   $cart_query = mysqli_query($conn, "SELECT * FROM `cartsss`");
   $product_details = '';
   $price_total = 0;

   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name = $product_item['name'];
         $product_quantity = $product_item['quantity'];
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $product_details .= "$product_name ($product_quantity) - $product_price USD<br>";
         $price_total += $product_price;
      }
   }

   // Insert order details into database
   $detail_query = mysqli_query($conn, "INSERT INTO `order` (name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES ('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$product_details','$price_total')") or die('query failed');

   if($detail_query){
      // Order placed successfully
      echo '<script>
               document.addEventListener("DOMContentLoaded", function() {
                  document.getElementById("orderForm").style.display = "none";
                  document.getElementById("thankYouMessage").style.display = "block";
                  document.getElementById("customerName").textContent = "' . $name . '";
                  document.getElementById("productDetails").innerHTML = "' . addslashes($product_details) . '";
               });
            </script>';
   } else {
      echo "Order processing failed. Please try again.";
   }
}
?>

<?php include("head.php"); ?>
<br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .heading {
            text-align: center;
            margin-bottom: 30px;
        }
        #thankYouMessage {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            animation: fadeIn 0.5s ease-in-out forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">Complete Your Order</h1>

        <!-- Order Form -->
        <form id="orderForm" action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="number">Your Phone Number</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="Enter your phone number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="method">Payment Method</label>
                    <select class="form-control" id="method" name="method" required>
                        <option value="cash on delivery" selected>Cash on Delivery</option>
                        <!-- Add more payment options here if applicable -->
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Your Address</label>
                <input type="text" class="form-control" id="flat" name="flat" placeholder="Flat or House Number" required>
                <input type="text" class="form-control" id="street" name="street" placeholder="Street Name" required>
                <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" required>
                <input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
                <input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="Postal Code" required>
            </div>
            <button type="submit" name="order_btn" class="btn btn-primary">Order Now</button>&nbsp;
            <a href="products.php" class="btn btn-secondary mr-3">Continue Shopping</a><br><br><br>
        </form>

        <!-- Thank You Message (Initially Hidden) -->
        <div id="thankYouMessage">
            <h3 class="text-success">Thank You, <span id="customerName"></span>!</h3>
            <p>Your order has been placed successfully.</p>
            <p>We appreciate your business. Have a great day!</p>
            <p>Feel free to shop with us again.</p>
            <hr>
            <h4>Order Details:</h4>
            <div id="productDetails"></div><br><br>
        </div>
    </div>

    <!-- Include Bootstrap and other JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Populate customer name and order details in thank you message after form submission
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("orderForm").addEventListener("submit", function(event) {
                var customerName = document.getElementById("name").value;
                var productDetails = document.getElementById("productDetails");
                productDetails.innerHTML = '';
                // Fetch and display product details from form
                var details = document.getElementById("flat").value + ', ' +
                              document.getElementById("street").value + ', ' +
                              document.getElementById("city").value + ', ' +
                              document.getElementById("state").value + ', ' +
                              document.getElementById("country").value + ' - ' +
                              document.getElementById("pin_code").value;
                productDetails.innerHTML = details;
                document.getElementById("customerName").textContent = customerName;
                // Show thank you message with animation
                document.getElementById("orderForm").style.display = "none";
                document.getElementById("thankYouMessage").style.display = "block";
            });
        });
    </script>
</body>
</html>
<?php
include("foot.php");
?>
