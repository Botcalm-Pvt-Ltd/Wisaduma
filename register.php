<?php
include('./include/db.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="icon" href="./assets/images/fav.png" type="image/x-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,500&display=swap" rel="stylesheet">

  <!-- Toastr -->
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">

  <title>Register-Wisaduma</title>
</head>

<body>
  <div class="container-login">
    <div class="column">
      <div class="top-logo-login">
        <img src="./assets/images/Top-logo.png" alt="top-logo-login" class="">
      </div>
    
      <div class="login-tittle" style="margin-bottom: 24px;">Get Started Now</div>
      <div>

        <form id="formUserRegister">
          <div class="form-group">
            <strong> <label class="pt-3 pb-1">Name</label></strong>
            <input type="text" class="form-control custom-form shadow-none" name="name" placeholder="Enter Name">

          </div>
          <div class="form-group ">
            <strong> <label class="pt-3 pb-1">Email address</label></strong>
            <input type="email" class="form-control custom-form shadow-none" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <strong> <label class="pt-3 pb-1">Password</label></strong>
            <input type="password" class="form-control custom-form shadow-none" name="password" placeholder="Enter Password">
          </div>

          <button type="submit" class="btn btn-primary w-100 py-2 log-reg-btn mt-5">Sign Up</button>

        </form>

        <div class="redirect-to-signup p-5">Have an account? <a href="index.php" class="redirect-to-link">Sign In</a></div>


      </div>
    </div>
    
    <div class="column  w-100">
      <div class="logo-login  ">
        <img src="./assets/images/logo.png" alt="logo-login" class="w-75">
      </div>
      <div class="tab-logo ">
        <img src="./assets/images/tab-logo.png" alt="logo-login" class="">
      </div>
      <div class="moba-logo ">
        <img src="./assets/images/logo-moba.png" alt="logo-login" class="">
      </div>
    </div>
  </div>


  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- jQuery Validation Plugin -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

  <!-- Toastr -->
  <script src="./plugins/toastr/toastr.min.js"></script>


  <script>
    $(document).ready(function(e) {
      $("#formUserRegister").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 5
          }
        },
        messages: {
          name: {
            required: "Your name is required",
          },
          email: {
            required: "Email is required",
            email: "Please enter a valid email address"
          },
          password: {
            required: "Password is required",
            minlength: "Your password must be at least 5 characters long"
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
          var $form = $('#formUserRegister');
          $.ajax({
            type: 'POST',
            url: "register_submit.php",
            dataType: 'json',
            data: $form.serialize(),
            success: function(data) {
              if (data.status == 1) {
                toastr.success('You have been registered successfully!');

                setTimeout(function() {
                  window.location.replace("./index.php");
                }, 3000);

              } else if (data.status == 2) {

                toastr.error('You have already registered!');
                // Clear input fields
                $form.find('input').val('');

              } else {
                toastr.error('Something went wrong! Plz tray again');
                // Clear input fields
                $form.find('input').val('');
              }
            }
          });

          event.preventDefault();
        }
      });

    });
  </script>
</body>

</html>