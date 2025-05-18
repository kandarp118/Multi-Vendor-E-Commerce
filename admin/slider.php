<?php
    session_start();
    if (isset($_SESSION['aunm'])) 
    {
        include("connection.php");
        include("header.php");
        include("sidebar.php");
        include("topbar.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="d-flex justify-content-between">
                            <h1 class="h3 text-gray-800 col-sm-6 p-0 m-0"> Slider </h1>
                            <button type="button" id="addshow" class=" d-block d-lg-none d-sm-none btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i></button>
                        </div>

                        <button type="button" id="addshow" class="d-none d-sm-inline-block btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i> Add Slider</button>
                    </div>

                    <!-- ADD SLIDER -->
                    <div class="row justify-content-center" style="display: none;" id="addslider">
                        <div class="col-xl-10 col-lg-12 col-md-9">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Add Slider</h1>
                                                </div>
                                                <form id="add_slider_form" class="user needs-validation" method="POST" novalidate>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" name="stitle" class="form-control form-control-user" id="brand_name" placeholder="Enter Slider Title ..." autocomplete="off" required>
                                                        </div>
                                                        <!-- <div class="col-sm-6">
                                                            <input type="text" name="slinkurl" class="form-control form-control-user" id="brand_name" placeholder="Enter Link Url ..." autocomplete="off" required>
                                                        </div> -->
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="sdesc" class="form-control form-control-user"
                                                            id="pro_nm" aria-describedby="emailHelp"
                                                            placeholder="Enter Slider Description ..." autocomplete="off" required>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-3">
                                                            <input type="file" name="file" class="form-control form-control-user image_input_field" id="exampleProductImage"
                                                                placeholder="First Name" multiple hidden required>
                                                            <label for="exampleProductImage" class="btn btn-md btn-warning btn-user col-lg-12" style="font-size:1.0rem;" required><i class="fas fa-upload"></i> Slider Image</label>
                                                            <div class="invalid-feedback ml-2">
                                                                Please Select Product Image.
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div id="show-slider-img" class="row justify-content-center"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-around mt-4">
                                                        <input type="button" id="addclose" value="Close" class="btn btn-danger btn-user col-5">
                                                        <input id="add_brand_btn" type="submit" value="Save" name="add_brand" class="btn btn-success btn-user col-5">    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- UPDATE SLIDER -->
                    <div class="row justify-content-center" style="display: none;" id="editslider">
                        <div class="col-xl-10 col-lg-12 col-md-9">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">EDIT Slider</h1>
                                                </div>
                                                <form id="edit_slider_form" class="user needs-validation" method="POST" novalidate>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="hidden" name="s_id">
                                                            <input type="text" name="stitle" class="form-control form-control-user" id="brand_name" placeholder="Enter Slider Title ..." autocomplete="off" required>
                                                        </div>
                                                        <!-- <div class="col-sm-6">
                                                            <input type="text" name="slinkurl" class="form-control form-control-user" id="brand_name" placeholder="Enter Link Url ..." autocomplete="off" required>
                                                        </div> -->
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="sdesc" class="form-control form-control-user"
                                                            id="pro_nm" aria-describedby="emailHelp"
                                                            placeholder="Enter Slider Description ..." autocomplete="off" required>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-3">
                                                            <input type="file" name="file" class="form-control form-control-user image_input_field_edit" id="image_input_field_edit"
                                                                placeholder="First Name" multiple hidden required>
                                                            <label for="image_input_field_edit" class="btn btn-md btn-warning btn-user col-lg-12" style="font-size:1.0rem;" required><i class="fas fa-upload"></i> Slider Image</label>
                                                            <div class="invalid-feedback ml-2">
                                                                Please Select Product Image.
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                        <div class="overflow-auto row justify-content-center" id="show-slider-img-edit">
                                                            <img src="" alt="" id="edit-show-slider-img">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-around mt-4">
                                                        <input type="button" id="addclose" value="Close" class="btn btn-danger btn-user col-5">
                                                        <input id="upd_slider_btn" type="submit" value="Save" name="add_brand" class="btn btn-success btn-user col-5">    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- SLIDER TABLE -->
                    <div class="card shadow my-3" id="brand_table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Brand Table</h6>
                        </div>
                        <div class="card-body" id="show_slider">
                            
                        </div>
                    </div>



                </div>
        <script>
            $(document).ready(function(){
                // Brand 
                    // Fetch Slider Data
                    function load_slider(){
                        $.ajax({
                            url:"fetch_slider.php",
                            type:"POST",
                            success:function(data){
                                $("#show_slider").html(data);
                            }
                        });
                    }
                    load_slider();
                    
                    // Show Slider Image In Add form
                    const sel_img = document.querySelector(".image_input_field");
                    const show_img = document.querySelector("#show-slider-img");
                    sel_img.addEventListener("change", () => {
                        show_img.innerHTML = '';
                        console.log(sel_img.files);
                        show_img.style.display = "flex"; // Arrange images in a row
                        show_img.style.overflowX = "auto"; // Enable horizontal scrolling
                        show_img.style.whiteSpace = "nowrap"; // Prevent images from wrapping to the next line
                        show_img.style.maxWidth = "100%"; // Ensure the container width is manageable

                        for (let index = 0; index < sel_img.files.length; index++) {
                            let cre_img = document.createElement("img");
                            cre_img.src = URL.createObjectURL(sel_img.files[index]);
                            cre_img.style.width = "250px";
                            cre_img.classList.add("m-2");
                            show_img.appendChild(cre_img);

                        }
                    });

                    // Show Add Slider Form
                    $(document).on("click","#addshow",function(){
                        $("#addslider").show();
                        $("#editslider").hide();
                    });

                    // Hide Add Slider Form
                    $(document).on("click","#addclose",function(){
                        $("#addslider").hide();
                    });
                    
                    // Add Slider
                    $(document).on("click","#add_brand_btn",function(){
                        let form_data = new FormData($("#add_slider_form")[0]);
                        $.ajax({
                            url: 'add_slider.php',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'POST',
                            success: function(data) {
                                if (data === "success") {
                                    alert("Slider Successfully Inserted");
                                    load_slider();
                                } else {
                                    alert(data);
                                }
                            }
                        });
                    });
                    // Show Edit Slider Form
                    $(document).on("click","#editshow",function(){
                        $("#editslider").show();
                        $("#addslider").hide();
                    });
                    // Hide Edit Slider Form
                    $(document).on("click","#editclose",function(){
                        $("#editslider").hide();
                    });
                    // Show Product Image In Edit Form
                    // const sel_img_edit = document.querySelector("#image_input_field_edit");
                    const particular_img_tag = document.querySelector("#edit-show-slider-img");

                    const showImageFunc = (p_image) => {
                        console.log(p_image);
                        let edit_show_image = document.querySelector("#edit-show-slider-img");
                        edit_show_image.src = p_image;
                        edit_show_image.style.width = "150px";
                        edit_show_image.classList.add("m-2");

                        const sel_img = document.querySelector("#image_input_field_edit");
                        const show_img = document.querySelector("#show-slider-img-edit");

                        sel_img.addEventListener("change", () => {
                            particular_img_tag.classList.add("d-none");
                            console.log(sel_img.files);

                            // Clear existing images from the show_img container
                            show_img.innerHTML = '';

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
                    // Set Data In Edit Slider Form
                    $(document).on("click",".edit-btn",function(){
                        const s_id = $(this).data('s-id');
                        const s_title = $(this).data('s-title');
                        const s_desc = $(this).data('s-desc');
                        const s_link_url = $(this).data('link-url');
                        const s_image = "./img/slider_img/"+$(this).data('s-img');
                        showImageFunc(s_image);
                        $("#editslider").show();
                        $("#editslider input[name='s_id']").val(s_id);
                        $("#editslider input[name='stitle']").val(s_title);
                        $("#editslider input[name='slinkurl']").val(s_link_url);
                        $("#editslider input[name='sdesc']").val(s_desc);
                    });
                    // Edit Slider
                    $(document).on("click","#upd_slider_btn",function(){
                        let form_data = new FormData($("#edit_slider_form")[0]);
                        $.ajax({
                            url: 'edit_slider.php',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'POST',

                            success: function(data) {
                                if (data === "success") {
                                    alert("Product Successfully Updated");
                                    load_product();
                                } else {
                                    alert(data);
                                }
                            }
                        });
                    });
                    // Delete Slider 
                    $(document).on("click","#slider_del_btn",function(){
                        let s_id = $(this).data("s-id");
                        $.ajax({
                            type: "POST",
                            url: "delete_slider.php",
                            data: {
                                s_id:s_id
                            },
                            success: function(data){
                                if(data === "success"){
                                    alert('Successfully Delete Slider.');
                                    load_slider();
                                }
                                else{
                                    alert(data);
                                }
                            }   
                        });
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