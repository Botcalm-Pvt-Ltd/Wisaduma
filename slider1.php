<?php
session_start();
include('./include/db.php');

if (isset($_SESSION['user'])) {
  $userId = $_SESSION['user'];
}

?>

<div>
  <div class="fh5co_heading fh5co_heading_border_bottom py-2 my-3">Road Crack</div>
</div>

<!-- category 01 load -->
<div class="owl-carousel owl-theme " id="slider2">
  <?php
  $result = $conn->query("SELECT * FROM `posts` WHERE `status` = 1 AND `category` = 'Road Crack' ORDER BY `create_at` DESC");

  while ($row = $result->fetch_assoc()) {

    $post_by = $row["post_by"];
    $user = $conn->query("SELECT `name` FROM `users` WHERE `id` = $post_by");
    $user_catch = $user->fetch_assoc();
    $user_c = $user_catch["name"];


    // get like count
    $post_id = $row["id"];
    $like = $conn->query("SELECT COUNT(`id`) as like_count FROM `likes` WHERE `post_id` = $post_id");
    $like_count = $like->fetch_assoc();
    $likeCount = $like_count['like_count'];



  ?>

<div class="item px-2  mx-2">
      <div class="item-inner">
        <img src=" <?php echo $row["img_path"]  ?>" alt="" id="btnView<?php echo $row["id"]; ?>" class="custom_img" />
        <div>

          <div class="cont-category w-10"><?php echo $row["category"]; ?></div>
          <div class="cont-tittle"> <?php echo mb_strimwidth($row["title"], 0, 26, "...");   ?></div>

          <div class="progress mt-2 mb-3" style="height: 5px; ">
            <div class="progress-bar" style="width:70%; background:#0069AC;"></div>
          </div>

          <i class="fa fa-heart mb-3" id="like_btn<?php echo $row["id"]; ?>"> <?php echo $likeCount; ?></i>

          <p style="font-weight: 600; font-size: 14px;">Sri Lanka <br><span style="font-size: 12px; font-weight: 400px;">Thihagoda</span></p>

        </div>


        <script>
          // Event handler for a click event on an element with ID "btnView" followed by the dynamic PHP value
          $("#btnView<?php echo $row["id"]; ?>").click(function() {
            // Get the modal ID from PHP value
            var modal_id = '<?php echo $row["id"] ?>';
            var user_id = '<?php echo $userId; ?>';

            // Show a loading spinner in the modal content area
            $('#modalBTNLoad').modal('show');

            $("#modalDivLoad").html(
              `<div class=" h-custom">
               <div class="spinner-border text-warning" role="status">
                 <span class="visually-hidden">Loading...</span>
               </div>
               </div>`);

            $.get("post_view.php", {
                modal_id: modal_id,
                login_user_id: user_id
              })
              .done(function(data) {
                $("#modalDivLoad").html(data);
              });
          });
        </script>

        <script>
          $(document).ready(function() {
           
            $("#like_btn<?php echo $row["id"]; ?>").click(function() {

              // Get the post ID from the data attribute
              var postId = '<?php echo $row["id"] ?>';
              var userId = '<?php echo $userId; ?>';


              // Send an AJAX request to update the likes
              $.ajax({
                type: "POST",
                url: "like_handler.php",
                data: {
                  post_id: postId,
                  user_id:userId
                },
                dataType: "json",
                success: function(data) {
                  if (data.status === "liked") {
                    
                    // Update the like count
                    $( "#like_btn<?php echo $row["id"]; ?>").html(" "+data.likeCount);
                    $("#like_btn<?php echo $row["id"]; ?>").addClass("liked");

                    
                  } else if (data.status === "unliked") {
                    // Update the like count
                    $( "#like_btn<?php echo $row["id"]; ?>").html(" "+data.likeCount);
                    $("#like_btn<?php echo $row["id"]; ?>").removeClass("liked");

                  
                  }
                },
               
              });
            });
          });
        </script>





      </div>
    </div>
  <?php
  }
  ?>
</div>
</div>

<script defer src="./assets/js/main.js"></script>