<?php
// Include the configuration file
include 'config.php';

// Initialize message array
$message = [];

// Check if site is in maintenance mode
$isMaintenanceMode = isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true';

// Handle form submission when adding to cart
if (isset($_POST['add_to_cart'])) {
    if (!$isMaintenanceMode) {
        // Retrieve form data
        $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
        $product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';
        $product_image = isset($_POST['product_image']) ? $_POST['product_image'] : '';
        $product_quantity = 1;

        // Check if product is already in cart
        $select_cart = mysqli_query($conn, "SELECT * FROM `cartsss` WHERE name = '$product_name'");

        if (mysqli_num_rows($select_cart) > 0) {
            $message[] = 'Product already added to cart';
        } else {
            // Insert product into cart
            $insert_product = mysqli_query($conn, "INSERT INTO `cartsss`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
            if ($insert_product) {
                $message[] = 'Product added to cart successfully';
            } else {
                $message[] = 'Failed to add product to cart';
            }
        }
    } else {
        $message[] = 'The site is currently in maintenance mode. Please try again later.';
    }
}

// Handle form submission when adding reviews
if (isset($_POST['add_review']) && !$isMaintenanceMode) {
    // Retrieve form data
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
    $review_content = isset($_POST['review_content']) ? $_POST['review_content'] : '';

    // Insert review into database
    $insert_review = mysqli_query($conn, "INSERT INTO `product_reviews`(product_id, customer_name, review_content) VALUES('$product_id', '$customer_name', '$review_content')");
    if ($insert_review) {
        $message[] = 'Review added successfully';
    } else {
        $message[] = 'Failed to add review';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom styles specific to this page */
        .products {
            margin-top: 50px;
        }
        .box {
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .box img {
            max-width: 100%;
            height: auto;
        }
        .price {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }
        .message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .review-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-top: 20px;
        }
        .review-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .review-content {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<?php
// Display messages if there are any
if (!empty($message)) {
    foreach ($message as $msg) {
        echo '<div class="message"><span>'.$msg.'</span><i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
    }
}
?>

<?php include 'head.php'; ?>

<div class="container">

    <section class="products">

        <h1 class="heading">Our Products</h1>

        <div class="row">

            <?php
            // Fetch products from database
            $select_products = mysqli_query($conn, "SELECT * FROM `product`");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                    $product_id = $fetch_product['id'];
                    ?>
                    <div class="col-md-4">
                        <div class="box">
                            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="<?php echo $fetch_product['name']; ?>" class="img-fluid">
                            <h3><a href="#" data-toggle="modal" data-target="#productModal<?php echo $product_id; ?>"><?php echo $fetch_product['name']; ?></a></h3>
                            <div class="price">Rs.<?php echo number_format($fetch_product['price'], 2); ?>/-</div>

                            <?php if (empty($message) && !$isMaintenanceMode) { ?>
                                <!-- Hidden form to submit product details -->
                                <form action="" method="post">
                                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-primary btn-block mt-3">Add to Cart</button>
                                </form>
                            <?php } else { ?>
                                <!-- Display a disabled button if site is in maintenance mode -->
                                <button class="btn btn-primary btn-block mt-3" disabled>Add to Cart</button>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- Product Details Modal -->
                    <div class="modal fade" id="productModal<?php echo $product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel"><?php echo $fetch_product['name']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="<?php echo $fetch_product['name']; ?>" class="img-fluid">
                                    <div class="price">Rs.<?php echo number_format($fetch_product['price'], 2); ?>/-</div>
                                    
                                    <!-- Review Section -->
                                    <div class="review-box">
                                        <h4 class="review-title">Customer Reviews</h4>
                                        <?php
                                        $select_reviews = mysqli_query($conn, "SELECT * FROM `product_reviews` WHERE product_id = '$product_id'");
                                        while ($review = mysqli_fetch_assoc($select_reviews)) {
                                            echo '<div class="review-content">';
                                            echo '<strong>'.$review['customer_name'].'</strong>';
                                            echo '<p>'.$review['review_content'].'</p>';
                                            echo '</div>';
                                        }
                                        ?>

                                        <!-- Review Form -->
                                        <form action="" method="post" class="mt-3">
                                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="customer_name" placeholder="Your Name" required>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="review_content" rows="3" placeholder="Your Review" required></textarea>
                                            </div>
                                            <button type="submit" name="add_review" class="btn btn-primary">Submit Review</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <?php if (empty($message) && !$isMaintenanceMode) { ?>
                                        <!-- Add to Cart button inside modal -->
                                        <form action="" method="post">
                                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                            <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                                        </form>
                                    <?php } else { ?>
                                        <!-- Display a disabled button if site is in maintenance mode -->
                                        <button class="btn btn-primary" disabled>Add to Cart</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="col-12">No products found.</div>';
            }
            ?>

        </div>

    </section>

</div>

<?php include 'foot.php'; ?>

<!-- Bootstrap JS and any custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
