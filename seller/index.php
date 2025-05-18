<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
?>
  <!-- Page Header Start -->
  <div class="container-fluid mb-5">
        <div class="row justify-content-center align-items-start justify-content-center p-5 m-0" style="min-height: 200px">
            <div class="col-lg-9 col-sm-6" id="demo">
                <h1 class="fw-bold mb-3">Sell Online with Multi Vendor</h1>
                <?php
                    if (isset($_SESSION['seller'])) {
                        $sel_ven = "SELECT v_status FROM vendor WHERE v_id='".$_SESSION['seller']['v_id']."'";
                        $sel_ven_ans = mysqli_query($c,$sel_ven);
                        $fv = mysqli_fetch_array($sel_ven_ans);
                        if ($fv['v_status'] == NULL){
                            ?>  <button type="button" id="pending" class="btn btn-lg btn-outline-warning fw-bold">Waiting Form Approvel ... 
                                <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span> </button>
                            <?php
                        }
                        else if ($fv['v_status'] == 0) {
                            ?>
                                <p>Your Account was Rejected ...</p>
                                <a href="sign_up_sell.php">Sign Up Again ..</a>  
                            <?php
                        } else if ($fv['v_status'] == 1){
                            ?>
                                <a href="dashboard.php" class="btn btn-outline-warning btn-lg fw-bold">Sell Now</a>
                            <?php
                        } else {
                            
                        }
                    } else {
                    ?>
                        <a href="sign_in_sell.php" class="btn btn-outline-warning btn-lg fw-bold" onload="myFunction()">Sign in now</a>
                    <?php
                    }    
                ?>
            </div>
            <div class="col-lg-3 col-sm-6 mt-5 text-center">
                <img src="./img/seller_img.png" alt="" class="image-fuild w-75">
            </div>
        </div>
    </div>
    <!-- Page Header End -->  

    <div class="container top-0 mb-5 mt-0">
        <div class="card shadow-lg p-5">
        <h1 class="text-center mb-4">How to sell on Multi Vendor ?</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card p-2 mb-3">
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- <img src="https://i.imgur.com/6u5vT60.png" class="img-fluid rounded-circle" alt="Phone" style="width: 150px; height: 150px;"> -->
                        <h5 class="card-title mt-3">STEP 1: Register your account</h5>
                        <p class="card-text">Register on multi-vendor with GST/PAN details and an active bank account</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-2 mb-3">
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- <img src="https://i.imgur.com/hR3O07M.png" class="img-fluid rounded-circle" alt="Package" style="width: 150px; height: 150px;"> -->
                        <h5 class="card-title mt-3">STEP 2: Choose storage & shipping</h5>
                        <p class="card-text">Choose storage, packaging, and delivery options</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-2 mb-3">
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- <img src="https://i.imgur.com/i9n30r1.png" class="img-fluid rounded-circle" alt="Laptop" style="width: 150px; height: 150px;"> -->
                        <h5 class="card-title mt-3">STEP 3: List your products</h5>
                        <p class="card-text">List your products by providing product and brand details</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-2 mb-3">
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- <img src="https://i.imgur.com/t1U509L.png" class="img-fluid rounded-circle" alt="Phone" style="width: 150px; height: 150px;"> -->
                        <h5 class="card-title mt-3">STEP 4: Complete orders & get paid</h5>
                        <p class="card-text">Deliver orders to customers on time and get paid within 7 days of delivery</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div id="get">
            <?php 
                    if(isset($_SESSION['status_admin_sell']))
                    {
                        if($_SESSION['status_admin_sell'] == "approve_seller".$_SESSION['seller']['v_id'])
                        {
                            echo "<input type='hidden' value='app' id='status_admin'>";
                            unset($_SESSION['status_admin_sell']);
                        }
                        if ($_SESSION['status_admin_sell'] == "reject_seller".$_SESSION['seller']['v_id'])
                        {
                            echo "<input type='hidden' value='rej' id='status_admin'>";
                            unset($_SESSION['status_admin_sell']);
                        }
                    }  
                ?>
            </div>
<script>
    $(document).ready(function() {
            // Fetch Product Data

        $(document).on("click","#pending",function(){
            Swal.fire({                                
                title: "Waiting For Approval ...",
                icon: "info"
            });
        }); 

            setInterval(function(){
                var name =  $('#status_admin').val();
                if(name == "app")
                {
                    Swal.fire({
                        title: "Successfully Approved !",
                        icon: "success"
                    });
                    $('#status_admin').val("");  
                    load_vendor();
                }   
                if(name == "rej")
                {
                    Swal.fire({
                        title: "Your account rejected",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sign Up"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            // window.location.reload();
                            window.location.href = "logout_vendor.php";
                        }
                        });
                    $('#status_admin').val("");  
                }
            },500);

            setInterval(function(){
                $('#get').load(' #get');
            },1000);

            function load_vendor() {
                $('#demo').load(' #demo');
            }
        });
</script>
<?php
    include("footer.php");
?>