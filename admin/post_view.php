<?php

include('./layouts/db.php');

// Make sure $m_id is a valid integer to prevent SQL injection
$m_id = intval($_GET["modal_id"]);

// Prepare the statement
$stmt = $conn->prepare("SELECT * FROM `posts` WHERE `id` = ?");
$stmt->bind_param("i", $m_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch thpos$posts
$posts = $result->fetch_assoc();

$user = $posts['post_by'];
$user = $conn->query("SELECT `name` FROM `users` WHERE `id` = $user") ;
$user_catch = $user->fetch_assoc();
$user_c = $user_catch["name"];

?>


<div class="modal-header">
    <h4 class="modal-title text-center">VIEW POST</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Image</p>
        <p class=""><img src=".<?php echo $posts['img_path'];  ?>" alt="" width="100" height="50"></p>
    </div>

    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Title</p>
        <p class=""><?php echo $posts['title']; ?></p>
    </div>

    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Category</p>
        <p class="">
            <?php
            if ($posts["category"] == 'Road Crack') {
                echo '<span class="text-dark font-weight-bold">Road Crack</span>';
            } elseif ($posts["category"] == 'Tree fallen') {
                echo '<span class="text-warning font-weight-bold">Tree fallen</span>';
            } elseif ($posts["category"] == 'Unsafe Electrical') {
                echo '<span class="text-danger font-weight-bold">Unsafe Electrical</span>';
            } else {
                echo '<span class="text-primary font-weight-bold">Others</span>';
            }
            ?>
        </p>
    </div>

    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Status</p>
        <p class="">
            <?php if ($posts["status"] == '1') {
                echo '<span class="badge bg-success">Active</span>';
            } else {
                echo '<span class="badge bg-danger">Inactive</span>';
            } ?>
        </p>
    </div>

    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Post By</p>
        <p class=""><?php echo $user_c; ?></p>
    </div>

    <div class="w-100 d-flex">
        <p class="fs-6 text-justify"><?php echo $posts['description'] ?></p>
    </div>
</div>
<div class="modal-footer justify-content-end">
    <button type="button" class="btn btn-xs btn-danger px-2 py-1" data-dismiss="modal">Close</button>
</div>

<p></p>