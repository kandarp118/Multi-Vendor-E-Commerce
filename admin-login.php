<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Akommerce Admin - Login</title>

    <?php session_start(); ?>

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

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 10%;">
                    <div class="card-body p-0 my-2">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <div class="p-5">
                                    <img src="img/login.png" style="width:420px; height: auto;" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 text-gray-900 mb-0">Akommerce</h1>
                                        <h3 class="h5 text-gray-900 mb-4">Admin Login</h3>
                                    </div>
                                    <hr>
                                    <form action="<?php $_PHP_SELF ?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email"  required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="Login">
                                        <!-- <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!--  <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password-login.php">Forgot Password?</a>
                                    </div> --> 
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
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

    if (isset($_GET['login'])) 
    {
        // echo "login press";
        $aun = $_GET['email'];
        $ap = $_GET['password'];
        if ($aun && $ap) {
            $sq="SELECT * FROM admin WHERE a_username='$aun' AND a_password='$ap'";
            $sqr=mysqli_query($c,$sq);
            if ($sqr) {
                if ($fq=mysqli_fetch_array($sqr)) {
                    
                    $_SESSION['aunm']=$fq[1];
                    if (isset($_SESSION['aunm'])) {
                        echo "<script>window.location='index.php'</script>";
                    } else {
                        echo "<script>alert('error in session query')</script>";
                    }
                    
                } else {
                    echo "<script>alert('Invalid Username and Password')</script>";
                }
                
            } else {
                echo "<script>alert('error in select query')</script>";
            }
            
        } 
        
    } 
    
?>