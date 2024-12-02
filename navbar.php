<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-=edge">
        <meta name="viewreport" content="width=device-width,initial-scale=1.0">
        <title>Venscart</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    </head>
    <body>
        <nav class="navbar">
        <div class="container">
            <div class="logo">
               <a href="#"><img src="images/vens.png" alt=""></a>
            </div>&nbsp;
           
            
            <ul class="menu">
                <li><a href="indexs.php">Home</a></li>
                <li class="dropdown">
                    <a href="#">Shop <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-content">
                        <a href="#">Mens</a>
                        <a href="#">Womens</a>
                <li class="dropdown">
                    <a href="#">Our Design <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-content">
                        <a href="#">Tshirts</a>
                        <a href="#">Mugs</a>
                        <a href="#">Trousers</a>
                        <a href="#">Key tags</a>
                    

                    </div>
                </li>
                
                <li><a href="#about">About</a></li>
                <li><a href="contactus.php">Contact</a></li>&nbsp;
                <li><a href="products.php">&#128722; </a></li>
                <li><a href="login.php"><i class="fas fa-user"></i></a></li>
               
            </ul>&nbsp;
            <div class="search">
                <input type="text" placeholder="search">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <div id="menu-btn" class="fas fa-bars"></div>
    </nav>
    </body>
</html>