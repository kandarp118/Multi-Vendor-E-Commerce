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
                <div class="text-center text-warning">
                    <!-- <img src="./img/logo.png" alt="" class="w-50 h-auto"> -->
                    <h1 class="m-4">
                    <i class="fs-1 fas fa-store me-2"></i> 
                    <b class="fs-1 fw-bold">VECOM<i class="fs-4">.Seller</i></b>
                        </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow o-hidden p-4">
                <div class="text-center mb-3">
                    <h1 class="mb-1">Sign up</h1>
                </div>
                <form class="row g-3 needs-validation" id="SignUpSellerForm" method="POST" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First Name</label>
                        <input type="text" name="sfnm" class="form-control" id="validationCustom01" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Last Name</label>
                        <input type="text" name="slnm" class="form-control" id="validationCustom01" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Mobaile No.</label>
                        <div class="input-group">
                          <select class="form-select" name="scucode" id="validationCustom04" style="max-width: 110px;" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="+91">IN +91</option>
                          </select>
                          <!-- <input type="text" class="form-control text-center" name="" id="" style="max-width: 110px;" value="+91"> -->
                          <input type="number" name="smono" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" name="semail" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Store Name</label>
                        <input type="text" name="ssnm" class="form-control" id="validationCustom03" required>
                    </div> 
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">About store</label>
                        <input type="text" name="sabout" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Address</label>
                        <input type="text" name="sadd" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Create Password</label>
                        <input type="password" name="scpass" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Repeat Password</label>
                        <input type="password" name="srpass" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Profile Image</label>
                        <input type="file" name="file" class="form-control image_input_field" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6">
                        <div id="show_img"></div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                        <p>Already have an account? <a href="sign_in_sell.php">Sign in</a></p>
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
    // Show Product Image In Add form
    const sel_img = document.querySelector(".image_input_field");
    const show_img = document.querySelector("#show_img");
    sel_img.addEventListener("change", () => {
        console.log(sel_img.files);
        show_img.style.display = "flex"; // Arrange images in a row
        show_img.style.overflowX = "auto"; // Enable horizontal scrolling
        show_img.style.whiteSpace = "nowrap"; // Prevent images from wrapping to the next line
        show_img.style.maxWidth = "100%"; // Ensure the container width is manageable

        for (let index = 0; index < sel_img.files.length; index++) {
            let cre_img = document.createElement("img");
            cre_img.src = URL.createObjectURL(sel_img.files[index]);
            // cre_img.style.width = "150px";
            cre_img.style.height = "150px";
            cre_img.classList.add("m-2");
            show_img.appendChild(cre_img);

        }
    });

    (() => {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        event.preventDefault(); // Prevent the form from submitting the usual way
        event.stopPropagation(); 

        if (form.checkValidity()) {
            let form_data = new FormData($('#SignUpSellerForm')[0]); // Correct selector
            $.ajax({
            url: 'sign_up_sell_code.php',
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
                            window.location.href = 'sign_in_sell.php';
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