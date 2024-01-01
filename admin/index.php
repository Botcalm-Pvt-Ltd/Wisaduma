<?php

session_start();
if (!isset($_SESSION['admin_user'])) {
  header('Location: login.php');
  exit;
}

include('./layouts/db.php');

$resultAllPost = $conn->query("SELECT * FROM `posts` ORDER BY `create_at` DESC");
$rowCountAllPost = $resultAllPost->num_rows;

$resultRecentPost = $conn->query("SELECT * FROM `posts` WHERE `status`='0' ORDER BY `create_at` DESC");
$rowCountRecentPost = $resultRecentPost->num_rows;

$resultRoadCrackPost = $conn->query("SELECT * FROM `posts`WHERE `category`='Road Crack' ORDER BY `create_at` DESC");
$rowCountRoadCrackPosts = $resultRoadCrackPost->num_rows;

$resultTreeFallenPost = $conn->query("SELECT * FROM `posts`WHERE `category`='Tree fallen' ORDER BY `create_at` DESC");
$rowCountTreeFallenPosts = $resultTreeFallenPost->num_rows;

$resultTreeFallenPost = $conn->query("SELECT * FROM `posts`WHERE `category`='Unsafe Electrical' ORDER BY `create_at` DESC");
$rowCountTreeFallenPosts = $resultTreeFallenPost->num_rows;

$resultUnsafeElectricalPost = $conn->query("SELECT * FROM `posts`WHERE `category`='Unsafe Electrical' ORDER BY `create_at` DESC");
$rowCountUnsafeElectricalPosts = $resultUnsafeElectricalPost->num_rows;

$resultOtherPost = $conn->query("SELECT * FROM `posts`WHERE `category`='Other' ORDER BY `create_at` DESC");
$rowCountOtherPosts = $resultOtherPost->num_rows;
?>

<!-- header start -->
<?php require('./layouts/header.php'); ?>
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row ">
          <div class="col-12 d-flex justify-content-end mb-2">
            <div class="btn btn-primary px-5" id="add_post_btn">Add Post</div>
          </div>
        </div>

        <div class="row ">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="post.php">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $rowCountAllPost; ?></h3>

                  <p>All Posts</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <span class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></span>
              </div>
            </a>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="post_recent.php">
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3><?php echo $rowCountRecentPost; ?></h3>

                  <p>Recent Posts &nbsp; <span style="color: #fff; font-size: 12px; font-weight: 400;"> (Please approve to display) </span></p>

                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <span class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></span>
              </div>
            </a>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="post_road_rack.php">
              <div class="small-box bg-dark">
                <div class="inner">

                  <h3><?php echo  $rowCountRoadCrackPosts; ?></h3>

                  <p>Road Crack</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-stopwatch"></i>
                </div>
                <span class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></span>
              </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="post_tree_fallen.php">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo  $rowCountTreeFallenPosts; ?></h3>

                  <p>Tree Fallen
                </div>
                <div class="icon">
                  <i class="ion ion-android-share-alt"></i>
                </div>
                <span class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></span>
              </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="post_unsafe_electrical.php">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $rowCountUnsafeElectricalPosts ?></h3>

                  <p>Unsafe Electrical</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-delete"></i>
                </div>
                <span class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></span>
              </div>
            </a>

          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="post_other.php">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $rowCountOtherPosts ?></h3>

                  <p>Other</p>
                </div>
                <div class="icon">
                  <i class="ion ion-beaker"></i>
                </div>
                <span class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></span>
              </div>
            </a>

          </div>
          <!-- ./col -->
        </div>
       
        



      </div>
    </section>

    <!-- modal -->
    <div class="modal fade" id="modalBTNLoad">
      <div class="modal-dialog modal-lg">
        <div class="modal-content d-flex justify-content-center align-content-center " id="modalDivLoad" style="min-height: 200px;">


        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  </div>



  <!-- footer start -->
  <?php require('./layouts/footer.php')  ?>
  <!-- footer end -->


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

<!-- jslink start -->
<?php require('./layouts/jslink.php')  ?>
<!-- jslink end -->

</body>

</html>