<style>
    .scrolling-navbar {
        overflow-x: auto;
        white-space: nowrap; /* Ensures items stay on one line */
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .hide-scrollbar::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }

    .hide-scrollbar a {
        padding: 0 15px;
        color: inherit;
        text-decoration: none;
    }

</style>
    <!-- Topbar Start -->
        <div class="container-fuild sticky-top d-flex justify-content-around align-items-center bg-dark bg-gradient py-3 px-xl-5">
            <div class="col-lg-3 col-sm-3 col-3 text-center text-xl-start">
                <a href="index.php" class="text-decoration-none text-warning">
                    <i class="fs-1 fas fa-luggage-cart"></i> <b class="ms-2 fs-2 d-none d-md-inline d-lg-inline fw-bold">VECOM</b>
                    <!-- <h1 class="text-warning m-0 display-5 font-weight-semi-bold"><span class="text-warning font-weight-bold border px-3 mr-1"></span> multi-vendor </h1>  -->
                    <!-- <img src="img/newlogo2.png" alt="logo" class="w-50" style="height: 80px;"> -->
                </a>
                
            </div>
            <div class="col-lg-4 col-sm-4 col-4 text-center">
                <form action="" class="d-none d-sm-inline d-lg-inline">
                    <div class="input-group">
                        <div class="input-group flex-nowrap">
                            <input type="text" id="search" class="dropdown-toggle border-warning form-control" placeholder="Search ..." aria-label="Username" aria-describedby="addon-wrapping" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" autocomplete="off">
                            <div id="display" class="dropdown-menu w-100 " aria-labelledby="dropdownMenuLink">
                                <?php
                                include("connection.php");
                                // $n=$_POST['search'];
                                $sq="SELECT p_id,p_name FROM product";
                                $sqr=mysqli_query($c,$sq);
                                while ($fr = mysqli_fetch_array($sqr)) {
                                ?>
                                <a class="dropdown-item text-center text-truncate" style="max-width: 420px;" href="detail.php?p_id=<?= $fr['p_id'] ?>"><?= $fr['p_name'] ?></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div> 
                    </div>
                </form>
                <div class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle text-center" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="text-warning fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" id="search" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-5 col-5 text-center text-xl-end">
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <a class="text-decoration-none text-warning rounded-5 border-0 dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fs-5 fas fa-user-circle"></i>
                        <span class="p-2 fs-5 fw-semibold d-none d-sm-none d-lg-inline"><?php echo $_SESSION['user']['c_first_name']; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="account.php">Your Account</a>
                        <a class="dropdown-item" href="user_profile.php">Your Profile</a>
                        <a class="dropdown-item" href="order.php">Your Order</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout_customer.php">Logout</a>
                    </div>
                <?php
                } else {
                ?>
                    <a class="text-warning text-decoration-none dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="p-2 fs-5 fw-semibold d-none d-sm-none d-lg-inline">Account</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="sign_in.php">Sign In</a>
                        <a class="dropdown-item" href="sign_up.php">Sign Up</a>
                        <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                <?php
                }

                ?>
                <a href="cart.php" id="cart_num" class="text-decoration-none p-3">
                    <i class="fas fa-shopping-cart text-warning position-relative">
                        <span class="position-absolute p-1 top-0 mx-1 start-25 translate-middle badge rounded-pill bg-danger">
                            <?php
                            
                            if (isset($_SESSION['user'])) {
                                $sel_cart_query = "SELECT * FROM cart WHERE c_id='" . $_SESSION['user']['c_id'] . "'";
                                $sel_cart_ans = mysqli_query($c, $sel_cart_query);
                                $cart_num = mysqli_num_rows($sel_cart_ans);
                                echo $cart_num; 

                            } else {
                                $cart_num = 0;
                                echo $cart_num; 

                            }
                            ?>
                            <span class="visually-hidden ml-2">unread messages</span>
                    </i>
                    <b class="text-warning mx-2 fs-5 fw-semibold d-none d-sm-none d-lg-inline">Cart</b>
                </a>
                <a href="seller/index.php" target="_blank" class="text-decoration-none text-warning"><i class="fas fa-store-alt"></i><b class="fs-5 fw-semibold d-none d-sm-none d-lg-inline"> Become a seller</b> </a>
            </div>
        </div>
        <div class="container-fuild scrolling-navbar bg-dark py-2 mt-0 px-0">
            <div class="px-1 hide-scrollbar d-flex justify-content-around align-items-center text-warning">
                <a href="index.php">Home</a>
                <a href="shop.php">All</a>
                <?php
                    include("connection.php");
                    $sel_category="SELECT * FROM category";
                    $sel_cat_ans=mysqli_query($c,$sel_category);
                    while($fcat=mysqli_fetch_array($sel_cat_ans)){
                ?>
                <form action="shop.php" method="POST" class="p-0 m-0">
                    <input type="hidden" name="cat_id" value="<?php echo $fcat['ca_id']; ?>">
                    <button type="submit" class=" btn border-0 text-warning">
                        <!-- <i class="fas fa-eye mr-1"></i> -->
                        <?php echo $fcat['ca_name']; ?>
                    </button>
                </form>
                <?php
                    }
                ?>
                <!-- Add more items as needed -->
            </div>
        </div>


    <!-- </div> -->

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <!-- <div class="container-fluid">
        <div class="row px-xl-5 bg-dark">
            <!-- <div class="col-lg-3 d-none d-lg-block">
                <a class="btn btn-md h-75 px-4 shadow-none d-flex align-items-center justify-content-between bg-warning text-white w-100" data-toggle="collapse" href="#navbar-vertical">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="px-2 navbar-nav w-100 overflow-hidden h-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">demo</a>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div> -->
    <!--<div class="col-lg-12">
                <nav class="navbar navbar-light navbar-expand-lg py-2 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                    <i class="fas fa-luggage-cart"></i>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <!--
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link text-warning">Home</a>
                            <!-- <a href="shop.html" class="nav-item nav-link">Shop</a> -->
    <!-- <a href="detail.php" class="nav-item nav-link">Detail</a>                       -->
    <!-- <a href="about.php" class="nav-item nav-link">About Us</a>
                            <a href="contact.php" class="nav-item nav-link">Contact US</a>
                        </div> -->
    <!-- <div class="navbar-nav ml-auto py-0">
                            <a href="sign_in.php" class="nav-item nav-link">Login</a>
                            <a href="sign_up.php" class="nav-item nav-link">Register</a>
                        </div> -->
    <!-- </div>
                </nav> -->
    <!-- </div>
        </div>
    </div> -->

    <!-- Navbar End -->
<script>
    function focustext() {
        const element = document.querySelector('#search');
        element.addEventListener('focus', function() {
            element.style.boxShadow = '0 0 0 .2rem rgba(255, 193, 7, .5)';
        });
    }
    const element = document.querySelector('#search');
    element.addEventListener('focus', function() {
        element.style.boxShadow = '0 0 0 .2rem rgba(255, 193, 7, .5)';
    });
    element.addEventListener('blur', function() {
        element.style.boxShadow = '0 0 0 0';
    });
    
    function fill(Value) {
    $('#search').val(Value);
    }
    $(document).ready(function() {
    $("#search").keyup(function() {
        var name = $('#search').val();
        if (name == "") {
        }
        else {
            $("#display").hide();
            $.ajax({
                type: "POST",
                url: "search.php",
                data: {
                    search: name
                },
                success: function(data) {
                    $("#display").html(data).show();
                }
            });
        }
    });
    });
</script>