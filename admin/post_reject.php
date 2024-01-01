<?php

include('./layouts/db.php');

// Make sure $m_id is a valid integer to prevent SQL injection
$m_id = intval($_GET["modal_id"]);

?>

<div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="w-100 d-flex justify-content-center align-content-center flex-column ">
        <h3 class="text-center">Are your sure want to reject this !</h3>
       
        <div class="d-flex justify-content-center align-content-center  mt-5 ">
            <button type="button" class="btn btn-sm btn-danger px-2 py-1 ml-2" id="btnConfirm">Yes! Reject</button>
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
                url: "post_reject_submit.php",
                data: {
                    modal_id: modal_id,
                },
                success: function(data) {
                    if (data.status == 1) {
                        // get success message
                        toastr.error('Post has been rejected successfully!');
                        // get hide modal
                        $('#modalBTNLoad2').modal('hide');
                      
                        // load table
                        $("#postsList").load("post_list.php");
                        $("#postsListRoadCrack").load("post_list_road_crack.php");
                        $("#postsListTreeFallen").load("post_list_tree_fallen.php");
                        $("#postsListUnsafeElectrical").load("post_list_unsafe_electrical.php");
                        $("#postsListOther").load("post_list_other.php");
                        $("#postsListRecent").load("post_list_recent.php");

                        

                    }
                }
            });
            event.preventDefault;
        });

    });
</script>