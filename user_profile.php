<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
    $sel_user="SELECT * FROM customer WHERE c_id='".$_SESSION['user']['c_id']."'";
    $sel_user_ans=mysqli_query($c,$sel_user);
    $fu=mysqli_fetch_array($sel_user_ans);
?>
<div class="container-fuild py-5">
    <div class="container">
        <div class="row">
            <h1 class="fs-1 fw-bold">Your Profile</h1>
            <hr>
        </div>
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow o-hidden p-5">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" name="ufnm" class="form-control" id="validationCustom01" value="<?= $fu['c_first_name'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" name="ulnm" class="form-control" id="validationCustom02" value="<?= $fu['c_last_name'] ?>" readonly>
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
                          <input type="text" name="umno" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?= $fu['c_mobile_no'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" name="uemail" class="form-control" id="validationCustom03" value="<?= $fu['c_email'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                        <label for="validationCustom03" class="form-label">Password</label>
                        <a href="forget_pass.php">Forget Password ?</a>
                        </div>
                        <input type="Password" name="cpass" class="form-control" id="validationCustom03" value="<?= $fu['c_password'] ?>" readonly>
                        
                    </div>
                    <div class="col-md-6 mt-5">
                        <!-- <a href="edit_profile.php" class="btn btn-outline-warning rounded-5 float-end fw-bold">Edit Profile</a> -->
                        <form action="edit_product.php" method="POST">
                            <input type="hidden" name="c_id" value="<?= $_SESSION['user']['c_id'] ?>">
                            <input type="button" value="Edit Profile" class="btn btn-lg  btn-outline-warning rounded-5 float-end fw-bold" data-bs-toggle="modal" data-bs-target="#editProduct">
                        </form>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>


<!-- Edit Product Modal -->
<div class="modal fade" id="editProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-3 " id="staticBackdropLabel">Edit Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 justify-content-center" id="edit_pro_form" method="POST" novalidate>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input type="text" name="ufnm" class="form-control" id="validationCustom01" value="<?= $fu['c_first_name'] ?>" required>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input type="text" name="ulnm" class="form-control" id="validationCustom02" value="<?= $fu['c_last_name'] ?>" required>
                </div>
                <!-- <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Username</label>
                    <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <label for="validationCustom04" class="form-label">Mobaile No.</label>
                        <input type="text" name="umno" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?= $fu['c_mobile_no'] ?>" required>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Email</label>
                    <input type="email" name="uemail" class="form-control" id="validationCustom03" value="<?= $fu['c_email'] ?>" required>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                <input type="reset" value="Close" class="btn btn-danger" data-bs-dismiss="modal">
                <input type="submit" value="Edit" id="edit_pro_btn" class="btn btn-warning" data-bs-dismiss="modal">
            </div>
        </div>
    </div>
</div>


<script>
    // Edit Product
    $(document).on("click", "#edit_pro_btn", function() {
                let form_data = new FormData($("#edit_pro_form")[0]);
                $.ajax({
                    url: 'edit_profile.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',

                    success: function(php_script_response) {
                        if (php_script_response === "success") {
                            alert("Sign In Now !");
                            window.location.href='sign_in.php';
                        } else {
                            alert(php_script_response);
                        }
                    }
                });
            });
</script>
<?php
    include("footer.php");
?>
