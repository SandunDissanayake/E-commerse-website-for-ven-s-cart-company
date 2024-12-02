<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: signup.php");
}
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
        <nav class="navbar" id="menu" >
        <div class="container">
            <div class="logo">
               <a href="#"><img src="images/vens.png" alt=""></a>
            </div>&nbsp;
            
            
            <ul class="menu">
                <li><a href="indexs.php">Home</a></li>
                <li class="dropdown">
                    <a href="#">Shop<i class="fas fa-chevron-down"></i></a>
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
                <li><a href="signups.php"><i class="fas fa-user"></i></a></li>
               
            </ul>&nbsp;
            <div class="search">
                <input type="text" placeholder="search">
                <button><i class="fas fa-search"></i></button>
            </div>
          
        </div>
        <div id="menu-btn" class="toggle" onclick="toggleMenu()">
        <i class="fas fa-bars" ></i>
    </div>
    </nav>

        <section class="home" id="home">

            <div class="content animation">
                <h3>Welcome to Ven's Cart</h3>
                <p>Pioneer of Vendor Solution in Ceylon</p>
            </div>
           
        </section>
        <br><br><br><br><br>

        <section class="about" id="about">
            <div class="ab">
               
            </div>
          
        <div class="row">
            <div class="container">
            <img src="images/vvv.jpg" alt="">
            
        </div>
        <div class="content">
            <h3>
                Why you choose us?
            </h3>
            <p>Venscart will be a cart which contains every single thing needed to develop bussiness in srilanka.A paradise for traders
                who to be a trader who knows the hearts of customers.
            </p>
                <a href="aboutus.php" class="btn">See more</a>
        </div>
        </div>
        </section>
       
        <section class="products">
            <div class="ab">
                <h1 >Latest Products</h1>
            </div>
            <div class="container">
                <div class="item" onmouseover="moveCartButton(this)">
                    <img src="images/khiu_j1he_190804.jpg" alt="T-Shirt">
                    <div class="info">
                        <h3>T-Shirt</h3>
                        <p class="price">Rs.3500.00 <span class="discount">Rs.3900.00</span></p>
                        <button class="cart-btn">Add to Cart</button>
                    </div>
                </div>
                <div class="item" onmouseover="moveCartButton(this)">
                    <img src="images/Cargo pants for men with a plain -5.jpg" alt="Trousers">
                    <div class="info">
                        <h3>Trousers</h3>
                        <p class="price">Rs.5600.00 <span class="discount">Rs.6200.00</span></p>
                        <button class="cart-btn">Add to Cart</button>
                    </div>
                </div>

                <div class="item" onmouseover="moveCartButton(this)">
                    <img src="images/khiu_j1he_190804.jpg" alt="T-Shirt">
                    <div class="info">
                        <h3>T-Shirt</h3>
                        <p class="price">Rs.2300.00 <span class="discount">Rs.2600.000</span></p>
                        <button class="cart-btn">Add to Cart</button>
                    </div>
                </div>
                <div class="item" onmouseover="moveCartButton(this)">
                    <img src="images/Untitled design (1).jpg" alt="Trousers">
                    <div class="info">
                        <h3>Mugs(black)</h3>
                        <p class="price">Rs.1200.00 <span class="discount">Rs.1400.00</span></p>
                        <button class="cart-btn">Add to Cart</button>
                    </div>
                </div>


                <div class="item" onmouseover="moveCartButton(this)">
                    <img src="images/Untitled design.jpg" alt="T-Shirt">
                    <div class="info">
                        <h3>Mugs(white)</h3>
                        <p class="price">Rs.1000.00 <span class="discount">Rs.1200.00</span></p>
                        <button class="cart-btn">Add to Cart</button>
                    </div>
                </div>
                <div class="item" onmouseover="moveCartButton(this)">
                    <img src="images/Untitled design (2).jpg" alt="Trousers">
                    <div class="info">
                        <h3>Keytags</h3>
                        <p class="price">Rs.500.00 <span class="discount"></span></p>
                        <button class="cart-btn">Add to Cart</button>
                    </div>
                </div>


                <div class="item" onmouseover="moveCartButton(this)">
                    <img src="images/khiu_j1he_190804.jpg" alt="T-Shirt">
                    <div class="info">
                        <h3>T-Shirt</h3>
                        <p class="price">Rs.2000.00 <span class="discount">Rs.2400.00</span></p>
                        <button class="cart-btn">Add to Cart</button>
                    </div>
                </div>
                <div class="item" onmouseover="moveCartButton(this)">
                    <img src="images/Cargo pants for men with a plain -5.jpg" alt="Trousers">
                    <div class="info">
                        <h3>Trousers</h3>
                        <p class="price">Rs.1500.00 <span class="discount">Rs.1800.00</span></p>
                        <button class="cart-btn">Add to Cart</button>
                    </div>
                </div>
                
            </div>
            
        </section>
        
        <br><br><br><br><br><br><br><br><br>
        <section class="icon-container">
            <div class="icons">
                <img src="images/000.png" alt="">
                <div class="info">
                    <h3>free delivery</h3>
                    <span>on all orders</span>
                </div>
            </div>
            <div class="icons">
                <img src="images/00.png" alt="">
                <div class="info">
                    <h3>10 days returns</h3>
                    <span>money back guranteee</span>
                </div>
            </div>
            <div class="icons">
                <img src="images/0000.png" alt="">
                <div class="info">
                    <h3>offers & gifts</h3>
                    <span>on all orders</span>
                </div>
            </div>
        </section>
       
        <br><br><br><br><br><br>
        <section>
            <div class="marquee-container">
                <div class="cus">
                    <h1 >Our Customers</h1>
                </div>
                
                <div class="marquee">
                    <img src="images/ddd.jpg" alt="">
                    <img src="images/dgrgr.png" alt="">
                    <img src="images/fff.png" alt="">
                    <img src="images/fgfg.png" alt="">
                    <img src="images/gdfg.png" alt="">
                    <img src="images/ddd.jpg" alt="">
                    <img src="images/dgrgr.png" alt="">
                    <img src="images/fff.png" alt="">
                    <img src="images/fgfg.png" alt="">
                    <img src="images/gdfg.png" alt="">
                    <img src="images/ddd.jpg" alt="">
                    <img src="images/dgrgr.png" alt="">
                    <img src="images/fff.png" alt="">
                   
                   


                </div>
            </div>
        </section>

        <section>
        <div class="wrapper">
            <div class="counter">
                <div class="contents">
                    <div class="boxx">
                        <div class="icon"><i class="fa fa-history" ></i></div>
                        <div class="count">724+</div>
                        <div class="text">working hours</div>
                    </div>
                    <div class="boxx">
                        <div class="icon"><i class="fa fa-gift" ></i></div>
                        <div class="count">300+</div>
                        <div class="text">Complete Projects</div>
                    </div>
                    <div class="boxx">
                        <div class="icon"><i class="fa fa-users" ></i></div>
                        <div class="count">250+</div>
                        <div class="text">Happy Customers</div>
                    </div>
                    <div class="boxx">
                        <div class="icon"><i class="fa fa-history" ></i></div>
                        <div class="count">50+</div>
                        <div class="text">Awards Received</div>
                    </div>
                </div>
            </div>
        </div>
        </section>


        <section class="contact" id="contact">
            <div class="ab">
                <h1 >Contact Us</h1>
            </div>
            <div class="row">
                <form action="">
                <input type="text" placeholder="name" class="box">
                <input type="email" placeholder="email" class="box">
                <input type="number" placeholder="number" class="box">
                <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn" >
                </form>
                <div class="image">
                    <img src="images/macdata-about-man-1.png" alt="">
                </div>
            </div>
        </section>
       


        <footer class="footer">
            <div class="f-container">
                <div class="row">
                    <div class="col">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="aboutus.html">About us</a></li>
                            <li><a href="services.php">Our Services</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h4>Get Help</h4>
                        <ul>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="products.php">Orders</a></li>
                            <li><a href="#">Payment Methods</a></li>
                           
                        </ul>
                    </div>
                    <div class="col">
                        <h4>Contact Us</h4>
                        <ul>
                            <li><a href="contactus.html">Telephone</a></li>
                            <li><a href="contactus.html">Email</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h4>Follow Us</h4>
                        <div class="social-links">
                            <a href="https://www.facebook.com/venscart.net?mibextid=ZbWKwL"><i class=" fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <br><br><br><br>
                           
                    </div>
                    </div>
                </div>
            </div>
        </footer>
        
    </section>
    <footer>
             <div class="right">   
                   <p>&copy; 2024 All Rights Reserved by Teknozz Solutions.</p>                       
             </div>
     </footer>
  
    <script>
          function toggleMenu() {
    var menu = document.getElementById('menu-btn');
    menu.classList.toggle('active');
}

document.querySelector('.toggle').addEventListener('click', function() {
    document.querySelector('.navbar').classList.toggle('active');
});


        function addToCart(productName, productPrice) {
           // Create an object representing the product
           const product = { name: productName, price: productPrice };

           // Check if cart already exists in localStorage
           let cart = JSON.parse(localStorage.getItem('cart')) || [];

           // Add the product to the cart
           cart.push(product);

           // Update localStorage with the updated cart
           localStorage.setItem('cart', JSON.stringify(cart));

           // Optionally, update UI to reflect the addition of the item to the cart
           alert('Item added to cart!');
       }
      
       
   </script>
   <script>
    $(document).ready(function(){
        $(".counter").counter({
            delay:10,
            time:1200
        })
    });


   </script>


 
    

   </script>
    </body>
   
</html>