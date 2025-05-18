<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
    // session_start();
    if (isset($_SESSION['seller'])) {
    
?>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row mb-3">
            <h1 class="fs-1 fw-bold">Dashboard</h1>
            <hr>
        </div>
        <div class="row mt-5">
            <!-- product -->
            <a href="sell_pro.php" class="col-xl-6 col-md-6 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md fw-bold text-warning text-uppercase mb-1">
                                Products
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_product="SELECT * FROM product WHERE p_author='".$_SESSION['seller']['v_id']."'";
                                    $select_product_ans=mysqli_query($c,$select_product);
                                    $total_product=mysqli_num_rows($select_product_ans);
                                    echo "$total_product";
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-table fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
            <!-- order -->
            <a href="order.php" class="col-xl-6 col-md-6 mb-4 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md fw-bold text-warning text-uppercase mb-1">
                                Orders
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_order="SELECT * FROM order_master";
                                    $select_order_ans=mysqli_query($c,$select_order);
                                    $total_order=mysqli_num_rows($select_order_ans);
                                    echo "$total_order";
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-table fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php
    }
    else{
        ?>
        <script>
            alert("Sign In Now !");
            window.location.href="sign_in_sell.php";
        </script>
        <?php
    }
    include("footer.php");
?>