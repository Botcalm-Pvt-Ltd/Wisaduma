<?php
session_start();
include('./include/db.php');

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user'];
}

?>


<div class="modal-header">
    <h5 class="modal-title">Create a Post</h5>
    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="formPosts" method="post" action="post_add_submit.php">
    <div class="modal-body">
        <div class="form-group">
            <label for="inputName">Tittle</label>
            <input type="text" class="form-control shadow-none" name="title" placeholder="Enter your tittle">
        </div>
        
        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-control shadow-none">
                <option value="Road Crack">Road Crack</option>
                <option value="Tree fallen">Tree fallen</option>
                <option value="Unsafe Electrical">Unsafe Electrical</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="inputImage">Upload Image:</label>
            <input type="file" class="form-control shadow-none" name="img">
        </div>
        
        <div class="form-group">
            <label for="short_desc" class="form-label">Message</label>
            <textarea class="form-control shadow-none" name="description" rows="3"></textarea>
        </div>

        <input type="text" class="form-control" name="post_by" value="<?php echo $userId;  ?>" style="display: none;">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary w-100 log-reg-btn">Submit</button>
    </div>

</form>


<script>
    $(document).ready(function() {
        $("#formPosts").validate({
            rules: {
                img: {
                    required: true,
                },
                title: {
                    required: true,
                },
                description: {
                    required: true,
                }
            },
            messages: {
                img: {
                    required: "Post image is required",
                },
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

                            console.log("success.....");
                            toastr.success('Post Added successfully!');
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