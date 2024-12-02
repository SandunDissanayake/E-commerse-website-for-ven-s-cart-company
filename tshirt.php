<?php
// Include database connection and header
include('config.php');
include('head.php');

$message = '';

// Fetch all T-Shirt designs from the database
$select_designs = mysqli_query($conn, "SELECT * FROM `tshirt_designs`");
$designs = mysqli_fetch_all($select_designs, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-Shirt Designs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 70px; /* Offset the fixed navbar height */
        }
        .content {
            padding: 20px;
        }
        .design-container {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .design-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .btn {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <h1 class="my-4">T-Shirt Designs</h1>

            <?php
            // Loop through each design and display them
            foreach ($designs as $design) {
            ?>
                <div class="design-container">
                    <h3><?php echo $design['name']; ?></h3>
                    <img src="uploaded_img/<?php echo $design['image']; ?>" class="design-image" alt="<?php echo $design['name']; ?>">
                    <p><?php echo $design['description']; ?></p>

                    <!-- Option to view details or add to cart/favorites (simulated) -->
                    <form method="post">
                        <input type="hidden" name="design_id" value="<?php echo $design['id']; ?>">
                        <button type="submit" class="btn btn-primary" name="view_details">View Details</button>
                        <button type="submit" class="btn btn-success" name="add_to_cart">Add to Cart</button>
                        <button type="submit" class="btn btn-info" name="add_to_favorites">Add to Favorites</button>
                    </form>
                </div>
            <?php
            }
            ?>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
