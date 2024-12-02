<?php
// Include header and database connection
include('adminhead.php');
include('config.php');

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'add' && isset($_POST['service_name'], $_POST['service_description'])) {
            $service_name = $_POST['service_name'];
            $service_description = $_POST['service_description'];

            // Insert new service into the database
            $insert_query = mysqli_query($conn, "INSERT INTO `services` (name, description) VALUES ('$service_name', '$service_description')");
            if ($insert_query) {
                $message = 'Service added successfully.';
            } else {
                $error_message = 'Failed to add service.';
            }
        } elseif ($action == 'delete' && isset($_POST['service_id'])) {
            $service_id = $_POST['service_id'];

            // Delete service from the database
            $delete_query = mysqli_query($conn, "DELETE FROM `services` WHERE id = $service_id");
            if ($delete_query) {
                $message = 'Service deleted successfully.';
            } else {
                $error_message = 'Failed to delete service.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services - Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 70px; /* Offset the fixed navbar height */
        }
        .container {
            max-width: 800px;
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
            width: 250px; /* Adjust sidebar width */
        }
        .nav-link {
            color: #333;
        }
        .nav-link:hover {
            color: #0056b3;
        }
        .form-check-label {
            margin-bottom: 0;
        }
    </style>
</head>

<body>

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

      <!-- Slider Bar -->
      
      <!-- Shutdown Switch -->
      <div class="form-check mt-3">
         <input class="form-check-input" type="checkbox" id="shutdownSwitch" name="shutdownSwitch">
         <label class="form-check-label" for="shutdownSwitch">Shutdown Site</label>
      </div>
   </nav>
</div>

<div class="container" style="margin-left: 250px; padding: 20px;">
    <h1 class="my-4">Manage Services</h1>

    <?php
    // Display success/error messages
    if (isset($message)) {
        echo '<div class="alert alert-success">' . $message . '</div>';
    }
    if (isset($error_message)) {
        echo '<div class="alert alert-danger">' . $error_message . '</div>';
    }
    ?>

    <!-- Add Service Form -->
    <form action="" method="post">
        <input type="hidden" name="action" value="add">
        <div class="form-group">
            <label for="service_name">Service Name:</label>
            <input type="text" class="form-control" id="service_name" name="service_name" required>
        </div>
        <div class="form-group">
            <label for="service_description">Service Description:</label>
            <textarea class="form-control" id="service_description" name="service_description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Service</button>
    </form>

    <hr>

    <!-- List of Existing Services with Delete Button -->
    <h2>Existing Services</h2>
    <ul>
        <?php
        // Fetch existing services
        $select_services = mysqli_query($conn, "SELECT * FROM `services`");
        while ($row = mysqli_fetch_assoc($select_services)) {
            echo '<li>' . $row['name'] . ' - ' . $row['description'] . ' ';
            // Delete button for each service
            echo '<form action="" method="post" style="display:inline-block;">';
            echo '<input type="hidden" name="action" value="delete">';
            echo '<input type="hidden" name="service_id" value="' . $row['id'] . '">';
            echo '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this service?\')">Delete</button>';
            echo '</form>';
            echo '</li>';
        }
        ?>
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
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

<?php
// Include footer
?>
