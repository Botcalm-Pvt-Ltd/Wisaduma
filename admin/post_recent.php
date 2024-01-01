<?php

include('./layouts/db.php');

session_start();
if (!isset($_SESSION['admin_user'])) {
  header('Location: login.php');
  exit;
}

?>

<!-- header start -->

<?php require('./layouts/header.php')  ?>
<!-- header end -->



<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="./assets/images/Top-logo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar start-->
  <?php require('./layouts/navbar.php')  ?>
  <!-- navbar end -->

  <!-- Main Sidebar  -->
  <?php require('./layouts/sidebar.php')  ?>
  <!-- Main Sidebar end -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Recent Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12" id="postsListRecent">
            
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <!-- modal -->
    <div class="modal fade" id="modalBTNLoad">
      <div class="modal-dialog modal-lg">
        <div class="modal-content d-flex justify-content-center align-content-center " id="modalDivLoad" style="min-height: 200px;">


        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- modal2 -->
    <div class="modal fade" id="modalBTNLoad2">
        <div class="modal-dialog modal-md">
        <div class="modal-content  d-flex justify-content-center align-content-center " id="modalDivLoad2" style="min-height: 200px;">
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



  </div>
  <!-- /.content-wrapper -->


  <!-- footer start -->
  <?php require('./layouts/footer.php')  ?>
  <!-- footer end -->


</div>
<!-- ./wrapper -->

<script>
        // Load Project List
        $("#postsListRecent").load("post_list_recent.php", {
            limit: 25
        });
</script>


<!-- jslink start -->
<
<?php require('./layouts/jslink.php')  ?>
<!-- jslink end -->

</body>

</html>