<?php

include('./include/db.php');

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


?>

<div class="modal-header">
    <h4 class="modal-title text-center">EDIT POST</h4>
    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form id="formPosts" method="post" action="my_post_edit_submit.php">
        <div class="modal-body">
            <div class="mb-2 d-flex align-items-center justify-content-between ">
                <img src="<?php echo $posts['img_path'];  ?>" alt="" width="100" height="50">
                <input type="file" class="form-control ml-5" name="img">
            </div>
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
                    <option value="Road Crack" <?php echo ($posts['category'] == "Road Crack") ? "selected" : ""; ?>>Road Crack</option>
                    <option value="Tree fallen" <?php echo ($posts['category'] == "Tree fallen") ? "selected" : ""; ?>>Tree fallen</option>
                    <option value="Unsafe Electrical" <?php echo ($posts['category'] == "Unsafe Electrical") ? "selected" : ""; ?>>Unsafe Electrical</option>
                    <option value="Other" <?php echo ($posts['category'] == "Other") ? "selected" : ""; ?>>Other</option>
                </select>
            </div>
            
        </div>
        <input type="hidden" name="post_id" id="post_id" value="<?php echo $posts['id'] ?>">
        <div id="error" class="alert alert-danger" style="display:none;">Error message goes here.</div>
        <div class="modal-footer ">
            <button type="submit" class="btn  btn-primary px-2 py-1">Save</button>
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
                var formData = new FormData(form);

                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    dataType: 'json',
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Ensure that FormData is used
                    success: function(data) {
                        if (data.status == 1) {
                            toastr.success('Post has been updated successfully!');
                            $('#modalBTNLoad').modal('hide');
                            $("#list01").load("my_post_list.php");
                        } else {
                            toastr.error('Something went wrong!');
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