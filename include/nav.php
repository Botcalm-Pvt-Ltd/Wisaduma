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





<nav>
  
  <div class="d-flex align-content-center justify-content-center">
    <img src="./assets/Images/Top-logo.png" alt="Your Logo" class="logo">
  </div>


 
  <input type="text" placeholder="Search" class="search-bar">
  
  

  <div class="profile-dropdown">
    <img src="<?php echo $user["img_path"]  ?>" alt="" class="main-pro-img">
    <div class="profile-dropdown-content">
      <a href="#" class="profile-dropdown-item" id="btn_edit_profile">My Profile</a>
      <a href="./my_posts.php" class="profile-dropdown-item">My Posts</a>
      <a href="#" class="profile-dropdown-item" id="btn_app_post">Add Post</a>
      <a href="logout.php" class="profile-dropdown-item">Logout</a>
    </div>
  </div>
</nav>