<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi-Vendor-Seller Login</title>
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
                            <b class="fs-1 mt-0 pt-0 d-none d-sm-inline d-lg-inline fw-bold">VECOM<i class="fs-4">.Seller</i></b>
                        </h1>
                    </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 card border-0 shadow o-hidden p-4">
                    
                <div class="text-center mt-1 mb-3">
                    <h1 class="mb-1">Sign in</h1>
                </div>
                <!-- <hr> -->
                <form class="row justify-content-center g-3 needs-validation" id="SignInForm" method="POST" novalidate>
                    <div class="col-12">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" name="semail" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="Password" name="spass" class="form-control" id="password" required>
                    </div>  
                    <div class="col-6">
                        <input type="checkbox" name="" onchange="showPass()" id="ShowPassword">
                        <label for="ShowPassword">Show Password</label>
                    </div>
                    <div class="col-6 text-end">
                        <a href="forget_pass_sell.php" class="float-end">Forget Password?</a>
                    </div>
                    <div class="row col-12 mt-3">
                        <button class="btn btn-warning rounded-5" type="submit">Sign in</button>
                    </div>
                    <div class="col-12 text-center mt-3"><p>Don't have an account? <a href="sign_up_sell.php">Sign up</a></p></div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
           (() => { 'use strict';

            const forms = document.querySelectorAll('.needs-validation');

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                event.preventDefault(); // Prevent the form from submitting the usual way
                event.stopPropagation(); 

                if (form.checkValidity()) {
                    let form_data = new FormData($('#SignInForm')[0]); // Correct selector
                    $.ajax({
                    url: 'sign_in_sell_code.php',
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
                                    window.location.href = 'index.php';
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
