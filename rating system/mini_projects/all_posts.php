<?php
include 'components/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>All Posts</title>

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- Header section starts  -->
<?php include 'components/header.php'; ?>
<!-- Header section ends -->

<!-- View all posts section starts  -->
<section class="all-posts">
   <div class="heading"><h1>All Posts</h1></div>
   <div class="box-container">
   <?php
      try {
         // Fetch all posts with their respective review counts
         $select_posts = $conn->prepare("SELECT p.*, COUNT(r.id) AS total_reviews 
                                         FROM posts p 
                                         LEFT JOIN reviews r ON p.id = r.post_id 
                                         GROUP BY p.id");
         $select_posts->execute();
         
         if($select_posts->rowCount() > 0){
            while($fetch_post = $select_posts->fetch(PDO::FETCH_ASSOC)){
               $post_id = $fetch_post['id'];
   ?>
               <div class="box">
                  <img src="uploaded_files/<?= $fetch_post['image']; ?>" alt="" class="image">
                  <h3 class="title"><?= $fetch_post['title']; ?></h3>
                  <p class="total-reviews"><i class="fas fa-star"></i> <span><?= $fetch_post['total_reviews']; ?></span></p>
                  <a href="view_post.php?get_id=<?= $post_id; ?>" class="inline-btn">View Post</a>
               </div>
   <?php
            }
         } else {
            echo '<p class="empty">No posts added yet!</p>';
         }
      } catch (PDOException $e) {
         echo "Error: " . $e->getMessage(); // Display error message
      }
   ?>
   </div>
</section>
<!-- View all posts section ends -->

<!-- SweetAlert CDN link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- Custom JS file link  -->
<script src="js/script.js"></script>

<?php include 'components/alers.php'; ?>

</body>
</html>
