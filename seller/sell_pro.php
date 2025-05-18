<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
    // session_start();
?>
<div class="container-fluid py-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bold mb-0">Product</h1>
            <a href="#" class="btn btn-lg btn-warning text-end" data-bs-toggle="modal" data-bs-target="#addProduct">Add Product</a>
        </div>
        <hr>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3 " id="staticBackdropLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <div class="row justify-content-center">
                    <div class="row justify-content-center">
                        <div class="card o-hidden border-0 shadow o-hidden p-4"> -->
                            <form class="row g-3 needs-validation" id="add_pro_form" method="POST" novalidate enctype="multipart/form-data">
                                <input type="hidden" name="p_author" value="<?= $_SESSION['seller']['v_id'] ?>">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Product Name</label>
                                    <input type="text" name="pro_nm" class="form-control" id="validationCustom01" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="purchasePrice" class="form-label">purchase price</label>
                                    <input type="number" name="purchase_price" class="form-control" id="purchasePrice" value="0" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tax Rate</label>
                                    <select class="form-select" aria-label="Default select example" name="tax_rate" id="taxRate">
                                        <option selected>select Tax Rate</option>
                                        <?php
                                            $sel_tax="SELECT * FROM tax";
                                            $sel_tax_ans=mysqli_query($c,$sel_tax);
                                            while($ftax=mysqli_fetch_array($sel_tax_ans)){
                                        ?>
                                        <option value="<?= $ftax['tax_rate'] ?>"><?= $ftax['tax_rate'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tax amount</label>
                                    <input type="number" name="tax_amount" class="form-control" id="taxAmount" value="0" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="profitAmount" class="form-label">Profit amount</label>
                                    <input type="number" name="profit_amount" class="form-control" id="profitAmount" value="0" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="sellingPrice" class="form-label">Original Price</label>
                                    <input type="number" name="original_price" class="form-control" id="originalPrice" value="0" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="sellingPrice" class="form-label">Selling Price</label>
                                    <input type="number" name="selling_price" class="form-control" id="sellingPrice" value="0" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Quntity</label>
                                    <input type="number" name="pro_qun" class="form-control" id="validationCustom01" value="0" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Category</label>
                                    <select class="form-select" aria-label="Default select example" name="pro_cat">
                                        <option selected>select category</option>
                                        <?php
                                            $sel_cat="SELECT * FROM category";
                                            $sel_cat_ans=mysqli_query($c,$sel_cat);
                                            while($fca=mysqli_fetch_array($sel_cat_ans)){
                                        ?>
                                        <option value="<?= $fca['ca_id'] ?>"><?= $fca['ca_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Brand</label>
                                    <select class="form-select" aria-label="Default select example" name="pro_ba">
                                        <option selected>select brand</option>
                                        <?php
                                            $sel_ba="SELECT * FROM brand";
                                            $sel_ba_ans=mysqli_query($c,$sel_ba);
                                            while($fba=mysqli_fetch_array($sel_ba_ans)){
                                        ?>
                                        <option value="<?= $fba['b_id'] ?>"><?= $fba['b_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Product Description</label>
                                    <textarea name="pro_desc" id="validationCustom01" rows="3" class="form-control" id="validationCustom01" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Profile Image</label>
                                    <input type="file" name="file[]" class="image_input_field form-control" id="ins-img" required multiple>
                                </div>
                                <div class="col-md-12">
                                    <div id="show-pro-img"></div>
                                </div>
                                
                                <!-- <div class="col-12">
                                    <button class="btn btn-warning rounded-5 float-end" id="signUpBtn" type="submit">Continue</button>
                                </div> -->
                            </form>
                        <!-- </div>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="add_pro_btn" class="btn btn-warning" data-bs-dismiss="modal">Insert</button>
            </div>
            </div>
        </div>
    </div>

    <!-- product table -->
    <div class="container-fluid px-5 py-3">
        <div class="">
            <div class="card border-0 shadow my-3" id="show_product">
                
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3 " id="staticBackdropLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <div class="row justify-content-center">
                    <div class="row justify-content-center">
                        <div class="card o-hidden border-0 shadow o-hidden p-4"> -->
                            <form class="row g-3 needs-validation" id="edit_pro_form" method="POST" novalidate>
                                <input type="hidden" name="p_author" value="<?= $_SESSION['seller']['v_id'] ?>">
                                <input type="hidden" name="p_id">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Product Name</label>
                                    <input type="text" name="p_name" class="form-control" id="validationCustom01" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="purchasePrice" class="form-label">purchase price</label>
                                    <input type="number" name="purchase_price" class="form-control" id="purchasePriceU" value="0" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tax Rate</label>
                                    <select class="form-select" aria-label="Default select example" name="tax_rate" id="taxRateU">
                                        <option selected>select Tax Rate</option>
                                        <?php
                                            $sel_tax="SELECT * FROM tax";
                                            $sel_tax_ans=mysqli_query($c,$sel_tax);
                                            while($ftax=mysqli_fetch_array($sel_tax_ans)){
                                        ?>
                                        <option value="<?= $ftax['tax_rate'] ?>"><?= $ftax['tax_rate'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tax amount</label>
                                    <input type="number" name="tax_amount" class="form-control" id="taxAmountU" value="0" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="profitAmount" class="form-label">Profit amount</label>
                                    <input type="number" name="profit_amount" class="form-control" id="profitAmountU" value="0" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="sellingPrice" class="form-label">Original Price</label>
                                    <input type="number" name="original_price" class="form-control" id="originalPriceU" value="0" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="sellingPrice" class="form-label">Selling Price</label>
                                    <input type="number" name="selling_price" class="form-control" id="sellingPriceU" value="0" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Product Quntity</label>
                                    <input type="number" name="p_qun" class="form-control" id="validationCustom01" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Product Category</label>
                                    <select class="form-select" aria-label="Default select example" name="p_cat">
                                        <option selected>select category</option>
                                        <?php
                                            $sel_cat="SELECT * FROM category";
                                            $sel_cat_ans=mysqli_query($c,$sel_cat);
                                            while($fca=mysqli_fetch_array($sel_cat_ans)){
                                        ?>
                                        <option value="<?= $fca['ca_id'] ?>"><?= $fca['ca_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Product Brand</label>
                                    <select class="form-select" aria-label="Default select example" name="p_ba">
                                        <option selected>select brand</option>
                                        <?php
                                            $sel_ba="SELECT * FROM brand";
                                            $sel_ba_ans=mysqli_query($c,$sel_ba);
                                            while($fba=mysqli_fetch_array($sel_ba_ans)){
                                        ?>
                                        <option value="<?= $fba['b_id'] ?>"><?= $fba['b_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Product Description</label>
                                    <textarea name="p_desc" id="validationCustom01" rows="3" class="form-control" id="validationCustom01" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">New Product Image</label>
                                    <input type="file" name="file" class="form-control" id="image_input_field_edit" required multiple>                                    
                                </div>
                                <div class="col-md-12">
                                    <!-- <label for="validationCustom03" class="form-label">Old Product Image</label> -->
                                    <div class="overflow-auto" id="show-pro-img-edit">
                                        <img src="" alt="" id="edit_show_image">
                                    </div>
                                </div>
                                
                                <!-- <div class="col-12">
                                    <button class="btn btn-warning rounded-5 float-end" id="signUpBtn" type="submit">Continue</button>
                                </div> -->
                            </form>
                        <!-- </div>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                <input type="reset" value="Close" class="btn btn-danger" data-bs-dismiss="modal">
                <input type="submit" value="Edit" id="edit_pro_btn" class="btn btn-warning" data-bs-dismiss="modal">
            </div>
            
            </div>
        </div>
    </div>
</div>
<div id="get">
<?php 
        if(isset($_SESSION['status_admin']))
        {
            if($_SESSION['status_admin'] == "approve".$_SESSION['seller']['v_id'])
            {
                echo "<input type='hidden' value='app' id='status_admin'>";
                unset($_SESSION['status_admin']);
            }
            if ($_SESSION['status_admin'] == "reject".$_SESSION['seller']['v_id'])
            {
                echo "<input type='hidden' value='rej' id='status_admin'>";
                unset($_SESSION['status_admin']);
            }
            if ($_SESSION['status_admin'] == "delete".$_SESSION['seller']['v_id']) 
            {
                echo "<input type='hidden' value='del' id='status_admin'>";
                unset($_SESSION['status_admin']);
            }
        }  
    ?>
</div>
<script>
    $(document).ready(function() {
            // Fetch Product Data

            // add price total
            
        $(document).on("change","#taxRate",function(){
            let purchase_price = document.getElementById("purchasePrice").value;
            let tax_rate = document.getElementById("taxRate").value;
            let tax_amount = purchase_price * tax_rate;
            $("#taxAmount").val(tax_amount);
            let profit_amount = parseInt($("#profitAmount").value);
            var original_price = (5 * profit_amount)+purchase_price+tax_amount;
            $("#originalPrice").val(original_price);
            var selling_price = (purchase_price + tax_amount + profit_amount);
            console.log(selling_price);
            $("#sellingPrice").val(selling_price);

        });
        $("#profitAmount").keyup(function(){
            let purchase_price = parseInt(document.getElementById("purchasePrice").value);
            let tax_rate = parseFloat(document.getElementById("taxRate").value);
            var tax_amount = purchase_price * tax_rate;
            let profit_amount = parseInt(this.value);
            var original_price = (5 * profit_amount)+purchase_price+tax_amount;
            $("#originalPrice").val(original_price);
            var selling_price = (purchase_price + tax_amount + profit_amount);
            $("#sellingPrice").val(selling_price);
        });

        // update price total

        $(document).on("change","#taxRateU",function(){
            let purchase_price = parseInt(document.getElementById("purchasePriceU").value);
            let tax_rate = parseFloat(document.getElementById("taxRateU").value);
            let tax_amount = purchase_price * tax_rate;
            $("#taxAmountU").val(tax_amount);
            var original_price = (5 * profit_amount)+purchase_price+tax_amount;
            $("#originalPriceU").val(original_price);
            let profit_amount = parseInt(document.getElementById("profitAmountU").value);
            var selling_price = (purchase_price + tax_amount + profit_amount);
            console.log(selling_price);
            $("#sellingPriceU").val(selling_price);

        });
        $("#profitAmountU").keyup(function(){
            let purchase_price = parseInt(document.getElementById("purchasePriceU").value);
            let tax_rate = parseFloat(document.getElementById("taxRateU").value);
            var tax_amount = purchase_price * tax_rate;
            let profit_amount = parseInt(this.value);
            var original_price = (5 * profit_amount)+purchase_price+tax_amount;
            $("#originalPriceU").val(original_price);
            var selling_price = (purchase_price + tax_amount + profit_amount);
            console.log(selling_price);
            $("#sellingPriceU").val(selling_price);
        });


        $(document).on("click","#pending",function(){
            Swal.fire({                                
                title: "Waiting For Approval ...",
                icon: "info"
            });
        }); 

            setInterval(function(){
                var name =  $('#status_admin').val();
                if(name == "app")
                {
                    Swal.fire({
                        title: "Successfully Approved !",
                        icon: "success"
                    });
                    load_product();
                    $('#status_admin').val("");  
                }   
                if(name == "rej")
                {
                    Swal.fire({
                        title: "Product Rejected !",
                        icon: "error"
                    });
                    load_product();
                    $('#status_admin').val("");  
                }
                if(name == "del")
                {
                    Swal.fire({
                        title: "Product Deleted !",
                        icon: "error"
                    });
                    load_product();
                    $('#status_admin').val("");  
                }
            },500);

            setInterval(function(){
                $('#get').load(' #get');
            },1000);

            function load_product() {
                $.ajax({
                    url: "fetch_sell_product.php",
                    type: "POST",
                    success: function(data) {
                        $("#show_product").html(data);
                    }
                });
            }
            load_product();

            // Show Product Image In Add form
            const sel_img = document.querySelector(".image_input_field");
            const show_img = document.querySelector("#show-pro-img");
            sel_img.addEventListener("change", () => {
                console.log(sel_img.files);
                show_img.style.display = "flex"; 
                show_img.style.overflowX = "auto"; 
                show_img.style.whiteSpace = "nowrap"; 
                show_img.style.maxWidth = "100%"; 

                for (let index = 0; index < sel_img.files.length; index++) {
                    let cre_img = document.createElement("img");
                    cre_img.src = URL.createObjectURL(sel_img.files[index]);
                    // cre_img.style.width = "150px";
                    cre_img.style.height = "200px";
                    cre_img.classList.add("m-2");
                    show_img.appendChild(cre_img);

                }
            });

            // Add Product
            $(document).on("click", "#add_pro_btn", function() {
                let form_data = new FormData($("#add_pro_form")[0]);
                $.ajax({
                    url: 'add_sell_pro.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                    success: function(data) {
                        if (data == "success") {
                            Swal.fire({
                                title: "Successfully Product Uploaded !",
                                text: "Waiting For Approval...",
                                icon: "success"
                            });
                            $("#add_pro_form")[0].reset();
                            show_img.innerHTML = "";
                            load_product();
                        } else {
                            alert(data);
                        }
                    }
                });
            });

            // Show Product Image In Edit Form
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

                    show_img.innerHTML = '';

                    show_img.style.display = "flex"; 
                    show_img.style.overflowX = "auto"; 
                    show_img.style.whiteSpace = "nowrap"; 
                    show_img.style.maxWidth = "100%"; 

                    // Add new images
                    for (let index = 0; index < sel_img.files.length; index++) {
                        let cre_img = document.createElement("img");
                        cre_img.src = URL.createObjectURL(sel_img.files[index]);
                        cre_img.style.width = "150px";
                        // cre_img.style.height = "150px";
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
                const p_tax_rate = $(this).data('tax_rate');
                const p_tax_amount = $(this).data('tax_amount');
                const p_profit_amount = $(this).data('profit_amount');
                const p_s_prc = $(this).data('s_prc');
                const p_ca_id = $(this).data('ca_id');
                const p_b_id = $(this).data('b_id');
                const p_qun = $(this).data('p_qun');
                const p_desc = $(this).data('p_desc');
                const p_img = $(this).data('p_img');

                showImageFunc(p_img);

                $("#edit_pro_form").show();
                $("#edit_pro_form input[name='p_id']").val(p_id);
                $("#edit_pro_form input[name='p_name']").val(p_nm);
                $("#edit_pro_form input[name='purchase_price']").val(p_p_prc);
                $("#edit_pro_form select[name='tax_rate']").val(p_tax_rate);
                $("#edit_pro_form input[name='tax_amount']").val(p_tax_amount);
                $("#edit_pro_form input[name='profit_amount']").val(p_profit_amount);
                $("#edit_pro_form input[name='selling_price']").val(p_s_prc);
                $("#edit_pro_form select[name='p_cat']").val(p_ca_id);
                $("#edit_pro_form select[name='p_ba']").val(p_b_id);
                $("#edit_pro_form input[name='p_qun']").val(p_qun);
                $("#edit_pro_form textarea[name='p_desc']").val(p_desc);
            });

            // Edit Product
            $(document).on("click", "#edit_pro_btn", function() {
                let form_data = new FormData($("#edit_pro_form")[0]);

                // const swalWithBootstrapButtons = Swal.mixin({
                //     customClass: {
                //         confirmButton: "btn btn-success mx-2",
                //         cancelButton: "btn btn-danger mx-2"
                //     },
                //     buttonsStyling: false
                // });
                //     swalWithBootstrapButtons.fire({
                //         title: "Are you sure ?",
                //         text: "can you update this product data",
                //         icon: "warning",
                //         showCancelButton: true,
                //         confirmButtonText: "Yes, update it!",
                //         cancelButtonText: "No, cancel!",
                //         // reverseButtons: true
                //         }).then((result) => {
                //         if (result.isConfirmed) {
                            $.ajax({
                                url: 'edit_sell_pro.php',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'POST',
                                success: function(php_script_response) {
                                    if (php_script_response === "success") {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: "top-end",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.onmouseenter = Swal.stopTimer;
                                                toast.onmouseleave = Swal.resumeTimer;
                                            }
                                        });
                                        Toast.fire({
                                            icon: "success",
                                            title: "Update Product Successfully !"
                                        });
                                        $("#edit_pro_form")[0].reset();
                                        load_product();
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Something went wrong!",
                                            footer: '<a href="#">'+php_script_response+'</a>'
                                        });
                                    }
                                }
                            });
                //         } else if (
                //             /* Read more about handling dismissals below */
                //             result.dismiss === Swal.DismissReason.cancel
                //         ) {
                //             swalWithBootstrapButtons.fire({
                //             title: "Cancelled Product Delete !",
                //             icon: "error"
                //             });
                //         }
                //     });


                // $.ajax({
                //     url: 'edit_sell_pro.php',
                //     cache: false,
                //     contentType: false,
                //     processData: false,
                //     data: form_data,
                //     type: 'POST',

                //     success: function(php_script_response) {
                //         if (php_script_response === "success") {
                //             alert("Product Successfully Updated");
                //             $("#edit_pro_form")[0].reset();
                //             load_product();
                //         } else {
                //             Swal.fire({
                //                 icon: "error",
                //                 title: "Oops...",
                //                 text: "Something went wrong!",
                //                 footer: '<a href="#">'+php_script_response+'</a>'
                //             });
                //         }
                //     }
                // });
            });

            // Delete Product
            $(document).on("click", "#product_del_btn", function() {
                let p_id = $(this).data("id");
                let p_author = $(this).data("author");

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success mx-2",
                        cancelButton: "btn btn-danger mx-2"
                    },
                    buttonsStyling: false
                });
                    swalWithBootstrapButtons.fire({
                        title: "Are you sure ?",
                        text: "can you delete this product ",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        // reverseButtons: true
                        }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            $.ajax({
                                type: "POST",
                                url: "del_sell_pro.php",
                                data: {
                                    p_id: p_id,
                                    p_author: p_author
                                },
                                success: function(data) {
                                    if (data == "success") {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: "top-end",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.onmouseenter = Swal.stopTimer;
                                                toast.onmouseleave = Swal.resumeTimer;
                                            }
                                        });
                                        Toast.fire({
                                            icon: "success",
                                            title: "Deleted Product Successfully !"
                                        });
                                        load_product();
                                    } else {
                                        alert(data);
                                    }
                                }
                            });
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire({
                            title: "Cancelled Product Delete !",
                            icon: "error"
                            });
                        }
                    });
            });

    });


    // Show Product Image In Edit Form

</script>
<?php
    include("footer.php");
?>