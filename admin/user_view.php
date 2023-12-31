<?php

include('./layouts/db.php');

// Make sure $m_id is a valid integer to prevent SQL injection
$m_id = intval($_GET["modal_id"]);

// Prepare the statement
$stmt = $conn->prepare("SELECT * FROM `users` WHERE `id` = ?");
$stmt->bind_param("i", $m_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch thpos$users
$users = $result->fetch_assoc();

// Close the statement
$stmt->close();

?>


<div class="modal-header">
    <h4 class="modal-title text-center">VIEW USER</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">First Name</p>
        <p class=""><?php echo $users['fname']; ?></p>
    </div>
    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Last Name</p>
        <p class=""><?php echo $users['lname']; ?></p>
    </div>
    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">National ID</p>
        <p class=""><?php echo $users['national_id']; ?></p>
    </div>
    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Contact Number</p>
        <p class=""><?php echo $users['contact_num']; ?></p>
    </div>
    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Email</p>
        <p class=""><?php echo $users['email']; ?></p>
    </div>
    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Gender</p>
        <p class="">
            <?php if ($users["gender"] == '1') {
            echo 'Male';
            } else {
             echo 'Female';
            }?>
         </p>
    </div>

    <div class="w-100 d-flex ">
        <p class="font-weight-bold w-25">Status</p>
        <p class="">
            <?php if ($users["status"] == '1') {
            echo '<span class="badge bg-success">Active</span>';
            } else {
             echo '<span class="badge bg-danger">Inactive</span>';
            }?>
         </p>
    </div>

</div>
<div class="modal-footer justify-content-end">
    <button type="button" class="btn btn-xs btn-danger px-2 py-1" data-dismiss="modal">Close</button>
</div>

<p></p>