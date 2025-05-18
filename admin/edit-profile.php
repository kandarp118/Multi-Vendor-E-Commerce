<?php
    session_start();
    if (isset($_SESSION['aunm'])) {
        include("connection.php");
        include("header.php");
        include("sidebar.php");
        include("topbar.php");
?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-4">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image my-5">
                        <div class="p-4 row justify-content-center align-items-center" id="cs1">
                                    <img class="col-lg-12" onClick="demo()" src="<?php echo $af[4]?>" style="width:380px; height: auto; border-radius: 50%; margin-left: 18%;">
                        </div>
                    </div>
                    <div class="col-lg-7 my-2" id="cs2">
                        <div class="p-4">
                            <div class="text-center">
                                <h1 class="h1 text-gray-900 mb-4">Edit Admin Profile</h1>
                            </div>
                            <hr>
                            <form class="user" action="edit-profile-code.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group" style="display:none;">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="aid"
                                        placeholder="Admin Id" value="<?php echo $af[0]; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="aunm"
                                        placeholder="Admin Username" value="<?php echo $af[1]; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="aem"
                                        placeholder="Admin Email" value="<?php echo $af[2]; ?>" required> 
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" onClick="show()" id="exampleInputEmail" name="aop" placeholder="" value="<?php echo $af[3]; ?>" readonly>
                                </div>
                                <div class="form-group row" style="display: none;" id="nrp">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="New Password" name="anp">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="arp">
                                    </div>
                                </div>
                                <hr style="display:none;" id="ad">
                                <div class="row justify-content-center align-items-center" style="display: none;" id="aimg">
                                    <div class= "col-lg-11 mx-3">
                                        <label for="formFile" class="form-label">Admin Image</label>
                                        <input class="form-control" style="border-radius:50px;" type="file" name="files[]" id="formFile">
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" class="btn btn-warning btn-user btn-block" name="save"> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function show()
        {
            $('#nrp').toggle();
        }
        function demo()
        {
                $("#cs1").toggleClass("my-4");
                $("#cs2").toggleClass("my-4");
                $('#aimg').toggle();
                $('#ad').toggle();
        }
    </script>
<?php
    include("footer.php");
    } 
    else {
        echo "
        <script type='text/javascript'>
            window.location='admin-login.php';
        </script>"; 
   }
?>