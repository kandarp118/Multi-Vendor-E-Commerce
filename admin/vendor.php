<?php
    session_start();
    if (isset($_SESSION['aunm'])) 
    {
        include("connection.php");
        include("header.php");
        include("sidebar.php");
        include("topbar.php");
?>
            
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Vendor</h1>
            <!-- <button type="button" onClick="add()" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">
                <i class="fas fa-cart-plus text-white"></i> Add Product</button> -->
        </div>

        <!-- Vendor Table -->
        <div class="card shadow my-3" id="vendor_table">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Vendor Table</h6>
            </div>
            <div class="card-body" id="show_vendor">
                
            </div>
        </div>
        
    </div>
    <div id="get">
<?php 
        if(isset($_SESSION['status_seller_req']))
        {
            if($_SESSION['status_seller_req']=="seller".$_SESSION['seller']['v_id'])
            {
                echo "<input type='hidden' value='add' id='status_seller'>";
                unset($_SESSION['status_seller_req']);
            }
        }
        
    ?>
</div>
    <script>
        $(document).ready(function() {
            // Product

            setInterval(function(){
                var name =  $('#status_seller').val();
                if(name == "add")
                {
                    load_vendor();
                    $('#status_seller').val("");  
                }
            },500);

            setInterval(function(){
                $('#get').load(' #get');
            },1000);

        function load_vendor()
        {
            $.ajax({
                url:"fetch_vendor.php",
                type:"POST",
                success:function(data){
                    $("#show_vendor").html(data);
                }
            });
        }
        load_vendor();
        // approve vendor
        $(document).on("click","#approve_btn",function(){
            let v_id = $(this).data('v_id');
            console.log(v_id);
            $.ajax({
                url: 'approve_vendor.php',
                method: 'POST',
                data: {
                    v_id:v_id
                },
                success:function(data){
                    if (data === "success") {
                        load_vendor();
                    } else {
                        
                    }
                }
            })
        });
        // reject btn to remove vendor data and session
        $(document).on("click","#reject_btn",function(){
            let v_id = $(this).data('v_id');
            console.log(v_id);
            $.ajax({
                url: 'reject_vendor.php',
                method: 'POST',
                data: {
                    v_id:v_id
                },
                success:function(data){
                    if (data === "success") {
                        load_vendor();
                        // var newtab = window.open('http://localhost/Akommerce/seller/index.php');
                        // ('http://localhost/Akommerce/seller/index.php').document.location.reload(true);
                    } else {
                        alert(data);
                    }
                }
            })
        });
    });
</script>
<?php
    include("footer.php");
} else {
    echo "
    <script type='text/javascript'>
        window.location='admin-login.php';
    </script>"; 
}
?>