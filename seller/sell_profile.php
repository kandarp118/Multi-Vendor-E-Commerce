<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
    $sel_user="SELECT * FROM vendor WHERE v_id='".$_SESSION['seller']['v_id']."'";
    $sel_user_ans=mysqli_query($c,$sel_user);
    $fv=mysqli_fetch_array($sel_user_ans);
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
                        <input type="text" name="ufnm" class="form-control" id="validationCustom01" value="<?= $fv['v_f_name'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" name="ulnm" class="form-control" id="validationCustom02" value="<?= $fv['v_l_name'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Mobaile No.</label>
                          <input type="text" name="umno" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?= $fv['v_mobile_no'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" name="uemail" class="form-control" id="validationCustom03" value="<?= $fv['v_email'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Store Name</label>
                        <input type="text" name="cpass" class="form-control" id="validationCustom03" value="<?= $fv['v_store_name'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Store About</label>
                        <input type="text" name="cpass" class="form-control" id="validationCustom03" value="<?= $fv['v_store_about'] ?>" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Address</label>
                        <input type="text" name="cpass" class="form-control" id="validationCustom03" value="<?= $fv['v_address'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <label for="validationCustom03" class="form-label">Password</label>
                            <a href="#">Forget Password ?</a>
                        </div>
                        <input type="Password" name="cpass" class="form-control" id="validationCustom03" value="<?= $fv['v_password'] ?>" readonly>
                    </div>
                    <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Profile Image</label><br>
                        <img id="validationCustom03" src="<?= "http://localhost/Akommerce/seller/img/vendor_img/".$fv['v_image'] ?>" width="auto" height="200px">
                    </div>
                    <div class="col-md-2 mt-5">
                        <!-- <a href="edit_profile.php" class="btn btn-outline-warning rounded-5 float-end fw-bold">Edit Profile</a> -->
                        <form action="edit_product.php" method="POST">
                            <input type="hidden" name="v_id" value="<?= $_SESSION['seller']['v_id'] ?>">
                            <input type="button" value="Edit Profile" class="btn btn-lg btn-outline-warning rounded-5 float-end fw-bold" data-bs-toggle="modal" data-bs-target="#editProduct">
                        </form>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>


<!-- Edit Product Modal -->
<div class="modal fade" id="editProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3 " id="staticBackdropLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="edit_pro_form" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" name="sfnm" class="form-control" id="validationCustom01" value="<?= $fv['v_f_name'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" name="slnm" class="form-control" id="validationCustom02" value="<?= $fv['v_l_name'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Mobaile No.</label>
                            <input type="text" name="smno" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?= $fv['v_mobile_no'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" name="semail" class="form-control" id="validationCustom03" value="<?= $fv['v_email'] ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Store Name</label>
                        <input type="text" name="sstorenm" class="form-control" id="validationCustom03" value="<?= $fv['v_store_name'] ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">About Store</label>
                        <input type="text" name="sstoreabout" class="form-control" id="validationCustom03" value="<?= $fv['v_store_about'] ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Address</label>
                        <input type="text" name="saddress" class="form-control" id="validationCustom03" value="<?= $fv['v_address'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">New Profile Image</label>
                        <input type="file" name="file" id="validationCustom03" class="form-control image_input_field">
                        <div id="show_img"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Old Profile Image</label>
                        <!-- <input type="hiddne" name="file" id="validationCustom03" class="form-control image_input_field"> -->
                        <br>
                        <img src="<?= "http://localhost/Akommerce/seller/img/vendor_img/".$fv['v_image'] ?>" width="auto" height="200px">
                    </div>
                </form>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                    <input type="reset" value="Close" class="btn btn-danger" data-bs-dismiss="modal">
                    <input type="submit" value="Edit" id="edit_pro_btn" class="btn btn-warning" data-bs-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</div>


<script>

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
            cre_img.style.width = "auto";
            cre_img.style.height = "200px";
            cre_img.classList.add("m-2");
            show_img.appendChild(cre_img);

        }
    });

    // Edit Product
    $(document).on("click", "#edit_pro_btn", function() {
                let form_data = new FormData($("#edit_pro_form")[0]);
                $.ajax({
                    url: 'edit_sell_profile.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',

                    success: function(php_script_response) {
                        if (php_script_response === "success") {
                            alert("Sign In Now !");
                            window.location.href='sign_in_sell.php';
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
