<?php

include('./include/db.php');

if (isset($_POST['comment']) && isset($_POST['user_id']) && isset($_POST['post_id'])) {
  

    $comment = $_POST['comment'];
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];

     // Insert the new user into the database
     $stmt = $conn->prepare("INSERT INTO `comments` (`comment`, `user_id`, `post_id`) VALUES (?, ?, ?)");
     $stmt->bind_param('sss', $comment, $user_id, $post_id);
     $stmt->execute();
     $stmt->close();

     $status = '1';
     $msg = "comment is added";
}else{
    $status = '1';
    $msg = "comment is required";
}

$response = array('msg' => $msg, 'status' => $status);
echo json_encode($response);
?>
