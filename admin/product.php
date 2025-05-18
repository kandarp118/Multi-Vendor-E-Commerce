<?php
session_start();
if (isset($_SESSION['aunm'])) {
    include("connection.php");
    include("header.php");
    include("sidebar.php");
    include("topbar.php");
    // $v_id = $_POST['v_id'];
?>
    <!-- <input type="hidden" name="v_id" id="v_id" value="<?php //echo $v_id; ?>"> -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="d-flex justify-content-between col-auto">
                <h1 class="h3 text-gray-800 p-0 m-0"> All Product </h1>
                <button type="button" id="addshow" class=" d-block d-lg-none d-sm-none btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i></button>
            </div>

            <button type="button" id="addshow" class="d-none d-sm-inline-block btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i> Add Product</button>
        </div>

        <!-- ADD PRODUCT -->
        <div class="row justify-content-center" style="display: none;" id="addproduct">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                                    </div>
                                    <form id="add_pro_form" class="user needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                        <input type="hidden" name="p_author" value="<?=$_SESSION['aunm']?>">
                                        <div class="form-group">
                                            <input type="text" name="pro_nm" class="form-control form-control-user"
                                                id="pro_nm" aria-describedby="emailHelp"
                                                placeholder=" Product Name ..." autocomplete="off" required>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="text" name="pro_p_price" class="form-control form-control-user"
                                                    id="pro_p_price" aria-describedby="emailHelp"
                                                    placeholder=" Product P Price ..." autocomplete="off" required>
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="text" name="pro_s_price" class="form-control form-control-user"
                                                    id="pro_s_price" aria-describedby="emailHelp"
                                                    placeholder=" Product S Price ..." autocomplete="off" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" name="pro_quantity" class="form-control form-control-user"
                                                    id="pro_quantity" aria-describedby="emailHelp"
                                                    placeholder=" Product Quantity..." autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <?php
                                                $sc = "select * from category";
                                                $scqr = mysqli_query($c, $sc);

                                                ?>
                                                <select name="pro_c_id" class="form-control " id="pro_c_id" style="border-radius: 25px 25px;padding: 5px 20px;font-size: 0.8rem;height: 50px;" required>
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    while ($cf = mysqli_fetch_array($scqr)) {
                                                    ?>
                                                        <option value="<?php echo $cf[0] ?>"><?php echo $cf[1] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php
                                                $sb = "select * from brand";
                                                $sbqr = mysqli_query($c, $sb);

                                                ?>
                                                <select name="pro_b_id" class="form-control form-select" id="pro_b_id" style="border-radius: 25px 25px;padding: 5px 20px;font-size: 0.8rem;height: 50px;" required>
                                                    <option value="">Select Brand</option>
                                                    <?php
                                                    while ($bf = mysqli_fetch_array($sbqr)) {
                                                    ?>

                                                        <option value="<?php echo $bf[0] ?>"><?php echo $bf[2] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-around mb-0">
                                            <div class="col-sm-9 mb-3 mb-sm-3   ">
                                                <input type="text" name="pro_desc" class="form-control form-control-user"
                                                    id="pro_desc"
                                                    placeholder="Product Description ..." autocomplete="off" required>
                                            </div>
                                            <div class="col-sm-3 mb-3 mb-sm-3">
                                                <input type="file" name="file" class="form-control form-control-user image_input_field" id="exampleProductImage" placeholder="First Name" multiple hidden required>
                                                <label for="exampleProductImage" class="btn btn-md btn-warning btn-user col-lg-12" style="font-size:1.0rem;" required><i class="fas fa-upload"></i> Image</label>
                                                <div class="invalid-feedback ml-2">
                                                    Please Select Product Image.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-around">
                                            <div class="overflow-auto" id="show-pro-img">

                                            </div>
                                        </div>
                                        <div class="row justify-content-around mt-3">
                                            <input type="button" id="addclose" value="Close" class="btn btn-danger btn-user col-5">
                                            <input type="submit" id="add_pro_btn" value="Save" name="add" class="btn btn-success btn-user col-5">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- UPDATE PRODUCT -->
        <div class="row justify-content-center" style="display: none;" id="editproduct">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Edit Product</h1>
                                    </div>
                                    <form id="edit_pro_form" class="user needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                        <div class="form-group">
                                            <input type="text" name="p_id" id="p_id" hidden>
                                            <input type="text" name="p_nm" class="form-control form-control-user"
                                                id="p_nm" aria-describedby="emailHelp"
                                                placeholder=" Product Name ..." autocomplete="off" required>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="text" name="p_p_prc" class="form-control form-control-user"
                                                    id="p_p_prc" aria-describedby="emailHelp"
                                                    placeholder=" Product P Price ..." autocomplete="off" required>
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="text" name="p_s_prc" class="form-control form-control-user"
                                                    id="p_s_prc" aria-describedby="emailHelp"
                                                    placeholder=" Product S Price ..." autocomplete="off" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" name="p_qun" class="form-control form-control-user"
                                                    id="p_qun" aria-describedby="emailHelp"
                                                    placeholder=" Product Quantity..." autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <?php
                                                $sc = "select * from category";
                                                $scqr = mysqli_query($c, $sc);

                                                ?>
                                                <select name="p_ca_id" class="form-control" id="p_ca_id" style="border-radius: 25px 25px;padding: 5px 20px;font-size: 0.8rem;height: 50px;" required>
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    while ($cf = mysqli_fetch_array($scqr)) {
                                                    ?>
                                                        <option value="<?php echo $cf[0] ?>"><?php echo $cf[1] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php
                                                $sb = "select * from brand";
                                                $sbqr = mysqli_query($c, $sb);

                                                ?>
                                                <select name="p_b_id" class="form-control" id="p_b_id" style="border-radius: 25px 25px;padding: 5px 20px;font-size: 0.8rem;height: 50px;" required>
                                                    <option value="">Select Brand</option>
                                                    <?php
                                                    while ($bf = mysqli_fetch_array($sbqr)) {
                                                    ?>
                                                        <option value="<?php echo $bf[0] ?>"><?php echo $bf[2] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-around">

                                            <div class="col-sm-9 mb-3 mb-sm-3">
                                                <input type="text" name="p_desc" class="form-control form-control-user overflow-auto"
                                                    id="p_desc"
                                                    placeholder="Product Description ..." autocomplete="off" required>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="file" name="p_img" class="form-control form-control-user" id="image_input_field_edit" placeholder="First Name" multiple hidden>
                                                <label for="image_input_field_edit" class="btn btn-lg btn-warning justify-content-around align-item-middle p-2 mb-0" style="width: 100%;border-radius:30px;"><i class="fas fa-upload"></i> Image</label>
                                                <div class="invalid-feedback ml-2">
                                                    Please Select Product Image.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-around">
                                            <div class="overflow-auto" id="show-pro-img-edit">
                                                <img src="" alt="" id="edit_show_image">
                                            </div>
                                        </div>
                                        <div class="row justify-content-around mt-3">
                                            <input type="button" id="editclose" value="Close" class="btn btn-danger btn-user col-5">
                                            <input type="submit" id="edit_pro_btn" value="Save" name="add" class="btn btn-success btn-user col-5">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- PRODUCT TABLE -->
        <div class="card shadow my-3">
            <div class="card-header py-3">
                <?php
                    $sel_pro_query="SELECT COUNT(*) AS total FROM product";
                    $sel_pro_ans=mysqli_query($c,$sel_pro_query);
                    $tp=mysqli_fetch_assoc($sel_pro_ans);
                ?>
                <h6 class="m-0 font-weight-bold text-primary">Total Product : <?= $tp['total'] ?></h6>
            </div>
            <div class="card-body" id="show_product">

            </div>
        </div>
        
    </div>
<div id="get">
<?php 
    if(isset($_SESSION['status_seller']))
    {
        if($_SESSION['status_seller']=="add".$_SESSION['seller']['v_id'])
        {
            echo "<input type='hidden' value='add' id='status_seller'>";
            unset($_SESSION['status_seller']);
        }
        if ($_SESSION['status_seller']=="del".$_SESSION['seller']['v_id']) 
        {
            echo "<input type='hidden' value='del' id='status_seller'>";
            unset($_SESSION['status_seller']);
        }
    }
    
?>
</div>
    <script>
        $(document).ready(function() {
            // Product

            setInterval(function(){
                var name =  $('#status_seller').val();
                if(name == "add")
                {
                    load_product();
                    $('#status_seller').val("");  
                }
                if(name == "del")
                {
                    load_product();
                    $('#status_seller').val("");  
                }
            },500);

            setInterval(function(){
                $('#get').load(' #get');
            },1000);

            // Fetch Product Data
            function load_product() {
                $.ajax({
                    url: "fetch_product.php",
                    type: "POST",
                    success: function(data) {
                        $("#show_product").html(data);
                    }
                });
            }
            load_product();
            // let v_id = document.getElementById("v_id");
            // if (v_id != "") {
            //     function load_product(v_id) {
            //         $.ajax({
            //             url: "fetch_product.php",
            //             type: "POST",
            //             data:{v_id,v_id},
            //             success: function(data) {
            //                 $("#show_product").html(data);
            //             }
            //         });
            //     }
            //     load_product(v_id);
            // } else {
            //     function load_product() {
            //         $.ajax({
            //             url: "fetch_product.php",
            //             type: "POST",
            //             success: function(data) {
            //                 $("#show_product").html(data);
            //             }
            //         });
            //     }
            //     load_product();
            // }
            
            // Show Add Product Form
            $(document).on("click", "#addshow", function() {
                $("#addproduct").show();
                $("#editproduct").hide();
            });
            // Hide Add product Form
            $(document).on("click", "#addclose", function() {
                $("#addproduct").hide();
            });
            // Show Product Image In Add form
            const sel_img = document.querySelector(".image_input_field");
            const show_img = document.querySelector("#show-pro-img");
            sel_img.addEventListener("change", () => {
                console.log(sel_img.files);
                show_img.style.display = "flex"; // Arrange images in a row
                show_img.style.overflowX = "auto"; // Enable horizontal scrolling
                show_img.style.whiteSpace = "nowrap"; // Prevent images from wrapping to the next line
                show_img.style.maxWidth = "100%"; // Ensure the container width is manageable

                for (let index = 0; index < sel_img.files.length; index++) {
                    let cre_img = document.createElement("img");
                    cre_img.src = URL.createObjectURL(sel_img.files[index]);
                    cre_img.style.width = "150px";
                    cre_img.style.height = "150px";
                    cre_img.classList.add("m-2");
                    show_img.appendChild(cre_img);

                }
            });
            // Add Product
            $(document).on("click", "#add_pro_btn", function() {
                let form_data = new FormData($("#add_pro_form")[0]);
                $.ajax({
                    url: 'add_product.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                    success: function(data) {
                        if (data == "success") {
                            alert("Product Successfully Inserted");
                            load_product();
                        } else {
                            alert(data);
                        }
                    }
                });
            });

            // Show Edit Product Form
            $(document).on("click", "#editshow", function() {
                $("#editproduct").show();
                $("#addproduct").hide();
            });
            // Hide Edit Product Form
            $(document).on("click", "#editclose", function() {
                $("#editproduct").hide();
            });

            // Show Product Image In Edit Form
            // const sel_img_edit = document.querySelector("#image_input_field_edit");
            const particular_img_tag = document.querySelector("#edit_show_image");

            const showImageFunc = (p_image) => {
                console.log(p_image);
                let edit_show_image = document.querySelector("#edit_show_image");
                edit_show_image.src = p_image;
                edit_show_image.style.width = "150px";
                edit_show_image.classList.add("m-2");

                const sel_img = document.querySelector("#image_input_field_edit");
                const show_img = document.querySelector("#show-pro-img-edit");

                sel_img.addEventListener("change", () => {
                    particular_img_tag.classList.add("d-none");
                    console.log(sel_img.files);

                    // Clear existing images from the show_img container
                    // show_img.innerHTML = '';

                    show_img.style.display = "flex"; // Arrange images in a row
                    show_img.style.overflowX = "auto"; // Enable horizontal scrolling
                    show_img.style.whiteSpace = "nowrap"; // Prevent images from wrapping to the next line
                    show_img.style.maxWidth = "100%"; // Ensure the container width is manageable

                    // Add new images
                    for (let index = 0; index < sel_img.files.length; index++) {
                        let cre_img = document.createElement("img");
                        cre_img.src = URL.createObjectURL(sel_img.files[index]);
                        cre_img.style.width = "150px";
                        cre_img.style.height = "150px";
                        cre_img.classList.add("m-2");
                        show_img.appendChild(cre_img);
                    }
                });
            }


            // Set Data In Edit Product Form 
            $(document).on("click", ".edit-btn", function() {

                const p_id = $(this).data('id');
                const p_nm = $(this).data('name');
                const p_p_prc = $(this).data('p_prc');
                const p_s_prc = $(this).data('s_prc');
                const p_ca_id = $(this).data('ca_id');
                const p_b_id = $(this).data('b_id');
                const p_qun = $(this).data('p_qun');
                const p_desc = $(this).data('p_desc');
                const p_img = $(this).data('p_img');

                showImageFunc(p_img);

                $("#editproduct").show();
                $("#editproduct input[name='p_id']").val(p_id);
                $("#editproduct input[name='p_nm']").val(p_nm);
                $("#editproduct input[name='p_p_prc']").val(p_p_prc);
                $("#editproduct input[name='p_s_prc']").val(p_s_prc);
                $("#editproduct select[name='p_ca_id']").val(p_ca_id);
                $("#editproduct select[name='p_b_id']").val(p_b_id);
                $("#editproduct input[name='p_qun']").val(p_qun);
                $("#editproduct input[name='p_desc']").val(p_desc);
                // $("#image_input_field_edit").val(p_img);

                // const show_img_edit = document.querySelector("#show-pro-img-edit");
                // sel_img.addEventListener("change",() => {
                //     // console.log(sel_img_edit.files);
                //     show_img_edit.style.display = "flex";
                //     show_img_edit.style.overflowX = "auto";
                //     show_img_edit.style.whiteSpace = "nowrap";
                //     show_img_edit.style.maxWidth = "100%";

                //     for (let index = 0; index < sel_img_edit.files.length; index++) {
                //         let cre_img_edit = document.createElement("img");
                //         cre_img_edit.src = URL.createObjectURL(sel_img_edit.files[index]);
                //         cre_img_edit.style.width = "150px";
                //         cre_img_edit.style.height = "150px";
                //         cre_img_edit.classList.add("m-2");
                //         show_img_edit.appendChild(cre_img);

                //     }
                // });
            });
            // Edit Product
            $(document).on("click", "#edit_pro_btn", function() {
                let form_data = new FormData($("#edit_pro_form")[0]);
                $.ajax({
                    url: 'edit_product.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',

                    success: function(php_script_response) {
                        if (php_script_response === "success") {
                            alert("Product Successfully Updated");
                            load_product();
                        } else {
                            alert(php_script_response);
                        }
                    }
                });
            });
            // Delete Product
            $(document).on("click", "#product_del_btn", function() {
                let p_id = $(this).data("p_id");
                let v_id = $(this).data("v_id");
                    $.ajax({
                    type: "POST",
                    url: "delete_product.php",
                    data: {
                        p_id: p_id,
                        v_id:v_id
                    },
                    success: function(data) {
                        if (data == "success") {
                            alert('Successfully Delete Product.');
                            load_product();
                        } else {
                            alert(data);
                        }
                    }
                });
            });
            // approve vendor
            $(document).on("click","#approve_btn",function(){
                let p_id = $(this).data('p_id');
                let v_id = $(this).data('v_id');
                console.log(p_id);
                $.ajax({
                    url: 'approve_product.php',
                    method: 'POST',
                    data: {
                        p_id:p_id,
                        v_id:v_id
                    },
                    success:function(data){
                        if (data === "success") {
                            load_product();
                        } else {
                            
                        }
                    }
                })
            });
            // reject btn to remove vendor data and session
            $(document).on("click","#reject_btn",function(){
                let p_id = $(this).data('p_id');
                let v_id = $(this).data('v_id');
                console.log(v_id);
                $.ajax({
                    url: 'reject_product.php',
                    method: 'POST',
                    data: {
                        p_id:p_id,
                        v_id:v_id
                    },
                    success:function(data){
                        if (data === "success") {
                            load_product();
                            // var newtab = window.open('http://localhost/Akommerce/seller/index.php');
                            // ('http://localhost/Akommerce/seller/index.php').document.location.reload(true);
                        } else {
                            alert(data);
                        }
                    }
                })
            });
        });
    </script>
<?php
    include("footer.php");
} else {
    echo "
        <script type='text/javascript'>
            window.location='admin-login.php';
        </script>";
}

?>