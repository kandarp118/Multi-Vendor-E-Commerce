<?php
session_start();
if (isset($_SESSION['aunm'])) {
    include("connection.php");
    include("header.php");
    include("sidebar.php");
    include("topbar.php");
    
    $s = "SELECT * FROM admin WHERE a_username='" . $_SESSION['aunm'] . "'";
    $sr = mysqli_query($c, $s);
    $f = mysqli_fetch_array($sr);
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-10 col-md-12">

                <div class="card o-hidden border-0 shadow-lg" style="margin-top:5%;">
                    <div class="card-body p-5">
                        <div class="text-center p-3">
                            <h2 class="h4 text-gray-900 mb-4">Admin Profile</h2>
                        </div>
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-4 text-center">
                                <img src="<?= $f[4] ?>" class="img-fluid rounded-circle mb-4" style="width: 90%;">
                            </div>
                            <div class="col-lg-8">
                                <form action="" class="user">
                                    <div class="form-group">
                                        <label>Admin Username</label>
                                        <input type="text" class="form-control form-control-user" name="username" value="<?php echo $f[1]; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Admin Email</label>
                                        <input type="email" class="form-control form-control-user" name="email" value="<?php echo $f[2]; ?>" readonly>
                                    </div>
                                    <div class="form-group mb-4" onClick="al()">
                                        <label>Admin Password</label>
                                        <input type="password" class="form-control form-control-user" name="password" value="<?php echo $f[3]; ?>" readonly>
                                    </div>
                                    
                                    <a href="#" class="btn btn-warning btn-user btn-block" onClick="edit()" name="save">
                                        Edit Profile
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.container-fluid -->

    <script type="text/javascript">
        function al() {
            if (confirm("You can Forgot Password!")) {
                window.location = "forgot-password.php";
            }
        }
        function edit() {
            if (confirm("You can Edit Profile!")) {
                window.location = "edit-profile.php";
            }
        }
    </script>

<?php
    include("footer.php");
} else {
    echo "<script> window.location.href='admin-login.php'; </script>";
}
?>
