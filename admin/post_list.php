<?php
include('./layouts/db.php');
?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Current Post List</h3>

    <button class="btn btn-primary  btn-sm float-right" id="add_post_btn">Add Post</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Title</th>
          <th>Description</th>
          <th>Category</th>
          <th>Post By</th>

          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $result = $conn->query("SELECT * FROM `posts`");
        while ($row = $result->fetch_assoc()) {
          $post_by = $row["post_by"];
         
          $user = $conn->query("SELECT `name` FROM `users` WHERE `id` = $post_by");
          $user_catch = $user->fetch_assoc();
          $user_c = $user_catch["name"];
        ?>
          <!-- ... -->
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo mb_strimwidth($row["title"], 0, 20, "..."); ?></td>
            <td><img src=".<?php echo $row["img_path"]  ?>" alt="" width="80" height="40"></td>
            <td><?php echo mb_strimwidth($row["description"], 0, 20, "..."); ?></td>
            <td>

              <?php
              if ($row["category"] == 'Road Crack') {
                echo '<span class="text-dark font-weight-bold">Road Crack</span>';
              } elseif ($row["category"] == 'Tree fallen') {
                echo '<span class="text-warning font-weight-bold">Tree fallen</span>';
              } elseif ($row["category"] == 'Unsafe Electrical') {
                echo '<span class="text-danger font-weight-bold">Unsafe Electrical</span>';
              } else {
                echo '<span class="text-primary font-weight-bold">Others</span>';
              }
              ?>
            </td>
            <td><?php echo $user_c; ?></td>
            <td>
              <?php
              if ($row["status"] == '1') {
                echo '<span class="badge bg-success">Active</span>';
              } else {
                echo '<span class="badge bg-danger">Inactive</span>';
              }
              ?>
            </td>
            <td>

              <?php
              if ($row["status"] == '1') {
                echo '<button id="btnReject' . $row["id"] . '" class="btn btn-xs btn-danger">Reject</button>';
              } else {
                echo '<button id="btnApprove' . $row["id"] . '" class="btn btn-xs btn-success">Approve</button>';
              }
              ?>
              <button id="btnEdit<?php echo $row["id"] ?>" class="btn btn-xs btn-info">Edit</button>
              <button id="btnView<?php echo $row["id"] ?>" class="btn btn-xs btn-warning">view</button>
              <button id="btnDelete<?php echo $row["id"] ?>" class="btn btn-xs btn-dark">Delete</button>
            </td>
          </tr>


          <script type="text/javascript">
            //  view post on modal
            $("#btnView<?php echo $row["id"] ?>").click(function() {
              var modal_id = '<?php echo $row["id"] ?>';

              $('#modalBTNLoad').modal('show');
              $("#modalDivLoad").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                                <div class="spinner-border text-warning" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>`);

              $.get("post_view.php", {
                  modal_id: modal_id
                })
                .done(function(data) {
                  $("#modalDivLoad").html(data);
                });
            });


            //  edit post on modal
            $("#btnEdit<?php echo $row["id"] ?>").click(function() {
              var modal_id = '<?php echo $row["id"] ?>';

              $('#modalBTNLoad').modal('show');
              $("#modalDivLoad").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                                <div class="spinner-border text-warning" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>`);

              $.get("post_edit.php", {
                  modal_id: modal_id
                })
                .done(function(data) {
                  $("#modalDivLoad").html(data);
                });
            });


            // reject post
            $("#btnReject<?php echo $row["id"] ?>").click(function() {
              var modal_id = '<?php echo $row["id"] ?>';

              $('#modalBTNLoad2').modal('show');
              $("#modalDivLoad2").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                                <div class="spinner-border text-danger" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>`);

              $.get("post_reject.php", {
                  modal_id: modal_id
                })
                .done(function(data) {
                  $("#modalDivLoad2").html(data);
                });
            });


            // reject Approve
            $("#btnApprove<?php echo $row["id"] ?>").click(function() {
              var modal_id = '<?php echo $row["id"] ?>';

              $('#modalBTNLoad2').modal('show');
              $("#modalDivLoad2").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                                <div class="spinner-border text-success" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>`);

              $.get("post_approve.php", {
                  modal_id: modal_id
                })
                .done(function(data) {
                  $("#modalDivLoad2").html(data);
                });
            });


            // reject Approve
            $("#btnDelete<?php echo $row["id"] ?>").click(function() {
              var modal_id = '<?php echo $row["id"] ?>';

              $('#modalBTNLoad2').modal('show');
              $("#modalDivLoad2").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                                <div class="spinner-border text-dark" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>`);

              $.get("post_delete.php", {
                  modal_id: modal_id
                })
                .done(function(data) {
                  $("#modalDivLoad2").html(data);
                });
            });
          </script>



        <?php
        }
        ?>

      </tbody>
    </table>
  </div>

  <!-- Add post -->
  <script>
    add_post_btn
    $("#add_post_btn").click(function() {

      $('#modalBTNLoad').modal('show');
              $("#modalDivLoad").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                  <div class="spinner-border text-warning" role="status">
                  <span class="visually-hidden">Loading...</span>
                  </div>
              </div>`);

              $.get("post_add.php", {
                })
                .done(function(data) {
                  $("#modalDivLoad").html(data);
                });
    });
  </script>

  <!-- /.card-body -->
</div>
<!-- /.card -->