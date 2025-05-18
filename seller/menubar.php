<!-- Topbar Start -->
<div class="container-fluid">
    <div class="container-fuild row d-flex justify-content-around align-items-center bg-dark bg-gradient py-3 px-xl-5">
        <div class="col-lg-4 col-sm-4 col-4 text-center text-xl-start">
            <a href="index.php" class="text-decoration-none text-warning">
            <i class="fs-1 fas fa-store me-2"></i>
            <b class="fs-2 mt-0 pt-0 d-none d-md-inline d-lg-inline fw-bold">VECOM<i class="fs-5">.Seller</i></b>
                <!-- <h1 class="text-warning-emphasis m-0 display-5 font-weight-semi-bold"><span class="text-warning-emphasis font-weight-bold border px-3 mr-1"></span> multi-vendor </h1>  -->
                <!-- <img src="img/newlogo2.png" alt="logo" class="w-50" style="height: 80px;"> -->
            </a>
        </div>
        <div class="col-lg-4 col-sm-4 col-4 text-center">
            <div class="px-1 d-none d-lg-inline text-decoration-none  hide-scrollbar d-flex justify-content-center align-items-center text-warning">
                    <a href="index.php" class="text-decoration-none text-warning fs-5 me-4">Home</a>
                    <a href="dashboard.php" class="text-decoration-none text-warning fs-5 me-4">Dashboard</a>
                    <a href="contact.php" class="text-decoration-none text-warning fs-5">Contact Us</a>
            </div>
            <div class="dropdown d-xs-inline d-lg-none d-xl-none">
            <button class="btn dropdown-toggle text-warning" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                <a href="index.php" class="dropdown-item text-decoration-none text-warning">Home</a>
                </li>
                <li>
                <a href="dashboard.php" class="dropdown-item text-decoration-none text-warning">Dashboard</a>
                </li>
                <li>
                <a href="contact.php" class="dropdown-item text-decoration-none text-warning">Contact Us</a>
                </li>
            </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-4 text-center text-xl-end dropdown-center sell_name">
                <?php
                    if (isset($_SESSION['seller'])) {
                        ?>
                        <a class="text-decoration-none text-warning rounded-5 border-0 dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="img/vendor_img/<?=$_SESSION['seller']['v_image']?>" alt="" width="10%" class=" rounded-5 m-0 p-0">
                            <span class="ps-2 fs-5 fw-semibold d-none d-md-inline d-sm-inline d-lg-inline"><?php echo $_SESSION['seller']['v_f_name']; ?></span>
                        </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="account.php">Your Account</a>
                                <a class="dropdown-item" href="#">Your Product</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout_vendor.php">Logout</a>
                            </div>
                        <?php 
                    } else {
                        ?>
                        <a class="text-warning text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <span class="p-2 fs-5 fw-semibold d-none d-md-inline d-sm-inline d-lg-inline">Account</span>
                        </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="sign_in_sell.php">Sign In</a>
                                <a class="dropdown-item" href="sign_up_sell.php">Sign Up</a>
                            </div>
                        <?php
                    }
                ?>
        </div>
    </div>  
</div>
<!-- <div class="container-fuild scrolling-navbar bg-dark py-2 mt-0 px-0">
    <div class="px-5 mx-5 hide-scrollbar d-flex justify-content-around align-items-center text-warning">
        
    </div>
</div> -->
<!-- Topbar End -->
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