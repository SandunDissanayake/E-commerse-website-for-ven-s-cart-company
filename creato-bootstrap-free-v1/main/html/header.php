

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/styl.css">

</head>
<body>
  
<header class="header">

<div class="flex">

   <a href="#" class="logo"></a>

   <nav class="navbar">
   <a href="products.php">view products</a>
   <a href="reviews.php" >Reviews</a>
</nav>

   <?php
   
   $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
   $row_count = mysqli_num_rows($select_rows);

   ?>
    
     
   <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

   <div id="menu-btn" class="fas fa-bars"></div>

</div>

</header>
<script src="js/script.js"></script>
</body>
</html>
