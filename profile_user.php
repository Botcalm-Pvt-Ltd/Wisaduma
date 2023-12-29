<?php
session_start();
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


<div class="modal-header">
    <h5 class="modal-title">My Profile</h5>
    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="formProfileEdit" method="post" action="profile_user_submit.php">

    <div class="modal-body">
        <div class="form-group d-flex align-content-center justify-content-center">
            <img src="<?php echo $user['img_path'] ?>" alt="pro" style="width: 70px; height: 70px; border:1px solid #5A6F7F; border-radius: 50%;">
        </div>

        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" class="form-control shadow-none" name="name" value="<?php echo $user['name'] ?>">
        </div>

        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control shadow-none" name="email" value="<?php echo $user['email'] ?>">
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="email" class="form-control shadow-none" value="*********" disabled>
            <span ><a href="#" style="color: red; font-size: 12px;">click here to change password</a></span>
        </div>

        <div class="form-group">
            <label for="inputImage">Upload Image:</label>
            <input type="file" class="form-control shadow-none" name="img">
        </div>

        <input type="text" class="form-control" name="user_id" value="<?php echo $userId;  ?>" style="display: none;">
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary w-100">Save</button>
    </div>

</form>


<script>
    $(document).ready(function() {
        $("#formProfileEdit").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                name: {
                    required: "name is required",
                },
                email: {
                    required: "Email is required",
                    email: "Please enter a valid email address"
                },
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
                            toastr.success('Profile is updated successfully!');
                            $('#modalBTNLoad').modal('hide');

                        } else {
                            toastr.error('Something went wrong!');
                            $form[0].reset();
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