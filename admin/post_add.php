<?php

include('./layouts/db.php');

?>

<div class="modal-header">
    <h4 class="modal-title text-center">ADD POST</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form id="formPosts" method="post" action="posts_add_submit.php">
        <div class="modal-body">
            <div class="mb-2 d-flex align-items-center justify-content-between ">
                <label for="img" class="form-label">Image</label>
                <input type="file" class="form-control ml-5" name="img">
            </div>
            <div class="mb-2">
                <label for="pro_title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" >
            </div>
            <div class="mb-2">
                <label for="short_desc" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="5"></textarea>
            </div>
            <div class="mb-2">
                <label for="category" class="form-label">Category</label>
                <select name="category" class="form-control">
                    <option value="Road Crack" >Road Crack</option>
                    <option value="Tree fallen" >Tree fallen</option>
                    <option value="Unsafe Electrical" >Unsafe Electrical</option>
                    <option value="Other" >Other</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1" >Active</option>
                    <option value="0" >Inactive</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="short_desc" class="form-label">Post By</label>
                <input type="text" class="form-control" name="post_by"  value="Admin" disabled>
            </div>
        </div>
        
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
                            toastr.success('Post has been add successfully!');
                            $('#modalBTNLoad').modal('hide');
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