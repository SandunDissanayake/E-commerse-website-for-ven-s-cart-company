<?php
// Include database connection and header
require('config.php'); // Adjust this based on your file structure
require('head.php');   // Include your header file

// Fetch "About Us" information
$select_query = "SELECT * FROM about_us_info WHERE id = 1";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
?>

<!-- ======= Main Content ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>About Us</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>About Us</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <!-- Display slider images dynamically (if applicable) -->
                            <!-- Example: -->
                            <!-- <div class="swiper-slide">
                                <img src="images/cart.png" alt="">
                            </div> -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Information</h3>
                        <ul>
                            <li><strong><?php echo $row['website_name']; ?></strong></li>
                            <li><strong>Website</strong>: <a href="<?php echo $row['website_url']; ?>"><?php echo $row['website_url']; ?></a></li>
                            <li><strong>E-mail</strong>: <?php echo $row['email']; ?></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>About Us</h2>
                        <p><?php echo $row['description']; ?></p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<?php
// Include footer
require('foot.php'); // Include your footer file
?>
