<?php
// Include database connection and header
include('config.php');
include('adminhead.php');

$message = '';

// Check if site is in shutdown mode
if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') {
    // Display message and exit if site is in shutdown mode
    $message = 'The site is currently in maintenance. Please try again later.';
}

// Delete T-Shirt Design
if (isset($_GET['delete']) && empty($message)) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `tshirt_designs` WHERE id = $delete_id");

    if ($delete_query) {
        header('location:tshirts_admin.php');
        $message = 'T-Shirt design has been deleted';
    } else {
        header('location:tshirts_admin.php');
        $message = 'Failed to delete the t-shirt design';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage T-Shirt Designs - Admin Panel</title>
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
            padding: 60px 20px 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #f8f9fa;
            overflow-y: auto;
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
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            color: #fff;
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
        <div class="container">
            <h1 class="my-4">Manage T-Shirt Designs</h1>

            <?php
            // Display success/error message
            if (!empty($message)) {
                echo '<div class="alert alert-info">' . $message . '</div>';
            }
            ?>

            <!-- Add T-Shirt Design Form -->
            <div class="card mb-4">
                <div class="card-header">
                    Add New T-Shirt Design
                </div>
                <div class="card-body">
                    <form action="tshirts_admin.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">
                        <div class="form-group">
                            <label for="design_name">Design Name:</label>
                            <input type="text" class="form-control" id="design_name" name="design_name" required>
                        </div>
                        <div class="form-group">
                            <label for="design_description">Design Description:</label>
                            <textarea class="form-control" id="design_description" name="design_description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="design_image">Design Image:</label>
                            <input type="file" class="form-control-file" id="design_image" name="design_image" accept="image/png, image/jpeg" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Add Design</button>
                    </form>
                </div>
            </div>

            <!-- Display Existing T-Shirt Designs Carousel -->
            <div class="mt-5" id="designs">
                <h2>Existing T-Shirt Designs</h2>
                <div id="designsCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $select_designs = mysqli_query($conn, "SELECT * FROM `tshirt_designs`");
                        $active = true;
                        while ($row = mysqli_fetch_assoc($select_designs)) {
                            $active_class = $active ? 'active' : '';
                        ?>
                            <div class="carousel-item <?php echo $active_class; ?>">
                                <img src="uploaded_img/<?php echo $row['image']; ?>" class="d-block w-100" alt="<?php echo $row['name']; ?>">
                                <div class="carousel-caption">
                                    <h5><?php echo $row['name']; ?></h5>
                                    <p><?php echo $row['description']; ?></p>
                                    <a href="tshirt.php?action=add&design_id=<?php echo $row['id']; ?>" class="btn btn-primary">Add Design</a>
                                    <a href="tshirt_admin.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        <?php
                            $active = false;
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#designsCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#designsCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

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


