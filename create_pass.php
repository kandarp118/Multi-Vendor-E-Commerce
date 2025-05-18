<?php
session_start();
if (isset($_SESSION['pass_email']) || isset($_SESSION['pass_mobile'])) {
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi-Vendor-Seller Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
    <div class="container px-4 py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-3">
                    <!-- <img src="./img/logo.png" alt="" class="w-50 h-auto"> -->
                    <div class="text-center text-warning">
                        <h1 class="m-4">
                            <i class="fs-1 fas fa-store me-2"></i> 
                            <b class="fs-1 mt-0 pt-0 d-none d-sm-inline d-lg-inline fw-bold">multi-vendor<sub class="fs-5 fw-bolder">. Seller</sub></b>
                        </h1>
                    </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 card border-0 shadow o-hidden p-4">
                    
                <div class="text-center mt-1 mb-3">
                    <h1 class="mb-1 fs-3">Create Password</h1>
                </div>
                <!-- <hr> -->
                <form class="row justify-content-center g-1 needs-validation" id="createPassForm" method="POST" novalidate>
                    <input type="hidden" name="email" value="">
                    <div class="col-12">
                        <label for="newPass" class="form-label">New Password</label>
                        <input type="password" name="new_pass" class="form-control" id="newPass" required>
                        <!-- <div id="NPInvalid" class="invalid-feedback">
                            Please provide a valid city.
                        </div> -->
                    </div>
                    <div class="col-12 mb-0 m-4">
                        <!-- <center>OR</center>/ -->
                    </div>
                    <div class="col-12">
                        <label for="confPass" class="form-label">Confirm Password</label>
                        <input type="password" name="conf_pass" class="form-control" id="confPass" required> 
                        <div id="CPInvalid" class="invalid-feedback" style="display: none;">
                            Not Matching
                        </div>
                    </div>  
                    <!-- <div class="col-12">
                        <input type="checkbox" name="" onchange="showPass()" id="ShowPassword">
                        <label for="ShowPassword">Show Password</label>
                    </div> -->
                    <!-- <div class="col-6 text-end">
                        <a href="forgetpassword_sell.php" class="float-end">Forget Password?</a>
                    </div> -->
                    <div class="row col-6 mt-4 me-3">
                        <!-- <button class="btn btn-danger rounded-5" type="button" name="submit">Back</button> -->
                        <a href="forget_pass_sell.php" class="btn btn-danger rounded-5">Back</a>
                    </div>
                    <div class="row col-6 mt-4">
                        <button class="btn btn-warning rounded-5" id="submitBtn" type="submit" name="submit">Submit</button>
                    </div>
                    <!-- <div class="col-12 text-center mt-3"><p>Don't have an account? <a href="sign_up_sell.php">Sign up</a></p></div> -->
                </form>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
      // Check if passwords match
      $('#newPass, #confPass').on('keyup', function () {
        if ($('#newPass').val() != '' && $('#confPass').val() != '' && $('#newPass').val() == $('#confPass').val()) 
        {
            $("#submitBtn").attr("disabled",false);
            //   $('#cPwdValid').show();
            $('#CPInvalid').hide();
            //   $('#cPwdValid').html('Valid').css('color', 'green');
                // $('#confPass').addClass('is-valid');
            if ($('#newPass').val() == $('#confPass').val()) {
                $('#confPass').addClass('is-valid');
                $('#confPass').addClass('is-valid');

            }
            else {
                $('#confPass').addClass('is-invalid');
                $('#confPass').removeClass('is-valid');
            }
        } 
        else 
        {
            if ($('#confPass').val() == '')
            {   
                $('#confPass').removeClass('is-valid');
                $('#confPass').removeClass('is-invalid');
                // $('#CPInvalid').html().css('display','none');
            }
            else if ($('#newPass').val() == '') {

            }
            else {
                
                $("#submitBtn").attr("disabled",true);
                //   $('#cPwdValid').hide();
                $('#CPInvalid').show();
                //   $('#CPInvalid').html('Not Matching').css('color', 'red');
                //   $('#confPass').addClass('is-invalid');
                //   $('#confPass').html().css('display','inline');   
            }
        }
      });
      let form = document.getElementById('createPassForm');
        // Validate on submit:
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            event.stopPropagation();
          if (form.checkValidity())
          {
            // alert("demo");
            // let form_data = new FormData($('#createPassForm')[0]);
            let new_pass = $("#newPass").val();
            let conf_pass = $("#confPass").val();
            $.ajax({
                url: 'create_pass_code.php',
                type: 'POST',
                // cache: false,
                // contentType: false,
                // processData: false,
                // data: form_data,
                data: {
                    new_pass:new_pass,
                    conf_pass:conf_pass
                },
                success: function(ans) {
                    if (ans === "success") {
                        Swal.fire({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success",
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'sign_in.php';
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: '<a href="#">'+ans+'</a>'
                        });
                    }
                }
            });
          }
        //   if (form.checkValidity() === false) {
        //     event.preventDefault();
        //     event.stopPropagation();
        //   }
          form.classList.add('was-validated');
        }, false);
        // Validate on input:
        form.querySelectorAll('.form-control').forEach(input => {
          input.addEventListener(('input'), () => {
            if (input.checkValidity()) {
              input.classList.remove('is-invalid');
              input.classList.add('is-valid');
            } else {
              input.classList.remove('is-valid');
              input.classList.add('is-invalid');
            }
            var is_valid = $('.form-control').length === $('.form-control.is-valid').length;
            $("#submitBtn").attr("disabled", !is_valid);
          });
        });
      });
</script>

    <!-- <script>
        // function showPass() {
        //     var x = document.getElementById("password");
        //     if (x.type === "password") {
        //         x.type = "text";
        //     } else {
        //         x.type = "password";
        //     }
        // }


            $(document).ready(function(){
                $('#newPass, #confPass').on('keyup', function () {
                    if ($('#newPass').val() != '' && $('#confPass').val() != '' && $('#newPass').val() == $('#confPass').val()) {
                    $("#submitBtn").attr("disabled",false);
                    // $('#cPwdValid').show();
                    $('#CPInvalid').hide();
                    // $('#cPwdValid').html('Valid').css('color', 'green');
                    $('#confPass').removeClass('is-invalid')
                    } else {
                    $("#submitBtn").attr("disabled",true);
                    // $('#cPwdValid').hide();
                    $('#CPInvalid').show();
                    $('#CPInvalid').html('Not Matching').css('color', 'red');
                    $('#confPass').addClass('is-invalid')
                    }
                });
            });

           (() => { 'use strict';      

                const forms = document.querySelectorAll('.needs-validation');
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        event.preventDefault();
                        event.stopPropagation(); 

                        if (form.checkValidity()) {
                            let form_data = new FormData($('#createPassForm')[0]);
                            $.ajax({
                                url: 'create_pass_sell_code.php',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'POST',
                                success: function(ans) {
                                    if (ans === "success") {
                                        Swal.fire({
                                            title: "Good job!",
                                            text: "You clicked the button!",
                                            icon: "success",
                                            allowOutsideClick: false,
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // window.location.href = 'resetpassword_sell.php';
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Something went wrong!",
                                            footer: '<a href="#">'+ans+'</a>'
                                        });
                                    }
                                }
                            });
                        } 
                        else 
                        {
                            form.classList.add('was-validated');
                        }
                    }, false);
                });
            })();
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
} else {
?>
    <script>window.location.href='forget_pass.php';</script>
<?php
}
    
?>
