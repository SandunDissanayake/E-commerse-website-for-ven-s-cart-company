<?php
// Include database connection
@include 'config.php';
include("adminhead.php");

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
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333333;
            text-align: center;
            margin-bottom: 30px;
        }
        .stats-card {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .stats-card:hover {
            transform: scale(1.05);
        }
        .stats-card h3 {
            color: #007bff;
            font-size: 32px;
            margin-bottom: 10px;
        }
        canvas {
            margin-top: 30px;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>

        <!-- Display Total Orders and Total Income -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="stats-card text-center bg-light">
                    <h3>Total Orders Received</h3>
                    <p class="display-4"><?php echo $total_orders; ?></p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="stats-card text-center bg-light">
                    <h3>Total Income</h3>
                    <p class="display-4">Rs. <?php echo $total_income; ?></p>
                </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
