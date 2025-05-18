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
                            <h1 class="h3 text-gray-800 col-sm-6 p-0 m-0"> TaxRate </h1>
                            <button type="button" id="addshow" class=" d-block d-lg-none d-sm-none btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i></button>
                        </div>

                        <button type="button" id="addshow" class="d-none d-sm-inline-block btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i> Add TaxRate</button>
                    </div>

                    <!-- ADD BRAND -->
                    <div class="row justify-content-center" style="display: none;" id="addtax">
                        <div class="col-xl-6 col-lg-6 col-md-9">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Add TaxRate</h1>
                                                </div>
                                                <form class="user needs-validation" method="POST" novalidate>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" name="abnm" class="form-control form-control-user" id="tax_rate" placeholder="Enter Tax Rate ( in 0.25 formet ) " autocomplete="off" required>
                                                        </div>
                                                        <!-- <div class="col-sm-6">
                                                        <?php
                                                            // $sc="select * from category";
                                                            // $scqr=mysqli_query($c,$sc);
                                                            
                                                            ?>
                                                            <select name="acid" class="form-control " id="category_id" style="border-radius: 25px 25px;padding: 5px 12px;font-size: 0.8rem;height: 50px; -webkit-appearance: none;" required>
                                                                <option value="">Select Category</option>
                                                                <?php
                                                                // while($cf=mysqli_fetch_array($scqr)){
                                                                //     ?>  
                                                                //     <option value="<?php echo $cf[0] ?>"><?php echo $cf[1] ?></option>
                                                                //     <?php
                                                                // }
                                                                // ?>
                                                            </select>
                                                        </div> -->
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

                    <!-- UPDATE BRAND -->
                    <div class="row justify-content-center" style="display: none;" id="edittax">
                        <div class="col-xl-6 col-lg-6 col-md-9">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Edit TaxRate</h1>
                                                </div>
                                                <form class="user needs-validation" method="POST" novalidate>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <input type="text" id="u_tax_id" name="tax_id" hidden>
                                                            <input type="text" id="u_tax_rate" name="tax_rate" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Brand Name ..." autocomplete="off" required>
                                                        </div>
                                                        <!-- <div class="col-sm-6">
                                                        <?php
                                                            // $sc="select * from category";
                                                            // $scqr=mysqli_query($c,$sc);
                                                            
                                                            ?>
                                                            <select class="form-control" id="u_c_id" name="brand_category" style="border-radius: 25px 25px;padding: 5px 12px;font-size: 0.8rem;height: 50px; -webkit-appearance: none;" required>
                                                                <option value="">Select Category</option>
                                                                <?php
                                                                    // while($cf=mysqli_fetch_array($scqr)){
                                                                ?>
                                                                    <option name="brand_category" value="<?php // echo $cf[0] ?>" selected><?php // echo $cf[1] ?></option>
                                                                <?php
                                                                    // }
                                                                ?>
                                                            </select>
                                                        </div> -->
                                                    </div>
                                                    <div class="row justify-content-around mt-4">
                                                        <input type="button" id="editclose" value="Close" class="btn btn-danger btn-user col-5">
                                                        <input type="submit" id="update_tax_btn" value="Save" name="edit_brand" class="btn btn-success btn-user  col-5">    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BRAND TABLE -->
                    <div class="card shadow my-3" id="brand_table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TaxRate Table</h6>
                        </div>
                        <div class="card-body" id="show_tax">
                            
                        </div>
                    </div>



                </div>
        <script>
            $(document).ready(function(){
                // Brand 
                    // Fetch Brand Data
                    function load_tax(){
                        $.ajax({
                            url:"fetch_tax.php",
                            type:"POST",
                            success:function(data){
                                $("#show_tax").html(data);
                            }
                        });
                    }
                    load_tax();
                    // Show Add Brand Form
                    $(document).on("click","#addshow",function(){
                        $("#addtax").show();
                        $("#edittax").hide();
                    });
                    // Hide Add Brand Form
                    $(document).on("click","#addclose",function(){
                        $("#addtax").hide();
                    });
                    // Add Brand
                    $(document).on("click","#add_brand_btn",function(){
                        let tax_rate = $("#tax_rate").val();
                        // let cat_id = $("#category_id").val();
                        $.ajax({
                            url:"add_tax.php",
                            type:"POST",
                            data:{tax_rate:tax_rate},
                            success: function(result){
                                if(result === "success"){
                                    alert("TaxRate Successfully Inserted");
                                    load_tax();
                                }else {
                                    alert(result)
                                }
                            }
                        });
                    });
                    // Show Edit Brand Form
                    $(document).on("click","#editshow",function(){
                        $("#edittax").show();
                        $("#addtax").hide();
                    });
                    // Hide Edit Brand Form
                    $(document).on("click","#editclose",function(){
                        $("#edittax").hide();
                    });
                    // Set Data In Edit Category Form
                    $(document).on("click",".edit-btn",function(){
                        const TaxId = $(this).data('id');
                        const TaxRate = $(this).data('rate');
                        // const brandName = $(this).data('name');
                        $("#edittax").show();
                        $("#edittax input[name='tax_id']").val(TaxId);
                        // $("#edittax select[name='brand_category']").val(brandCategory);
                        $("#edittax input[name='tax_rate']").val(TaxRate);
                    });
                    // Edit Brand
                    $(document).on("click","#update_tax_btn",function(){
                        let u_tax_id = $("#u_tax_id").val();
                        let u_tax_rate = $("#u_tax_rate").val();
                        // let u_c_id = $("#u_c_id").val();
                        $.ajax({
                            url:"edit_tax.php",
                            type:"POST",
                            data:{
                                u_tax_id:u_tax_id,
                                u_tax_rate:u_tax_rate,
                            },
                            success: function(result){
                                console.log(result);
                                if(result === "success"){
                                    alert("Update TaxRate success");
                                    load_tax();
                                } else {
                                    alert("Faild to update TaxRate");
                                }
                            }
                        });
                    });
                    // Delete Brand 
                    $(document).on("click","#tax_del_btn",function(){
                        let tax_id = $(this).data("id");
                        $.ajax({
                            type: "POST",
                            url: "delete_tax.php",
                            data: {
                                tax_id: tax_id
                            },
                            success: function(data){
                                if(data == 1){
                                    alert('Successfully Delete TaxRate.');
                                    load_tax();
                                }
                                else{
                                    alert('Delete TaxRate Error.');
                                }
                            }   
                        });
                    });
                $('#deletebrand').on("click", function(){
                    
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