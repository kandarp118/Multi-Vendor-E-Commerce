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
                            <h1 class="h3 text-gray-800 col-sm-6 p-0 m-0"> Category </h1>
                            <button type="button" id="addshow" class=" d-block d-lg-none d-sm-none btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i></button>
                        </div>

                        <button type="button" id="addshow" class="d-none d-sm-inline-block btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i> Add Category</button>
                    </div>

                    <!-- ADD CATEGORY -->
                    <div class="row justify-content-center" style="display: none;" id="addcategory">
                        <div class="col-xl-10 col-lg-12 col-md-9">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                                                </div>
                                                <form class="user needs-validation" method="POST" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" name="acnm" class="form-control form-control-user"
                                                            id="category_name"
                                                            placeholder= "Enter Category Name ..." autocomplete="off" required>
                                                    </div>
                                                    <div class="row justify-content-around mt-4">
                                                        <input type="button" id="addclose" value="Close" class="btn btn-danger btn-user col-5">
                                                        <input id="add_category_btn" type="submit" value="Save" name="add_cat" class="btn btn-success btn-user col-5">    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- UPDATE CATEGORY -->
                    <div class="row justify-content-center" style="display: none;" id="editcategory">
                        <div class="col-xl-10 col-lg-12 col-md-9">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Edit Product</h1>
                                                </div>
                                                <form class="user needs-validation" method="POST" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" id="cat_id" name="category_id" hidden>
                                                        <input type="text" id="cat_nm" name="category_name" class="form-control form-control-user"
                                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                                            placeholder="" autocomplete="off" required>
                                                    </div> 
                                                    <div class="row justify-content-around mt-4">
                                                        <input type="reset" id="editclose" value="Close" class="btn btn-danger btn-user col-5">
                                                        <input id="upd_category_btn" type="submit" value="Save" name="edit_cat" class="btn btn-success btn-user  col-5">    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CATEGORY TABLE -->
                    <div class="card shadow my-3" id="category_table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
                        </div>
                        <div class="card-body" id="show_category">
                            
                        </div>
                    </div>

                </div>
        <script>
            $(document).ready(function(){
                // Category
                    // Fetch Category Data
                    function load_category(){
                        $.ajax({
                            url:"fetch_category.php",
                            type:"POST",
                            success:function(data){
                                $("#show_category").html(data);
                            }
                        });
                    }
                    load_category();
                    // Show Add Category Form
                    $(document).on("click","#addshow",function(){
                        $("#addcategory").show();
                        $("#editcategory").hide();
                        // $("#category_table").hide();
                    });
                    // Hide Add Category Form
                    $(document).on("click","#addclose",function(){
                        $("#addcategory").hide();
                    });
                    // Add Category
                    $(document).on("click", "#add_category_btn", function(){
                        let cat_txt = $("#category_name").val();
                        $.ajax({
                            url:"add_category.php",
                            type: "POST",
                            data:{cat_txt: cat_txt},
                            success: function(result){
                                if(result === "success"){
                                    alert("Category Successfully Inserted");
                                    load_category();
                                }else {
                                    alert(result)
                                }
                            }
                        })
                    });
                    // Show Edit Categoery Form
                    $(document).on("click", "#editshow", function(){
                        $("#editcategory").show();
                        $("#addcategory").hide();
                        // $("#category_table").hide();
                    });
                    // Hide Edit Category Form
                    $(document).on("click","#editclose",function(){
                        $("#editcategory").hide();
                    });
                    // Set Data In Edit Category Form
                    $(document).on("click",".edit-btn",function(){
                        const categoryId = $(this).data('id');
                        const categoryName = $(this).data('name');
                        console.log(categoryId);
                        $("#editcategory").show();
                        $("#editcategory input[name='category_id']").val(categoryId);
                        $("#editcategory input[name='category_name']").val(categoryName);
                    });
                    //Edit category
                    $(document).on("click", "#upd_category_btn", function(){
                        let id = $("#cat_id").val();
                        let name = $("#cat_nm").val();
                        $.ajax({
                            url:"edit_category.php",
                            type: "POST",
                            data:{
                                c_id: id,
                                c_nm: name
                            },
                            success: function(result){
                                console.log(result);
                                if(result === "success"){
                                    alert("Update category success");
                                    load_category();
                                } else {
                                    alert("Faild to update category");
                                }
                            }
                        })
                    });
                    // Delete Category 
                    $(document).on("click", "#category_del_btn", function(){
                        let cid = $(this).data("id");
                        $.ajax({
                            url:"delete_category.php",
                            type: "POST",
                            data:{c_id: cid},
                            success: function(result){
                                console.log(result);
                                if(result === "success"){
                                    alert("Delete success");
                                    load_category();
                                } else {
                                    alert("Faild to delete category");
                                }
                            }
                        })
                    });
            });
        </script>
        <!-- <script src="all.js"></script> -->
<?php
    include("footer.php");
    } else {
        echo "
        <script type='text/javascript'>
            window.location='admin-login.php';
        </script>"; 
   }
    
?>