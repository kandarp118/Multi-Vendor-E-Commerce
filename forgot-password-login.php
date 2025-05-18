<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Akommerce Admin - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-10 col-md-10">

                <div class="card o-hidden border-0 shadow-lg" style="margin-top:10%;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-password-image justify-content-center">
                                <div class="p-4 row justify-content-center align-items-center">
                                    <img class="col-lg-10 my-3" src="img/admin.jpeg" style="width:350px; height: auto;
                                    border-radius: 50%; margin-left:17%">
                                    <h2 style="margin-left: 20%;"><?php echo "$f[1]"?></h2>
                                </div>    
                            </div> -->
                            <div class="col-lg-10 ">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 text-gray-900 mb-2">Forgot Admin Password</h1>
                                        <!-- <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p> -->
                                    </div>
                                    <hr>
                                    <form action="<?php $_PHP_SELF ?>" class="user">
                                        <div class="form-group">
                                            <label>Enter Admin Username</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Admin Username" name="aunm"  required>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label>Enter New Password</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="New Password" name="np"  required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Confirm Password" name="cp" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <hr>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="save" value="Save Password">
                                        <!-- <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!-- <hr> -->
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                    <!-- <div class="text-center">
                                        <a class="small" href="login.html">Already have an account? Login!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
    include("connection.php");
    if (isset($_GET['save'])) 
    {
        $aunm=$_GET['aunm'];
        if ($aunm) {
                $np=$_GET['np'];
                $cp=$_GET['cp'];
            if ($np==$cp) {
                $uq="UPDATE admin SET a_password='$np' WHERE a_username='$aunm'";
                $uqr=mysqli_query($c,$uq);
                if ($uqr) {
                    echo "<script> window.location.href='admin-login.php' </script>";
                } else {
                    echo "<script>alert('error in query')</script>";     
                }
            } else {
                echo "<script>alert('both password are not same')</script>";     
            }
            
        } else {
            echo "<script>alert('Invalid Admin Username !')</script>";
        }         
    }
?>