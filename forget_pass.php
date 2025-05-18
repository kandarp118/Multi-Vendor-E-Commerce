<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VECOM</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container px-4 py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-3">
                    <!-- <img src="./img/logo.png" alt="" class="w-50 h-auto"> -->
                    <div class="text-center text-warning">
                        <h1 class="m-4">
                            <i class="fs-1 fas fa-store me-2"></i> 
                            <b class="fs-1 mt-0 pt-0 d-none d-sm-inline d-lg-inline fw-bold">VECOM</b>
                        </h1>
                    </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 card border-0 shadow o-hidden p-4">
                    
                <div class="text-center mt-1 mb-3">
                    <h1 class="mb-1 fs-3">Forget Password</h1>
                </div>
                <!-- <hr> -->
                <form class="row justify-content-center g-1 needs-validation" id="forgetPassForm" method="POST" novalidate>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="col-12 mb-0 mt-3">
                        <center>OR</center>
                    </div>
                    <div class="col-12">
                        <label for="mobile" class="form-label">Mobile No.</label>
                        <input type="number" name="mobile" class="form-control" id="mobile">
                    </div>  
                    <!-- <div class="col-12">
                        <input type="checkbox" name="" onchange="showPass()" id="ShowPassword">
                        <label for="ShowPassword">Show Password</label>
                    </div> -->
                    <!-- <div class="col-6 text-end">
                        <a href="forgetpassword_sell.php" class="float-end">Forget Password?</a>
                    </div> -->
                    <div class="col-12">
                        <div id="invalid" class="text-danger" style="display: none;">
                            required any one filed !
                        </div>
                    </div>
                    <div class="row col-6 mt-4 me-3">
                        <!-- <button class="btn btn-danger rounded-5" type="button" name="submit">Back</button> -->
                        <a href="sign_in.php" class="btn btn-danger rounded-5">Back</a>
                    </div>
                    <div class="row col-6 mt-4">
                        <button class="btn btn-warning rounded-5" type="submit" name="submit">Continue</button>
                    </div>
                    <!-- <div class="col-12 text-center mt-3"><p>Don't have an account? <a href="sign_up_sell.php">Sign up</a></p></div> -->
                </form>
            </div>
        </div>
    </div>
    <script>
        // function showPass() {
        //     var x = document.getElementById("password");
        //     if (x.type === "password") {
        //         x.type = "text";
        //     } else {
        //         x.type = "password";
        //     }
        // }
           (() => { 'use strict';

            const forms = document.querySelectorAll('.needs-validation');

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                event.preventDefault(); // Prevent the form from submitting the usual way
                event.stopPropagation(); 

                if (form.checkValidity()) {
                    let form_data = new FormData($('#forgetPassForm')[0]); // Correct selector
                    if ($('#email').val() != '' || $('#mobile').val() != '')
                    {
                        $("#invalid").hide();
                        $.ajax({
                            url: 'forget_pass_code.php',
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
                                            window.location.href = 'create_pass.php';
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
                        $("#invalid").show();
                    }
                    
                } else {
                    form.classList.add('was-validated');
                }
                }, false);
            });
            })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
