<?php
session_start();
if (isset($_SESSION['aunm'])) {
        include("connection.php");
        include("header.php");
        include("sidebar.php");
        include("topbar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Akommerce Admin - Forget Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center m-5">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-5">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center p-3">
                            
                            
                                <div class="">
                                    <div class="text-center m-0">
                                        <h1 class="h2 m-0">Forget Admin Password</h1>
                                    </div>
                                    <hr>
                                    <form action="forgot-password-code.php" method="POST" class="user mb-0">
                                        <div class="form-group">
                                        <label>Admin Username</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="New Password" name="np" value="<?php echo $_SESSION['aunm']?>" readonly>
                                        </div>
                                        <div class="form-group">
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
                                        <input type="submit" class="btn btn-warning btn-user btn-block mb-0" name="save" value="Save Password">
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

<?php
    include("footer.php");
    } 
    else 
    {
        echo "<script> window.location.href='admin-login.php' </script>";    
    }

?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               