<?php

include('./include/db.php');

// Make sure $m_id is a valid integer to prevent SQL injection
$m_id = intval($_GET["modal_id"]);
$login_user = intval($_GET["login_user_id"]);

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
$user = $conn->query("SELECT `name` FROM `users` WHERE `id` = $user");
$user_catch = $user->fetch_assoc();
$user_c = $user_catch["name"];


$databaseDate = $posts["create_at"];
// Convert the database date string to a DateTime object
$dateObject = new DateTime($databaseDate);
// Format the date using the desired format
$formattedDate = $dateObject->format('F j, Y, g:i a'); // Adjust the format as needed

?>


<?php 

// Prepare the statement
$stmts = $conn->prepare("SELECT * FROM `users` WHERE `id` = ?");
$stmts->bind_param("i", $login_user);

// Execute the statement
$stmts->execute();

// Get the result
$results = $stmts->get_result();


$user_login = $results->fetch_assoc();
$user_login = $user_login["img_path"];


?>


<div class="modal-header">
    <h5 class="modal-title"><?php echo $posts["category"]  ?> : <?php echo $posts["title"]  ?></h5>
    <button type="button" class="close close-btn  " data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="px-3"><?php echo $formattedDate  ?></div>

<div class="px-3"> Post by : <?php echo $user_c; ?></div>

<br>


<div class="modal-body-design ">
    <div class="modal-body-design-column">
        <img class="img-fluid" src="<?php echo $posts["img_path"]  ?>" alt="" />
    </div>
    <div class="modal-body-design-column">
        <?php echo $posts["description"]  ?>
    </div>

</div>
<div class="modal-footer d-flex align-items-start">

    <div class="row w-100 ">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6  ">
            <div class="post-container w-100" id="comment-box">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-6  ">

            <form id="formComments" method="post" class="w-100">
                <div class="comment-sec ">
                    <img src="<?php echo $user_login;  ?>" alt="" class="main-pro-img" >

                    <input type="text" name="comment" placeholder="Add a comment..." class="w-100 py-2 ">

                    <button type="submit" class="btn btn-secondary  mb-2">Comment</button>

                    <input type="text" name="post_id" value="<?php echo $posts["id"]; ?>" style="display: none;">
                    <input type="text" name="user_id" value="<?php echo $posts["post_by"]; ?>" style="display: none;">
                </div>
            </form>

        </div>
    </div>


</div>

<script>
    // Load Project List after the document is fully loaded

    $("#comment-box").load("comment_list.php", {
        limit: 25,
        post_id: <?php echo $posts["id"]; ?>
    });
</script>

<!-- comment submit -->
<script>
    $("#formComments").validate({
        rules: {
            comment: {
                required: true,
            }
        },

        submitHandler: function(form, event) {
            var $form = $('#formComments');
            $.ajax({
                type: 'POST', // Make sure this is set to 'POST'
                url: "comment_submit.php",
                dataType: 'json',
                data: $form.serialize(),
                success: function(data) {

                    if (data.status == 1) {

                        // Clear the form
                        $form[0].reset();

                        // load comment table
                        $("#comment-box").load("comment_list.php", {
                            limit: 25,
                            post_id: <?php echo $posts["id"]; ?>
                        });
                    }
                }
            });

            event.preventDefault();
        }
    });
</script>