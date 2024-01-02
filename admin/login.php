<?php
include('./layouts/db.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WISADUMA ADMIN | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">

   
</head>

<body class="hold-transition login-page" style="background-color: #a6cadf;">
    <div class="login-box">
        <div class="login-logo ">
            <img src="../assets/images/Top-logo.png" alt="" class="img-fluid">
        </div>
        <!-- /.login-logo -->
        <div class="card " style="border-radius: 16px;">
            <div class="card-body login-card-body "style="border-radius: 16px;">
                <p class="login-box-msg mb-2">Sign in to start your session</p>

                <form id="formUserLogin">
                    <div class=" mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class=" mb-3">
                        <input type="password" name="password" class="form-control" placeholder=" Enter Password">
                    </div>

                    <div id="error" style="display: none;">
                        <div class="alert alert-danger">
                            <h6 class="alert-heading fw-bold mb-1" id="error-msg">Error displaying Here</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1 mt-3">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- AdminLTE App -->
    

    <script>
        $(document).ready(function(e) {
            $("#formUserLogin").validate({
                rules: {
                    email: {
                        required: true,
                        email: true // Add the email validation rule
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    email: {
                        required: "Please enter a valid email",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter a password",
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
                    var $form = $('#formUserLogin');
                    $.ajax({
                        type: 'POST',
                        url: "login-auth.php",
                        dataType: 'json',
                        data: $form.serialize(),
                        success: function(data) {
                            if (data.status == 1) {
                                console.log("success");
                                window.location.replace("./index.php");
                            } else {
                                $("#error").show();
                                $("#error-msg").text(data.msg);
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