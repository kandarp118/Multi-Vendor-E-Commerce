<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi-Vendor Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }

        .no-arrow {
            -webkit-appearance: none; /* Safari and Chrome */
            -moz-appearance: none; /* Firefox */
            appearance: none; /* Modern Browsers */
            background: transparent; /* Ensure background is transparent */
            border: none; /* Remove border to hide the arrow */
            padding-right: 0; /* Remove extra padding */
        }

        /* Additional fix for WebKit browsers to hide the arrow */
        .no-arrow::-ms-expand {
            display: none; /* Internet Explorer */
        }

        .no-arrow::-webkit-inner-spin-button,
        .no-arrow::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .no-arrow option {
            background-color: white;
            color: black;
        }

    </style>
</head>
<body class="bg-light">
    <div class="container px-4 py-4">
    <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-3">
                    <!-- <img src="./img/logo.png" alt="" class="w-50 h-auto"> -->
                    <div class="text-center text-warning">
                        <h1 class="m-4">
                            <i class="fs-1 fas fa-luggage-cart"></i>
                            <b class="fs-1 mt-0 pt-0 fw-bold">VECOM</b>
                        </h1>
                    </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow o-hidden p-4">
                <div class="text-center mb-3">
                    <h1 class="mb-1">Sign up</h1>
                </div>
                <!-- <hr> -->
                <form class="row g-3 needs-validation" id="SignUpForm" method="POST" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" name="ufnm" class="form-control" id="validationCustom01" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" name="ulnm" class="form-control" id="validationCustom02" required>
                    </div>
                    <!-- <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Mobaile No.</label>
                        <div class="input-group">
                          <select class="form-select" name="cucode" id="validationCustom04" style="max-width: 110px;" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="+91">IN +91</option>
                          </select>
                          <!-- <input type="text" class="form-control text-center" name="" id="" style="max-width: 110px;" value="+91"> -->
                          <input type="number" name="umno" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" name="uemail" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Create Password</label>
                        <input type="Password" name="cpass" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Repeat Password</label>
                        <input type="password" name="rpass" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                        <p>Already have an account? <a href="sign_in.php">Sign in</a></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-warning rounded-5 float-end" id="signUpBtn" type="submit">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    (() => {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        event.preventDefault(); // Prevent the form from submitting the usual way
        event.stopPropagation(); 

        if (form.checkValidity()) {
            let form_data = new FormData($('#SignUpForm')[0]); // Correct selector
            $.ajax({
            url: 'sign_up_code.php',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function(ans) {
                if (ans === "success") {
                alert("Account Created !!!");
                window.location.href = 'sign_in.php';
                } else {
                alert(ans);
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
</body>
</html>