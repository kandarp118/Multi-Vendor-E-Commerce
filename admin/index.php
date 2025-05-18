<?php
    session_start();
    if (isset($_SESSION['aunm'])) 
    {
        include("connection.php");
        include("header.php");
        include("sidebar.php");
        include("topbar.php");
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <button type="button" class="d-none d-sm-inline-block btn btn-md btn-warning shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button> -->
    </div>

    <div class="row">
        <!-- Product -->
        <a href="product.php" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Products
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_product="SELECT * FROM product";
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
        <!-- Brand -->
        <a href="brand.php" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Brand
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_brand="SELECT * FROM brand";
                                    $select_brand_ans=mysqli_query($c,$select_brand);
                                    $total_brand=mysqli_num_rows($select_brand_ans);
                                    echo "$total_brand";
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
        <!-- Category -->
        <a href="category.php" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Category
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_category="SELECT * FROM category";
                                    $select_category_ans=mysqli_query($c,$select_category);
                                    $total_category=mysqli_num_rows($select_category_ans);
                                    echo "$total_category";
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
        <!-- Vendor -->
        <a href="vendor.php" class="col-xl-6 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Vendor
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_vendor="SELECT * FROM vendor";
                                    $select_vendor_ans=mysqli_query($c,$select_vendor);
                                    $total_vendor=mysqli_num_rows($select_vendor_ans);
                                    echo "$total_vendor";
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
        <!-- Customer -->
        <a href="customer.php" class="col-xl-6 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Customer
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_customer="SELECT * FROM customer";
                                    $select_customer_ans=mysqli_query($c,$select_customer);
                                    $total_customer=mysqli_num_rows($select_customer_ans);
                                    echo "$total_customer";
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
        <!-- Cart -->
        <a href="#" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Total Cart product
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_cart="SELECT * FROM cart";
                                    $select_cart_ans=mysqli_query($c,$select_cart);
                                    $total_cart=mysqli_num_rows($select_cart_ans);
                                    echo "$total_cart";
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
        <!-- Order -->
        <a href="order.php" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Total Order product
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
        <!-- Payment -->
        <a href="#" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Total Payment
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $select_payment="SELECT * FROM order_master";
                                    $select_payment_ans=mysqli_query($c,$select_payment);
                                    $total = 0;
                                    while ($fpay=mysqli_fetch_array($select_payment_ans)) {
                                        $total += $fpay['p_total'];
                                    }
                                    echo "$total";
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
<?php
    include("footer.php");
    } else {
        echo "
        <script type='text/javascript'>
            window.location='admin-login.php';
        </script>"; 
   }
?>