<?php
// Include database connection
@include 'config.php';
include("head.php");

// Check if site is in shutdown mode
if (isset($_COOKIE['site_shutdown']) && $_COOKIE['site_shutdown'] === 'true') {
    // Display message and exit if site is in shutdown mode
    $message = 'The site is currently in maintenance. Please try again later.';
}

// Fetch messages from the database
$messages_query = mysqli_query($conn, "SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Messages</title>
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
        .message-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <nav class="nav flex-column">
        <a class="nav-link" href="admin.php">Dashboard</a>
        <a class="nav-link" href="prod.php">Products</a>
        <a class="nav-link" href="orders.php">Orders</a>
        <a class="nav-link" href="tshirts_admin.php">Designs</a>
        <a class="nav-link" href="aboutus_admin.php">About Us</a>
        <a class="nav-link" href="services_admin.php">Services</a>
        <a class="nav-link" href="messages.php">Messages</a> <!-- Added Messages link -->
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
        <h1 class="my-4">Admin Panel - Messages</h1>

        <?php
        // Display success/error message
        if (!empty($message)) {
            echo '<div class="alert alert-danger">' . $message . '</div>';
        }
        ?>

        <!-- Display Messages -->
        <?php
        while ($row = mysqli_fetch_assoc($messages_query)) {
            ?>
            <div class="card message-card">
                <div class="card-body">
                    <h5 class="card-title">From: <?php echo $row['name']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Email: <?php echo $row['email']; ?></h6>
                    <p class="card-text"><?php echo $row['message']; ?></p>
                    <!-- Add Reply Button and Form -->
                    <button class="btn btn-primary" onclick="toggleReplyForm(<?php echo $row['id']; ?>)">Reply</button>
                    <div id="replyForm<?php echo $row['id']; ?>" style="display: none;">
                        <form action="reply_message.php" method="post">
                            <input type="hidden" name="message_id" value="<?php echo $row['id']; ?>">
                            <textarea class="form-control mt-2" name="reply" placeholder="Type your reply here..." required></textarea>
                            <button type="submit" class="btn btn-success mt-2">Send Reply</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

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

    // Function to toggle reply form visibility
    function toggleReplyForm(messageId) {
        var replyForm = document.getElementById('replyForm' + messageId);
        if (replyForm.style.display === 'none') {
            replyForm.style.display = 'block';
        } else {
            replyForm.style.display = 'none';
        }
    }
</script>

</body>
</html>
