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

// Fetch the users
$users = $result->fetch_assoc();

// Close the statement
$stmt->close();

?>

<div class="modal-header">
    <h4 class="modal-title text-center">EDIT USER</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form id="formusers" method="post" action="users_edit_submit.php">
        <div class="modal-body">
            <div class="mb-2 d-flex ">
                <img src=".<?php echo $users['img_path'] ?>" alt="" style="width: 50px; height: 50px; border: 1px solid #000;">
                <input type="file" class="form-control ml-5" name="img" >
            </div>
            <div class="mb-2">
                <label for="lname" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $users['name'] ?>">
            </div>
        
            <div class="mb-2">
                <label for="pro_title" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $users['email'] ?>">
            </div>
          
            
            <div class="mb-2">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1" <?php echo ($users['status'] == 1) ? "selected" : ""; ?>>Active</option>
                    <option value="0" <?php echo ($users['status'] == 0) ? "selected" : ""; ?>>Inactive</option>
                </select>
            </div>

        </div>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $users['id'] ?>">
        <div id="error" class="alert alert-danger" style="display:none;">Error message goes here.</div>
        <div class="modal-footer justify-content-end">
            <button type="submit" class="btn btn-xs btn-primary px-2 py-1">Save</button>
            <button type="button" class="btn btn-xs btn-danger px-2 py-1" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#formusers").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true 
                }
            },
            messages: {
                fname: {
                    required: " name is required",
                },
                email: {
                    required: "email is required",
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
                processData: false,  // Important! Don't process the files
                contentType: false,  // Important! Set content type to false

                // Add the FormData object to the data property
                data: formData,

                success: function(data) {
                    if (data.status == 1) {
                            toastr.success('User has been updated successfully!');
                            $('#modalBTNLoad').modal('hide');
                            $("#usersList").load("user_list.php");
                        } else {
                            toastr.error('Something went wrong!');
                        }
                },
                error: function(xhr, textStatus, errorThrown) {
                    // your existing error handling
                }
            });

            return false; // Prevent the form from submitting via the browser
        }
        });
    });
</script>
