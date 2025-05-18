<?php
    session_start();
    if (isset($_SESSION['aunm'])) {
        include("connection.php");
        $s="SELECT * FROM admin WHERE a_username='".$_SESSION['aunm']."'";
        $sr=mysqli_query($c,$s);
        $f=mysqli_fetch_array($sr);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Akommerce Admin - Profile</title>

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

                <div class="card o-hidden border-0 shadow-lg" style="margin-top:7%;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image justify-content-center">
                                <div class="p-4 row justify-content-center align-items-center">
                                    <img class="col-lg-11" src="img/admin.jpeg" style="margin-top: 17%; margin-left: 16%; width:350px; height: auto;
                                    border-radius: 50%;">
                                </div>    
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5 mt-1">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2 mt-0" onClick="edit()">Admin Profile</h1>
                                        <!-- <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p> -->
                                    </div>
                                    <hr>
                                    <form action="<?php $_PHP_SELF ?>" class="user">
                                        <div class="form-group">
                                            <label>Admin Username</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="New Password" name="np" value="<?php echo "$f[1]";?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Admin Email</label>
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Confirm Password" name="cp" value="<?php echo "$f[2]";?>" readonly>
                                        </div>
                                        <div class="form-group" onClick="al()">
                                            <label>Admin Password</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="New Password" name="np" value="<?php echo "$f[3]";?>" readonly>
                                        </div>
                                        <hr>
                                        <a href="#" class="btn btn-primary btn-user btn-block" onClick="edit()" name="save">
                                            Edit Profile
                                        </a>
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

    <script type="text/javascript">
        function al()
        {
            if(confirm("you can Forgot Password !"))
            {
                window.location="forgot-password.php";
            }
            else
            {

            }
        }
        function edit()
        {
            if(confirm("you can Edit Profile !"))
            {
                window.location="edit-profile.php";
            }
            else
            {

            }
        }
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

<?php
    } else {
        echo "
        <script type='text/javascript'>
            window.location='admin-login.php';
        </script>"; 
   }
?>