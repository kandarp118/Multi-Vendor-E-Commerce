<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
    // session_start();
?>
<div class="container-fluid py-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bold mb-0">Orders</h1>
            <!-- <a href="#" class="btn btn-lg btn-warning text-end" data-bs-toggle="modal" data-bs-target="#addProduct">Add Product</a> -->
        </div>
        <hr>
    </div>

    <!-- product table -->
    <div class="container-fluid px-5 py-3">
        <div class="">
            <div class="card border-0 shadow my-3" id="show_order">
                
            </div>
        </div>
    </div>

</div>
<div id="get">
<?php 
        if(isset($_SESSION['status_admin']))
        {
            if($_SESSION['status_admin'] == "approve".$_SESSION['seller']['v_id'])
            {
                echo "<input type='hidden' value='app' id='status_admin'>";
                unset($_SESSION['status_admin']);
            }
            if ($_SESSION['status_admin'] == "reject".$_SESSION['seller']['v_id'])
            {
                echo "<input type='hidden' value='rej' id='status_admin'>";
                unset($_SESSION['status_admin']);
            }
            if ($_SESSION['status_admin'] == "delete".$_SESSION['seller']['v_id']) 
            {
                echo "<input type='hidden' value='del' id='status_admin'>";
                unset($_SESSION['status_admin']);
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
                    load_product();
                    $('#status_admin').val("");  
                }   
                if(name == "rej")
                {
                    Swal.fire({
                        title: "Product Rejected !",
                        icon: "error"
                    });
                    load_product();
                    $('#status_admin').val("");  
                }
                if(name == "del")
                {
                    Swal.fire({
                        title: "Product Deleted !",
                        icon: "error"
                    });
                    load_product();
                    $('#status_admin').val("");  
                }
            },500);

            setInterval(function(){
                $('#get').load(' #get');
            },1000);

            function load_product() {
                $.ajax({
                    url: "fetch_sell_order.php",
                    type: "POST",
                    success: function(data) {
                        $("#show_order").html(data);
                    }
                });
            }
            load_product();

        });

</script>
<?php
    include("footer.php");
?>