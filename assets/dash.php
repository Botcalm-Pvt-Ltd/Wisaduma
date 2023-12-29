<?php
include('./include/db.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

  <link rel="icon" href="./assets/Images/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="./assets/dashboard.css">
  <link href="./assets/owl.carousel.css" rel="stylesheet" type="text/css" />
  <link href="./assets/owl.theme.default.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/header.css">

</head>


<body>

  <nav>
    <img src="./assets/Images/Top-logo1.png" alt="Your Logo" class="logo">
    <input type="text" placeholder="Search" class="search-bar">

    <div class="profile-dropdown">
      <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm">
      <div class="profile-dropdown-content">
        <a href="#" class="profile-dropdown-item">My Profile</a>
        <a href="#" class="profile-dropdown-item">Settings</a>
        <a href="#" class="profile-dropdown-item" data-toggle="modal" data-target="#secondModal">Add Post</a>
        <a href="#" class="profile-dropdown-item">Logout</a>
      </div>
    </div>
  </nav>

  <div>
    <div>

      <div class=" container animate-box" id="list01">

      </div>


      <div>
        <div class=" container animate-box">
          <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 my-3">Tree fallen</div>
          </div>
          <div class="owl-carousel owl-theme" id="slider3">
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/l1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Tree fallen</div>
                  <div class="cont-tittle"> Due to the tree is very uncomfortable</div>
                  <div class="cont-person">Siril Perera</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 22</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/l1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Tree fallen</div>
                  <div class="cont-tittle"> Due to the tree is very uncomfortable.</div>
                  <div class="cont-person">Siril Perera</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 21</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/l1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Tree fallen</div>
                  <div class="cont-tittle">Due to the tree is very uncomfortable</div>
                  <div class="cont-person">Siril Perera</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 22</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/l1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Tree fallen</div>
                  <div class="cont-tittle"> Due to the tree is very uncomfortable</div>
                  <div class="cont-person">Siril Perera</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 21</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class=" container animate-box">
          <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 my-3">Unsafe Electrical</div>
          </div>
          <div class="owl-carousel owl-theme" id="slider4">
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/t1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Unsafe Electrical</div>
                  <div class="cont-tittle"> People are inconvenienced due unsafe electrical</div>
                  <div class="cont-person">Prashan Kumara</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 5</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/t1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Unsafe Electrical</div>
                  <div class="cont-tittle"> People are inconvenienced due unsafe electrical</div>
                  <div class="cont-person">Prashan Kumara</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 8</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/t1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Unsafe Electrical</div>
                  <div class="cont-tittle"> People are inconvenienced due unsafe electrical</div>
                  <div class="cont-person">Prashan Kumara</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 99</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/t1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Unsafe Electrical</div>
                  <div class="cont-tittle"> Road Damage is a Nuisance for Drivers.</div>
                  <div class="cont-person">Prashan Kumara</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 34</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">The Road Crack : Road Damage is a Nuisance for Drivers.</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
            <span aria-hidden="true">&times;</span>
          </div>
          <div class="px-3">10 Dec 2024, 8:00pm</div>

          <div class="px-3">by Nimal Costha</div>
          <i onclick="myFunction(this)" class="fa fa-thumbs-up px-3"></i>


          <div class="modal-body-design ">
            <div class="modal-body-design-column">
              <img class="responsive-image desktop-image" src="./assets/Images/large-modal.png" alt="" />
              <img class="responsive-image mobile-image" src="./assets/Images/1.png" alt="" />
            </div>
            <div class="modal-body-design-column">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta facilis enim veniam voluptatem quod debitis corporis! Enim maxime quos nihil et perferendis totam harum placeat magnam repellendus veniam totam harum placeat magnam repellendus veniam totam harum placeat. Voluptatibus autem voluptatum eligendi, magnam repellendus veniam totam harum placeat
            </div>

          </div>
          <div class="modal-footer">

            <div class="row ">
              <div class="col-md-10">
                <div class="post-content w-100">
                  <div class="post-container">
                    <div class="comment-sec">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="profile-photo-sm mb-3 mr-2">
                      <p><strong>Lola kekoe:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="comment-sec">
                      <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm mb-3 mr-2">
                      <p><strong>John Doe:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="comment-sec">
              <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm mb-2">
              <input type="text" id="commentInput" placeholder="Add a comment...">
              <button type="button" class="btn btn-secondary  mb-2" data-dismiss="modal">Comment</button>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Second Modal -->
    <div class="modal fade" id="secondModal">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create a Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputName">Tittle</label>
              <input type="text" class="form-control" id="inputName" placeholder="Enter your tittle">
            </div>
            <div class="form-group">
              <label for="selectCategory">Category</label>
              <select class="form-control" id="selectCategory">
                <option value="Poor Drainage">Poor Drainage</option>
                <option value="Unsafe Electrical Inside">Unsafe Electrical Inside</option>
                <option value="Damaged bridge">Damaged bridge</option>
                <option value="Unsafe Electrical Inside">Road Crack</option>
                <!-- Add more options as needed -->
              </select>
            </div>



            <div class="form-group">
              <label for="inputImage">Upload Image:</label>
              <input type="file" class="form-control-file" id="inputImage">
            </div>
            <div class="form-group">
              <label for="inputMessage">Message:</label>
              <textarea class="form-control" id="inputMessage" rows="4" placeholder="Enter your message"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  



  <!-- jquery -->
  <script  src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script defer src="./assets/js/main.js"></script>
  <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script defer src="./assets/js/owl.carousel.min.js"></script>
  <script defer src="./assets/js/jquery.waypoints.min.js"></script>



  <script>
    // Load Project List after the document is fully loaded
    
      $("#list01").load("slider1.php", {
        limit: 25
      });

  </script>










</body>

</html>







<div>
        <div class=" container animate-box">
          <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 my-3">Tree fallen</div>
          </div>
          <div class="owl-carousel owl-theme" id="slider3">
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/l1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Tree fallen</div>
                  <div class="cont-tittle"> Due to the tree is very uncomfortable</div>
                  <div class="cont-person">Siril Perera</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 22</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/l1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Tree fallen</div>
                  <div class="cont-tittle"> Due to the tree is very uncomfortable.</div>
                  <div class="cont-person">Siril Perera</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 21</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/l1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Tree fallen</div>
                  <div class="cont-tittle">Due to the tree is very uncomfortable</div>
                  <div class="cont-person">Siril Perera</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 22</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/l1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Tree fallen</div>
                  <div class="cont-tittle"> Due to the tree is very uncomfortable</div>
                  <div class="cont-person">Siril Perera</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 21</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class=" container animate-box">
          <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 my-3">Unsafe Electrical</div>
          </div>
          <div class="owl-carousel owl-theme" id="slider4">
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/t1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Unsafe Electrical</div>
                  <div class="cont-tittle"> People are inconvenienced due unsafe electrical</div>
                  <div class="cont-person">Prashan Kumara</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 5</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/t1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Unsafe Electrical</div>
                  <div class="cont-tittle"> People are inconvenienced due unsafe electrical</div>
                  <div class="cont-person">Prashan Kumara</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 8</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/t1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Unsafe Electrical</div>
                  <div class="cont-tittle"> People are inconvenienced due unsafe electrical</div>
                  <div class="cont-person">Prashan Kumara</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 99</i>
                </div>
              </div>
            </div>
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="./assets/Images/t1.png" alt="" /></div>
                <div>

                  <div class="cont-category w-45">Unsafe Electrical</div>
                  <div class="cont-tittle"> Road Damage is a Nuisance for Drivers.</div>
                  <div class="cont-person">Prashan Kumara</div>
                  <div class="cont-location">Colombo</div>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 34</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>