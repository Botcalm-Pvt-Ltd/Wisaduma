<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}


include('./include/db.php');

if (isset($_SESSION['user'])) {
  $userId = $_SESSION['user'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

  <link rel="icon" href="./assets/images/fav.png" type="image/x-icon" />
  <link rel="stylesheet" href="./assets/dashboard.css">
  <link href="./assets/owl.carousel.css" rel="stylesheet" type="text/css" />
  <link href="./assets/owl.theme.default.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/header.css">

  <!-- Toastr -->
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
</head>


<body>

<?php  
include('./include/nav.php');

?>

  <div>
    <div class="mb-5">
      <!-- slider one load here -->
      <div class=" container animate-box mt-5" id="list01">
      </div>

      <!-- slider two load here -->
      <div class=" container animate-box mt-5" id="list02">
      </div>

      <!-- slider three load here -->
      <div class=" container animate-box mt-5" id="list03">
      </div>

      <!-- slider four load here -->
      <div class=" container animate-box mt-5" id="list04">
      </div>
    </div>

    <div class="modal fade" id="modalBTNLoad">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modalDivLoad">

        </div>
      </div>
    </div>


  </div>

  <?php  
    include('./include/footer.php');
  ?>
 




  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Include jQuery Validate plugin -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


  <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script defer src="./assets/js/owl.carousel.min.js"></script>
  <script defer src="./assets/js/jquery.waypoints.min.js"></script>
  <!-- Toastr -->
  <script src="./plugins/toastr/toastr.min.js"></script>


  <script>
    // Load Project List after the document is fully loaded

    $("#list01").load("slider1.php", {
      limit: 25
    });

    $("#list02").load("slider2.php", {
      limit: 25
    });

    $("#list03").load("slider3.php", {
      limit: 25
    });

    $("#list04").load("slider4.php", {
      limit: 25
    });
  </script>


  <!-- add post -->
  <script>
    // Event handler for a click event on an element with ID "btnView" followed by the dynamic PHP value
    $("#btn_app_post").click(function() {

      // Show a loading spinner in the modal content area
      $('#modalBTNLoad').modal('show');

      $("#modalDivLoad").html(
        `<div class=" h-custom">
               <div class="spinner-border text-warning" role="status">
                 <span class="visually-hidden">Loading...</span>
               </div>
               </div>`);

      $.get("post_add.php", {})
        .done(function(data) {
          $("#modalDivLoad").html(data);
        });
    });
  </script>


  <!-- edit profile -->
  <script>
    // Event handler for a click event on an element with ID "btnView" followed by the dynamic PHP value
    $("#btn_edit_profile").click(function() {

      // Show a loading spinner in the modal content area
      $('#modalBTNLoad').modal('show');

      $("#modalDivLoad").html(
        `<div class=" h-custom">
               <div class="spinner-border text-warning" role="status">
                 <span class="visually-hidden">Loading...</span>
               </div>
               </div>`);

      $.get("profile_user.php", {})
        .done(function(data) {
          $("#modalDivLoad").html(data);
        });
    });
  </script>





</body>

</html>