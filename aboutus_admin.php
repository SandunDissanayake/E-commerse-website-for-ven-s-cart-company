<?php
// Include database connection
include('config.php');
include("adminhead.php");
$message = '';
if (!isset($_SESSION['id'], $_SESSION['username'])) {
    header('Location: adminlog.php');
    exit;
}
// Check if site is in shutdown mode
if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') {
   // Display message and exit if site is in shutdown mode
   $message = 'The site is currently in maintenance. Please try again later.';
}

// Fetch "About Us" information
$select_query = "SELECT * FROM about_us_info WHERE id = 1";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Admin Panel</title>
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
        .slider-image {
            width: 100%;
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
         <input class="form-check-input" type="checkbox" id="shutdownSwitch" name="shutdownSwitch" <?php if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') echo 'checked'; ?>>
         <label class="form-check-label" for="shutdownSwitch">Shutdown Site</label>
      </div>
   </nav>
</div>

<!-- Main content -->
<div class="content">
    <div class="container">
        <h1 class="my-4">About Us - Admin Panel</h1>

        <?php
        // Display success/error message
        if (!empty($message)) {
            echo '<div class="message">'.$message.'</div>';
        }
        ?>

        <!-- About Us Form -->
        <form method="post" action="">
            <div class="form-group">
                <label for="website_name">Website Name:</label>
                <input type="text" class="form-control" id="website_name" name="website_name" value="<?php echo $row['website_name']; ?>">
            </div>
            <div class="form-group">
                <label for="website_url">Website URL:</label>
                <input type="text" class="form-control" id="website_url" name="website_url" value="<?php echo $row['website_url']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="5"><?php echo $row['description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update_about_us">Update</button>
        </form>

        <!-- Slider -->
        <div id="aboutUsSlider" class="carousel slide mt-4" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slider1.jpg" class="d-block w-100 slider-image" alt="Slider Image 1">
                </div>
                <div class="carousel-item">
                    <img src="images/slider2.jpg" class="d-block w-100 slider-image" alt="Slider Image 2">
                </div>
                <div class="carousel-item">
                    <img src="images/slider3.jpg" class="d-block w-100 slider-image" alt="Slider Image 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#aboutUsSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#aboutUsSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
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
