<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VECOM - admin - Login</title>

    <link rel="icon" href="./img/admin-icon.png" type="image/icon type">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-1">
                        <!-- Nested Row within Card Body -->
                        
                        <div class="row justify-content-center p-5">
                            <div class="col-lg-12 text-center mb-3">
                                <span class="h1 text-warning"><i class="fas fa-luggage-cart"></i><b class="font-weight-bold mr-3 ml-3" style="font-family: Arial, Helvetica, sans-serif; font-size:45px;"> VECOM </b><i class="fas fa-store me-2"></i></span>
                            </div>
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="text-center">
                                        <h1 class="mb-4 text-dark">admin</h1>
                                    </div>
                                    <form action="admin-login-code.php" id="adminLoginForm" class="user needs-validation" method="POST" novalidate>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" autocomplete="off" required>
                                        </div>
                                        <input type="submit" class="btn bg-gray-900 text-warning btn-user btn-block p-2" name="login" value="Login" style="font-size: 1.5rem;">
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        event.preventDefault(); // Prevent the form from submitting the usual way
        event.stopPropagation(); 

        if (form.checkValidity()) {
            let form_data = new FormData($('#adminLoginForm')[0]); // Correct selector
            $.ajax({
            url: 'admin-login-code.php',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function(ans) {
                if (ans === "success") {
                alert(ans);
                window.location.href = 'index.php';
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>