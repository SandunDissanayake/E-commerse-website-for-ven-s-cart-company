<?php

include 'components/connect.php';

$warning_msg = []; // Array to store warning messages
$success_msg = []; // Array to store success messages

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
} else {
   $get_id = '';
   header('location: all_posts.php');
   exit;
}

if(isset($_POST['submit'])){
   $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
   $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $rating = filter_var($_POST['rating'], FILTER_SANITIZE_STRING);

   try {
      $update_review = $conn->prepare("UPDATE `reviews` SET rating = ?, title = ?, description = ? WHERE id = ?");
      $update_review->execute([$rating, $title, $description, $get_id]);

      $success_msg[] = 'Review updated!';
   } catch (PDOException $e) {
      $warning_msg[] = 'Error updating review: ' . $e->getMessage();
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Review</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<!-- Header section -->
<?php include 'components/header.php'; ?>

<section class="account-form">
   <?php
   try {
      $select_review = $conn->prepare("SELECT * FROM `reviews` WHERE id = ? LIMIT 1");
      $select_review->execute([$get_id]);

      if($select_review->rowCount() > 0){
         $fetch_review = $select_review->fetch(PDO::FETCH_ASSOC); // Fetch the review data
   ?>
         <form action="" method="post">
            <h3>Edit Your Review</h3>
            <p class="placeholder">Review Title <span>*</span></p>
            <input type="text" name="title" required maxlength="50" placeholder="Enter review title" class="box" value="<?= htmlspecialchars($fetch_review['title']); ?>">
            <p class="placeholder">Review Description</p>
            <textarea name="description" class="box" placeholder="Enter review description" maxlength="1000" cols="30" rows="10"><?= htmlspecialchars($fetch_review['description']); ?></textarea>
            <p class="placeholder">Review Rating <span>*</span></p>
            <select name="rating" class="box" required>
               <option value="<?= htmlspecialchars($fetch_review['rating']); ?>"><?= htmlspecialchars($fetch_review['rating']); ?></option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
            </select>
            <input type="submit" value="Update Review" name="submit" class="btn">
            <a href="view_post.php?get_id=<?= $fetch_review['post_id']; ?>" class="option-btn">Go Back</a>
         </form>
   <?php
      } else {
         echo '<p class="empty">Review not found!</p>';
      }
   } catch (PDOException $e) {
      echo '<p class="warning">Error fetching review: ' . $e->getMessage() . '</p>';
   }
   ?>
</section>

<!-- SweetAlert CDN link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/script.js"></script>

<?php include 'components/alerts.php'; ?>

</body>
</html>
