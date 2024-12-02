<?php
session_start();
require_once "config.php"; // Include the database connection file

// Check if user is not logged in
if (!isset($_SESSION["user"])) {
    header("Location: logout.php");
    exit; // Terminate the script after redirection
}

// Fetch user details based on session user ID
$user_id = $_SESSION["user"];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
    $email = $row['email'];
}

// Handle Confirm Order request
if (isset($_POST['confirm_order'])) {
    $order_id = intval($_POST['order_id']);
    $update_status_query = "UPDATE `order` SET `status` = 'Delivered' WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $update_status_query);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to the same page after updating status
        header("Location: profile.php");
        exit;
    } else {
        echo "Failed to update order status. Please try again.";
    }
}

// Fetch order history for the current user based on email
$order_query = mysqli_query($conn, "SELECT * FROM `order` WHERE email = '$email' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            padding-top: 60px;
            background-color: #343a40;
            color: #fff;
            transition: all 0.3s;
        }
        .sidebar-heading {
            padding: 10px 20px;
            font-size: 22px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .nav-link {
            display: block;
            padding: 10px 20px;
            color: #fff;
            transition: background-color 0.3s;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .order-history {
            margin-top: 30px;
        }
        .order-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .order-details {
            font-size: 14px;
            margin-top: 10px;
        }
        .confirm-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-heading">User Profile</div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="cart.php">View Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#updateInfoModal">Update Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="out.php">Log out</a>
        </li>
    </ul>
</div>

<div class="content">
    <h2 class="mb-4">Welcome, <?php echo htmlspecialchars($username); ?>!</h2>

    <div class="order-history">
        <h3>Order History</h3>
        <?php if (mysqli_num_rows($order_query) > 0) : ?>
            <?php while ($order = mysqli_fetch_assoc($order_query)) : ?>
                <div class="order-item">
                    <strong>Order ID:</strong> <?php echo $order['id']; ?><br>
                    <strong>Total Products:</strong> <?php echo $order['total_products']; ?><br>
                    <strong>Total Price:</strong> Rs.<?php echo $order['total_price']; ?><br>
                    <strong>Status:</strong> <?php echo $order['status']; ?><br>
                    <div class="order-details">
                        <strong>Delivery Address:</strong><br>
                        <?php echo $order['flat'] . ', ' . $order['street'] . ', ' . $order['city']. ', ' . $order['pin_code']; ?><br>
                        <strong>Payment Method:</strong> <?php echo $order['method']; ?><br>
                    </div>
                    <?php if ($order['status'] == 'Pending') : ?>
                        <!-- Confirm Order Form -->
                        <form method="post" action="profile.php">
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <button type="submit" name="confirm_order" class="btn btn-success confirm-btn">Confirm Order</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Update Information Modal -->
<div class="modal fade" id="updateInfoModal" tabindex="-1" role="dialog" aria-labelledby="updateInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateInfoModalLabel">Update Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="update_info.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap and other JavaScript libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
