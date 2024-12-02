<?php
@include 'config.php';
include("adminhead.php");
$message = '';

// Check if site is in shutdown mode
if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') {
    $message = 'The site is currently in maintenance. Please try again later.';
}

// Delete Order
if (isset($_GET['delete']) && empty($message)) {
    $delete_id = intval($_GET['delete']);
    $delete_query = mysqli_query($conn, "DELETE FROM `order` WHERE id = $delete_id");

    if ($delete_query) {
        header('Location: orders.php');
        exit;
    } else {
        $message = 'Failed to delete the order.';
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
    <title>Manage Orders</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 70px;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            padding: 60px 20px 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #f8f9fa;
            z-index: 100;
            width: 250px;
            transition: all 0.3s;
        }
        .sidebar.toggled {
            width: 60px;
        }
        .nav-link {
            color: #333;
        }
        .nav-link:hover {
            color: #0056b3;
        }
        .content {
            margin-left: 250px;
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
        .order-info {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="sidebar" id="sidebar">
    <nav class="nav flex-column">
        <a class="nav-link" href="dash.php">Dashboard</a>
        <a class="nav-link" href="admin.php">Add Product</a>
        <a class="nav-link" href="prod.php">Products</a>
        <a class="nav-link" href="orders.php">Orders</a>
        <a class="nav-link" href="tshirts_admin.php">Designs</a>
        <a class="nav-link" href="aboutus_admin.php">About Us</a>
        <a class="nav-link" href="services_admin.php">Services</a>
        <a class="nav-link" href="messages.php">Messages</a>
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="shutdownSwitch" name="shutdownSwitch">
            <label class="form-check-label" for="shutdownSwitch">Shutdown Site</label>
        </div>
    </nav>
</div>

<?php if (!empty($message)) : ?>
    <div class="message"><?php echo $message; ?></div>
<?php endif; ?>

<div class="container-fluid content">
    <h2>Manage Orders</h2>

    <div class="row mt-4">
        <div class="col-md-6 order-info">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Orders Received</h5>
                    <p class="card-text"><?php echo $total_orders; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 order-info">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Income</h5>
                    <p class="card-text">Rs. <?php echo $total_income; ?></p>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Total Products</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `order`");
        if (mysqli_num_rows($select_orders) > 0) {
            while ($row = mysqli_fetch_assoc($select_orders)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row['total_products']; ?></td>
                    <td>Rs. <?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if (empty($message)) : ?>
                            <a href="orders.php?delete=<?php echo $row['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                        <?php else : ?>
                            <button class="btn btn-danger btn-sm" disabled>Delete</button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo '<tr><td colspan="8">No orders found</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#shutdownSwitch').change(function () {
            if ($(this).is(':checked')) {
                document.cookie = "site_shutdown=true; expires=Thu, 01 Jan 2099 00:00:00 UTC; path=/";
            } else {
                document.cookie = "site_shutdown=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            }
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('toggled');
        });
    });
</script>

</body>
</html>
