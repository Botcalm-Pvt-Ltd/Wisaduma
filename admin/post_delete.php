<?php

include('./layouts/db.php');

// Make sure $m_id is a valid integer to prevent SQL injection
$m_id = intval($_GET["modal_id"]);

?>

<div class="modal-body bg-danger">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="w-100 d-flex justify-content-center align-content-center flex-column ">
        <h3 class="text-center">Are your sure want to delete this !</h3>
        <p class="text-center">You cannot recover deleted content.</p>
       
        <div class="d-flex justify-content-center align-content-center  mt-5 ">
            <button type="button" class="btn btn-sm btn-success px-2 py-1 ml-2" id="btnConfirm">Yes! Delete</button>
            &nbsp;&nbsp;
            <button type="button" class="btn btn-sm btn-dark px-2 py-1" data-dismiss="modal">Close</button>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(e) {
        $("#btnConfirm").click(function() {
            var modal_id = '<?php echo $m_id ?>';
            $.ajax({
                type: 'POST',
                url: "post_delete_submit.php",
                data: {
                    modal_id: modal_id,
                },
                success: function(data) {
                    if (data.status == 1) {
                        // get success message
                        toastr.error('Post has been deleted successfully!');
                        // get hide modal
                        $('#modalBTNLoad2').modal('hide');
                        // load table
                        $("#postsList").load("post_list.php");
                    }
                }
            });
            event.preventDefault;
        });

    });
</script>