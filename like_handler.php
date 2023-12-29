<?php
// Connect to your database
include('./include/db.php');



// Get post_id from AJAX request
$postId = $_POST['post_id'];
$userId = $_POST['user_id'];

// Check if the user has already liked the post
$query = "SELECT * FROM likes WHERE user_id = $userId AND post_id = $postId";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // User has already liked the post, so unlike it
    $query = "DELETE FROM likes WHERE user_id = $userId AND post_id = $postId";
    $status = 'unliked';
} else {
    // User hasn't liked the post, so like it
    $query = "INSERT INTO likes (user_id, post_id) VALUES ($userId, $postId)";
    $status = 'liked';
}

mysqli_query($conn, $query);

// Get the updated like count
$likeCountQuery = "SELECT COUNT(id) AS like_count FROM likes WHERE post_id = $postId";
$likeCountResult = mysqli_query($conn, $likeCountQuery);
$likeCountData = mysqli_fetch_assoc($likeCountResult);
$likeCount = $likeCountData['like_count'];

// Return status and updated like count to the JavaScript
echo json_encode(['status' => $status, 'likeCount' => $likeCount]);
?>
