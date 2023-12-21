<?php  
include('./layouts/db.php');
?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Current Post List</h3>


  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>National ID</th>
          <th>Contact Number</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Status</th>
          <th>Actions</th>
          
        </tr>
      </thead>

      <tbody>
        <?php
        $result = $conn->query("SELECT * FROM `users`");
        while ($row = $result->fetch_assoc()) {
        ?>
          <!-- ... -->
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["fname"]; ?></td>
            <td><?php echo $row["lname"]; ?></td>
            <td><?php echo $row["national_id"]; ?></td>
            <td><?php echo $row["contact_num"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td>
              <?php
              if ($row["gender"] == '1') {
                echo 'Male';
              } else {
                echo 'Female';
              }
              ?>
            </td>
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
              <button id="btnEdit<?php echo $row["id"] ?>" class="btn btn-xs btn-info">Edit</button>
              <button id="btnView<?php echo $row["id"] ?>" class="btn btn-xs btn-warning">view</button>
              <button id="btnDelete<?php echo $row["id"] ?>" class="btn btn-xs btn-dark">Delete</button>
            </td>
          </tr>


          <script type="text/javascript">
            //  view user on modal
            $("#btnView<?php echo $row["id"] ?>").click(function() {
              var modal_id = '<?php echo $row["id"] ?>';

              $('#modalBTNLoad').modal('show');
              $("#modalDivLoad").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                                <div class="spinner-border text-warning" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>`);

              $.get("user_view.php", {
                  modal_id: modal_id
                })
                .done(function(data) {
                  $("#modalDivLoad").html(data);
                });
            });


            //  edit user on modal
            $("#btnEdit<?php echo $row["id"] ?>").click(function() {
              var modal_id = '<?php echo $row["id"] ?>';

              $('#modalBTNLoad').modal('show');
              $("#modalDivLoad").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                                <div class="spinner-border text-warning" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>`);

              $.get("user_edit.php", {
                  modal_id: modal_id
                })
                .done(function(data) {
                  $("#modalDivLoad").html(data);
                });
            });


            // delete user
            $("#btnDelete<?php echo $row["id"] ?>").click(function() {
              var modal_id = '<?php echo $row["id"] ?>';

              $('#modalBTNLoad2').modal('show');
              $("#modalDivLoad2").html(
                `<div class="d-flex justify-content-center align-content-center h-100 w-100">
                                <div class="spinner-border text-dark" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>`);

              $.get("user_delete.php", {
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
  <!-- /.card-body -->
</div>
<!-- /.card -->