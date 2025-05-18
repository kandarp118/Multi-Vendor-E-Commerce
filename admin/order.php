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
<div class="d-sm-flex align-items-center justify-content-between">
    <div class="d-flex justify-content-between">
        <h1 class="h3 text-gray-800 col-sm-6 p-0 m-0"> Order </h1>
        <!-- <button type="button" id="addshow" class=" d-block d-lg-none d-sm-none btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i></button> -->
    </div>

    <!-- <button type="button" id="addshow" class="d-none d-sm-inline-block btn btn-md btn-warning shadow-sm"><i class="fas fa-cart-plus text-white"></i> Add Brand</button> -->
</div>

<!-- BRAND TABLE -->
<div class="card shadow my-3" id="brand_table">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Order Table</h6>
    </div>
    <div class="card-body" id="show_order">
        
    </div>
</div>
</div>

<div id="get">
<?php 
    if(isset($_SESSION['status_order']))
    {
        if($_SESSION['status_order']=="cancelled".$_SESSION['user']['c_id'])
        {
            echo "<input type='hidden' value='can' id='status_seller'>";
            unset($_SESSION['status_order']);
        }
        if($_SESSION['status_order']=="add".$_SESSION['user']['c_id'])
        {
            echo "<input type='hidden' value='add' id='status_seller'>";
            unset($_SESSION['status_order']);
        }
    }
    
?>
</div>
<script>
$(document).ready(function(){
    // Brand 
        setInterval(function(){
            var name =  $('#status_seller').val();
            if(name == "can")
            {
                load_order();
                $('#status_seller').val("");  
            }
            if(name == "add")
            {
                load_order();
                $('#status_seller').val("");  
            }
        },500);

        setInterval(function(){
            $('#get').load(' #get');
        },1000);

        // Fetch Brand Data
        function load_order(){
            $.ajax({
                url:"fetch_order.php",
                type:"POST",
                success:function(data){
                    $("#show_order").html(data);
                }
            });
        }
        load_order();
        
        $(document).on("click","#place_btn",function(){
        let o_id = $(this).data('o_id');
        let om_id = $(this).data('om_id');
        // console.log(p_id);
        $.ajax({
            url: 'place_order.php',
            method: 'POST',
            data: {
                o_id:o_id,
                om_id:om_id
            },
            success:function(data){
                if (data === "success") {
                    load_order();
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