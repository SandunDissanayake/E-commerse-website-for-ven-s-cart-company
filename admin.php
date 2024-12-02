<?php
session_start();
require_once 'database.php'; // Include the database connection file

// Redirect to login page if admin session is not set
if (!isset($_SESSION['user'])) {
    header('Location: adminlog.php');
    exit; // Terminate the script after redirection
}

// Include admin header or navigation
include 'adminhead.php'; // Assuming adminhead.php contains header/navigation HTML

$message = '';

// Check if site is in shutdown mode
if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') {
    $message = 'The site is currently in maintenance. Please try again later.';
}

// Add or Update Product
if (isset($_POST['submit']) && empty($message)) {
    $action = $_POST['action'];
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];

    if ($action == 'add') {
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
        $p_image_folder = 'uploaded_img/'.$p_image;

        $insert_query = mysqli_query($conn, "INSERT INTO `product` (name, price, image) VALUES ('$p_name', '$p_price', '$p_image')") or die('Query failed');

        if ($insert_query) {
            move_uploaded_file($p_image_tmp_name, $p_image_folder);
            $message = 'Product added successfully';
        } else {
            $message = 'Failed to add the product';
        }
    } elseif ($action == 'update') {
        $p_id = $_POST['p_id'];
        $update_query = mysqli_query($conn, "UPDATE `product` SET name = '$p_name', price = '$p_price' WHERE id = $p_id");

        if ($update_query) {
            $message = 'Product updated successfully';
        } else {
            $message = 'Failed to update the product';
        }
    }
}

// Delete Product
if (isset($_GET['delete']) && empty($message)) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `product` WHERE id = $delete_id ");

    if ($delete_query) {
        header('Location: admin.php');
        exit;
    } else {
        $message = 'Failed to delete the product';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; padding-top: 70px; }
        .sidebar { position: fixed; top: 0; bottom: 0; left: 0; z-index: 100; padding: 60px 0 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); background-color: #f8f9fa; }
        .nav-link { color: #333; }
        .nav-link:hover { color: #0056b3; }
        .content { margin-left: 250px; padding: 20px; }
        .message { position: fixed; top: 20px; right: 20px; padding: 10px; border-radius: 5px; background-color: #28a745; color: #fff; z-index: 9999; }
        .product-img { max-width: 100px; height: auto; }
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
        <a class="nav-link" href="aboutus_admin.php">About Us</a>
        <a class="nav-link" href="services_admin.php">Services</a>
        <a class="nav-link" href="messages.php">Messages</a>

        <!-- Shutdown Switch -->
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="shutdownSwitch" name="shutdownSwitch">
            <label class="form-check-label" for="shutdownSwitch">Shutdown Site</label>
        </div>

        <!-- Logout Button -->
        <a class="nav-link mt-3" href="logout.php">Logout</a>
    </nav>
</div>

<!-- Page Content -->
<div class="content">
    <div class="container">
        <h1 class="my-4">Admin Panel</h1>

        <?php
        // Display success/error message
        if (!empty($message)) {
            echo '<div class="message">' . $message . '</div>';
        }
        ?>

        <!-- Add Product Form -->
        <div class="card mb-4">
            <div class="card-header">Add New Product</div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="p_name">Product Name:</label>
                        <input type="text" class="form-control" id="p_name" name="p_name" required>
                    </div>
                    <div class="form-group">
                        <label for="p_price">Product Price:</label>
                        <input type="number" class="form-control" id="p_price" name="p_price" min="0" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="p_image">Product Image:</label>
                        <input type="file" class="form-control-file" id="p_image" name="p_image" accept="image/png, image/jpeg" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // JavaScript to handle shutdown switch toggle
    $(document).ready(function () {
        $('#shutdownSwitch').change(function () {
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
