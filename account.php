<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
?>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row mb-3">
            <h1 class="fs-1 fw-bold">Your Account</h1>
            <hr>
        </div>
        <div class="row">
            <!-- profile -->
            <a href="user_profile.php" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-12 text-center">
                                <i class="fas fa-user fs-1 my-2"></i>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="fs-3 fw-bold text-warning my-2">
                                    Your Profile
                                </div>
                                <!-- <div class="fs-6 mb-0 font-weight-bold text-gray-800">
                                    Edit Login, Name, and mobile number
                                </div> -->
                            </div>
                            
                        </div>
                    </div>
                </div>
            </a>
            <!-- order -->
            <a href="order.php" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-12 text-center">
                                <i class="fas fa-dolly-flatbed fs-1 my-2"></i>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="fs-3 fw-bold text-warning my-2">
                                    Your Orders
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </a>
            <!-- cart -->
            <a href="cart.php" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-12 text-center">
                                <i class="fas fa-cart-plus fs-1 my-2"></i>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="fs-3 fw-bold text-warning my-2">
                                    Your Cart
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </a> 
            <!-- wishlist -->
            <!-- <a href="#" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                        <div class="row justify-content-center d-flex no-gutters">
                            <div class="col-lg-12 text-center">
                                <img src="img/download.png" alt="" width="13%" class="my-2">
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="fs-3 fw-bold text-warning my-2">
                                    Your Wishlist
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </a> -->
            
            <!-- address -->
            <!-- <a href="#" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-12 text-center">
                                <i class="fas fa-map-marker-alt fs-1 my-2"></i>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="fs-3 fw-bold text-warning my-2">
                                    Your Address
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a> -->
            <!-- business -->
            <a href="seller/index.php" target="_blank" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-12 text-center">
                                <i class="fas fa-store fs-1 my-2"></i>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="fs-3 fw-bold text-warning my-2">
                                    Business Account
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </a>
            <!-- contact -->
            <a href="contact.php" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
                <div class="card border-0 shadow py-2"  onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='white'">
                    <div class="card-body">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-12 text-center">
                                <i class="fas fa-headset fs-1 my-2"></i>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="fs-3 fw-bold text-warning my-2">
                                    Contact Us
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?>