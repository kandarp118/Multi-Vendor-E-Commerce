<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
?>
<!-- Page Header Start -->
<!-- <div class="container-fluid bg-warning mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div> -->
<!-- Page Header End -->

<!-- Products Start -->
<div class="container-fluid pt-5 bg-light">
    <!-- <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
    </div> -->
    <div class="row px-xl-5 pb-3">
        <?php 
            if (isset($_POST['cat_id'])) {
                $ca_id=$_POST['cat_id'];
                $sel_pro_query = "SELECT * FROM product WHERE ca_id='$ca_id' AND p_status='1'";
            } else {
                $sel_pro_query = "SELECT * FROM product WHERE p_status='1'";
            }
            
            $sel_pro_ans = mysqli_query($c,$sel_pro_query);
            
            while($fp=mysqli_fetch_array($sel_pro_ans)){
                // $encrypted_id = encrypt($fp[0]); // Encrypt the product ID
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1 mb-4">
                    <div class="card shadow product-item border-0 mb-4 py-3 h-100">
                        <div class="card-header align-middle text-center product-img border-0 position-relative overflow-hidden bg-transparent border">
                            <img class="w-75 h-100" src="<?php echo "./admin/img/pro_img/"."$fp[2]"; ?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 p-3">
                            <h6 class="fs-6  my-3"><?PHP echo "$fp[1]"; ?></h6>
                            <div class="d-flex mt-4 text-muted justify-content-center">
                            <h4 class="fs-4">₹<?PHP echo "$fp[9]".".00"; ?></h4></p>
                            </div>
                            <div class="d-flex text-muted justify-content-center">
                            <h6 class="fs-6">M.R.P: <del>₹<?PHP echo "$fp[8]"; ?></del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-around border-0 pt-1 pb-3">
                            <!-- Add to Cart Button -->
                            <form id="addToCartForm_<?php echo $fp['p_id']; ?>" method="post" class="p-0 m-0">
                                    <input type="hidden" name="p_id" value="<?= $fp['p_id'] ?>">
                                    <input type="hidden" name="p_qun" value="1">
                                    <button type="button" id="addToCartBtn" class="btn btn-warning rounded-5 text-white" data-product-id="<?php echo $fp['p_id']; ?>">
                                        <!-- <i class="fas fa-shopping-cart text-warning ml-1"></i> -->
                                        Add to Cart
                                    </button>
                                </form>
                            <!-- Use a form to submit the encrypted id via POST -->
                            <form action="detail.php" method="post" class="p-0 m-0">
                                <input type="hidden" name="p_id" value="<?= $fp['p_id'] ?>">
                                <button type="submit" class="btn btn-warning rounded-5 text-white">
                                    <!-- <i class="fas fa-eye mr-1"></i> -->
                                    View Product
                                </button>
                            </form>
                            <!-- <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-warning mr-1"></i>Add To Cart</a> -->
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
        
    </div>
</div>
<!-- Products End -->
<script>
        $(document).ready(function(){
            $(document).on("click", "#addToCartBtn", function(){
                let productId = $(this).data('product-id');
                let form = $("#addToCartForm_" + productId)[0];
                let form_data = new FormData(form);
                $.ajax({
                    url: "add_cart.php",
                    type: "POST",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data){
                        if (data === "success") {
                            Swal.fire({
                                title: "Add To Cart Successfully !",
                                icon: "info",
                                showCancelButton: true,
                                // confirmButtonColor: "#3085d6",
                                // cancelButtonColor: "#d33",
                                confirmButtonText: "Show You Cart"
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href="cart.php";
                                }
                            });
                            $("#cart_num").load(location.href + " #cart_num");
                        } else if (data === "incart"){
                            Swal.fire({
                                title: "Already In Cart !",
                                icon: "warning",
                                showCancelButton: true,
                                // confirmButtonColor: "#3085d6",
                                // cancelButtonColor: "#d33",
                                confirmButtonText: "Show You Cart"
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href="cart.php";
                                }
                            });
                        } else if (data === "signin"){
                            Swal.fire({
                                title: "Sign In Now !",
                                icon: "info",
                                showCancelButton: true,
                                // confirmButtonColor: "#3085d6",
                                // cancelButtonColor: "#d33",
                                confirmButtonText: "Sign In"
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href="sign_in.php";
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error !",
                                text: data,
                                icon: "error"
                            });
                        }
                    }
                });
            });
        });
     </script>
<?php
    include("footer.php");
?>