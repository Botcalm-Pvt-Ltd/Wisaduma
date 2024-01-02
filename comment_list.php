<?php

include('./include/db.php');
$post_id = $_POST['post_id'];

$result = $conn->query("SELECT * FROM `comments` WHERE `post_id` = $post_id");

while ($row = $result->fetch_assoc()) {

    $comment_by = $row["user_id"];

    $user = $conn->query("SELECT `name`,`img_path` FROM `users` WHERE `id` = $comment_by");
    $user_catch = $user->fetch_assoc();

    $user_c = $user_catch["name"];
    $user_img = $user_catch["img_path"];
?>


<div class="comment-sec-2">
    <img src="<?php echo $user_img; ?>" alt="" class="main-pro-img mb-3 mr-2">
    <p class="text-justify " style="color: #02234D;"><strong><?php echo $user_c; ?>:</strong> <?php echo $row["comment"]  ?></p>
</div>

<?php
}
?>





