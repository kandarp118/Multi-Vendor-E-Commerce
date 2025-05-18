<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");


?>
<!-- Cart Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- <div>
                <h1 class="text-center mb-5">
                    Shopping Cart
                </h1>
                <hr>
            </div> -->
            <?php
                if (isset($_SESSION['user'])) 
                {
            ?>
            <div id="show_cart"></div>
            
            <?php
                } 
                else {
            ?>
            <h1 class="fs-1 fw-bold">Shopping Cart</h1>
            <hr>
            <div class="card col-lg-12 shadow border-0 p-5 mb-5">
                <div>
                    <h3 class="font-weight-bolder">Your V.COM  Cart is empty.</h3>
                    <h5>Shop Now ...</h5>
                </div>
                <div class="mt-5">
                    <a href="sign_in.php" class="btn btn-warning rounded-pill">Sign in to your account</a>
                    <a href="sign_up.php" class="btn btn-outline-warning rounded-pill">Sign Up now</a>
                </div>
            </div>
            <?php
                }  
            ?> 
        </div>
    </div>
</div>
<!-- Cart End -->

<script>
    $(document).ready(function(){
        function load_cart() {
            $.ajax({
                url: "fetch_cart.php",
                type: "POST",
                success: function(data) {
                    $("#show_cart").html(data);
                }
            });
        }
        load_cart();
        // change quantity
        $(document).on("change","#pro_qun_upd",function(){
            let sel_qun = $(this).val();
            let cart_id = $(this).data("cart_id");
            let p_id = $(this).data("p_id");
            $.ajax({
                url: "upd_qun_cart.php",
                type: "POST",
                data: {
                    cart_id:cart_id,
                    p_id:p_id,
                    sel_qun:sel_qun
                },
                success: function(data){
                    console.log(data);
                    if (data = "success") {
                        // location.reload();
                        // alert(data);
                        load_cart();
                    } else {
                        alert(data);
                    }
                }
            });
        });
        //remove cart product
        $(document).on("click","#removeCartBtn",function(){
            let cart_id = $(this).data('cart_id');
            $.ajax({
                url: "remove_cart.php",
                type: "POST",
                data: {
                    cart_id:cart_id
                },
                success: function(data){
                    if (data === "success") {
                        load_cart();
                        $("#cart_num").load(location.href + " #cart_num");
                    } else {
                        alert(data);
                    }
                }
            });
        });
    });
</script>
<?php 
    include("footer.php");
?>