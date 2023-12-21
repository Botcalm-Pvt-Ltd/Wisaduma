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

// Fetch the posts
$posts = $result->fetch_assoc();

// Close the statement
$stmt->close();

?>

<div class="modal-header">
    <h4 class="modal-title text-center">EDIT POST</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form id="formPosts" method="post" action="posts_edit_submit.php">
        <div class="modal-body">
            <div class="mb-2">
                <label for="pro_title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $posts['title'] ?>">
            </div>
            <div class="mb-2">
                <label for="short_desc" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="5"><?php echo $posts['description'] ?></textarea>
            </div>
            <div class="mb-2">
                <label for="category" class="form-label">Category</label>
                <select name="category" class="form-control">
                    <option value="normal" <?php echo ($posts['category'] == "normal") ? "selected" : ""; ?>>Normal</option>
                    <option value="emergency" <?php echo ($posts['category'] == "emergency") ? "selected" : ""; ?>>Emergency</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1" <?php echo ($posts['status'] == 1) ? "selected" : ""; ?>>Active</option>
                    <option value="0" <?php echo ($posts['status'] == 0) ? "selected" : ""; ?>>Inactive</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="post_id" id="post_id" value="<?php echo $posts['id'] ?>">
        <div id="error" class="alert alert-danger" style="display:none;">Error message goes here.</div>
        <div class="modal-footer justify-content-end">
            <button type="submit" class="btn btn-xs btn-primary px-2 py-1">Save</button>
            <button type="button" class="btn btn-xs btn-danger px-2 py-1" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#formPosts").validate({
            rules: {
                title: {
                    required: true,
                },
                description: {
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Post title is required",
                },
                description: {
                    required: "Post description is required"
                }
            },
            highlight: function(element) {
                $(element).closest('.form-control').addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('is-invalid');
                $(element).closest('.form-control').addClass('is-valid');
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group-prepend').length) {
                    $(element).siblings(".invalid-feedback").append(error);
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                var $form = $(form);
                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    dataType: 'json',
                    data: $form.serialize(),
                    success: function(data) {
                        if (data.status == 1) {

                            // get success message
                            toastr.success('Post has been updated successfully!');

                            // get hide modal
                            $('#modalBTNLoad').modal('hide');

                            // load table
                            $("#postsList").load("post_list.php");
                        } else {
                            $("#error").show().html("Error message: " + data.message);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        $("#error").show().html("AJAX request failed: " + errorThrown);
                    }
                });
                return false; // Prevent the form from submitting via the browser
            }
        });
    });
</script>
