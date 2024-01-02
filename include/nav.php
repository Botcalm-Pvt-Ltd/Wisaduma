<?php


include('./include/db.php');

if (isset($_SESSION['user'])) {
  $userId = $_SESSION['user'];
}

// Prepare the statement
$stmt = $conn->prepare("SELECT * FROM `users` WHERE `id` = ?");
$stmt->bind_param("i", $userId);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the posts
$user = $result->fetch_assoc();

?>



<nav class="" style="background: #F8F9FA;">

  <div class="d-flex align-content-center justify-content-center p-1 ">
    <img src="./assets/images/Top-logo.png" alt="Your Logo" class="logo">
  </div>


  <div class="search-bar-div ">
    <input type="text" placeholder="Search your course here.." class="search-bar">
    <img src="./assets/images/search.png" alt="" class="search-icons">
  </div>



  <div class="profile-dropdown">
    <img src="<?php echo $user["img_path"]  ?>" alt="" class="main-pro-img">
    <div class="profile-dropdown-content">
      <a href="#" class="profile-dropdown-item" id="btn_edit_profile">My Profile</a>
      <a href="./my_posts.php" class="profile-dropdown-item">My Posts</a>
      <a href="#" class="profile-dropdown-item" id="btn_app_post">Add Post</a>
      <a href="logout.php" class="profile-dropdown-item d-flex align-items-center" style="color: #F13E3E;"> <img src="./assets/images/logout.png " alt="" class="mr-2"> Logout</a>


    </div>
  </div>
</nav>