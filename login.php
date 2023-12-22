<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="./assets/Images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="./assets/style.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">

  <title>Log-In</title>
</head>

<body>
  <div class="container-login">
    <div class="column">
      <div class="top-logo-login">
        <img src="./assets/Images/Top-logo.png" alt="top-logo-login" class="">
      </div>
      <div class="login-tittle px-3">Welcome back!</div>
      <div class="login-input-tittle  px-3">Enter your Credentials to access your account</div>
      
      <div class="mt-3">
     
      <form id="formLogin">
        <div class="form-group">
          <strong> <label  class="p-3 px-0">Email address</label></strong>
          <input type="email" class="form-control shadow-none" name="email" placeholder="Enter email">
        </div>

        <div class="form-group">
          <strong><label  class="p-3 px-0">Password</label></strong>
          <input type="password" class="form-control shadow-none" name="password" placeholder="Enter Password">
        </div>

        <div class="form-group form-check p-3 px-0 mx-4 ">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label " for="exampleCheck1">Remember for 30 days</label>
        </div>

        <button type="submit" class="btn btn-primary w-100"> <a href="Dashboard.html" class="redirect-to-link-dash">LogIn</a></button>
        
      </form>

      </div>

      <div class="redirect-to-signup p-5">Don’t have an account? <a href="register.php" class="redirect-to-link">Sign Up</a></div>

    </div>

    <div class="column">
      <div class="logo-login">
        <img src="./assets/Images/logo.png" alt="logo-login" class="">
      </div>
      <div class="tab-logo">
        <img src="./assets/Images/tab-logo.png" alt="logo-login" class="">
      </div>
      <div class="moba-logo">
        <img src="./assets/Images/logo-moba.png" alt="logo-login" class="">
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
      $("#formLogin").validate({
        rules: {
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
          var $form = $('#formLogin');
          $.ajax({
            type: 'POST',
            url: "login_submit.php",
            dataType: 'json',
            data: $form.serialize(),
            success: function(data) {
              if (data.status == 1) {
                toastr.success('Login successfully!');

                setTimeout(function() {
                  window.location.replace("./login.php");
                }, 3000);

              } else if (data.status == 2) {

                toastr.error('Email password combination is wrong!');
                // Clear input fields
                $form.find('input').val('');

              }  else if (data.status == 0){
                toastr.error('User not found!');
                // Clear input fields
                $form.find('input').val('');
              } 
              
              else {
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