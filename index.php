<?php
    include("connection.php");
    include("header.php");
    include("menubar.php");
?>
<div class="container-fuild">


    <!-- image slider start -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
        <?php
                $sel_slider = "SELECT * FROM slider";
                $sel_ans = mysqli_query($c,$sel_slider);
                $s = "active";
                while ($fs=mysqli_fetch_array($sel_ans)) {
            ?>
            <div class="carousel-item <?= $s ?>">
            <img src="admin/img/slider_img/<?= $fs['s_image'] ?>" class="d-block w-100" alt="...">
            </div>
            <?php
            $s='';
                }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- image slider end -->

    <!-- Featured Start -->
    <div class="container-fluid pt-3 mt-4">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex justify-content-center align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-warning m-0 me-3"></h1>
                    <h5 class="font-weight-semi-bold m-0"> Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex justify-content-center align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-warning m-0 me-3"></h1>
                    <h5 class="font-weight-semi-bold m-0"> Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex justify-content-center align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-warning m-0 me-3"></h1>
                    <h5 class="font-weight-semi-bold m-0"> Fast Delivery</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex justify-content-center align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-warning m-0 me-3"></h1>
                    <h5 class="font-weight-semi-bold m-0"> 24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Products Start -->
    <div class="container-fluid pt-3 mb-3">
        <div class="text-center mb-5">
            <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php 
                $sel_pro_query = "SELECT * FROM product WHERE p_status='1'";
                $sel_pro_ans = mysqli_query($c,$sel_pro_query);
                
                while($fp=mysqli_fetch_array($sel_pro_ans)){
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1 mb-4">
                        <div class="card shadow product-item border-0 mb-4 py-3 h-100">
                            <div class="card-header align-middle text-center product-img border-0 position-relative overflow-hidden bg-transparent border">
                                <img class="w-75 h-100" src="<?php echo "./admin/img/pro_img/"."$fp[2]"; ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 p-3">
                                <h6 class="fs-5 my-3"><?PHP echo "$fp[1]"; ?></h6>
                                <div class="d-flex justify-content-center">
                                <h4>&#8377;<?PHP echo "$fp[9]".".00"; ?></h4></p>
                                <!-- <h6 class="m-2">M.R.P: <del><?PHP echo "$fp[4]"; ?></del></h6> -->
                                </div>
                                <div class="d-flex justify-content-center">
                                <!-- <p class="m-0"> <h5 class="mt-1"><sup>$</sup></h5> <h4><?PHP echo "$fp[5]".".00"; ?></h4></p> -->
                                <h6 class="">M.R.P: <del>&#8377;<?PHP echo "$fp[8]"; ?></del></h6>
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
                                    <input type="hidden" name="p_id" value="<?= $fp['p_id']?>">
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
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
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
</div>
<?php
    include("footer.php");
?>