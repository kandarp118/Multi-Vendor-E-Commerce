<?php
    include("header.php");
    include("menubar.php");
    include("connection.php");
?>
<div class="container-fuild py-5">
    <div class="container">
        <div class="row">
            <h1 class="fs-1 fw-bold">Your Orders</h1>
            <hr>
            <div id="show_pro_order"></div>
        </div>
    </div>
</div>
<div id="get">
<?php 
        if(isset($_SESSION['status_admin_order']))
        {
            if($_SESSION['status_admin_order'] == "delivered".$_SESSION['user']['c_id'])
            {
                echo "<input type='hidden' value='app' id='status_admin'>";
                unset($_SESSION['status_admin_order']);
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
                    title: "Order Successfully Delivered !",
                    icon: "success"
                });
                load_order();
                $('#status_admin').val("");  
            }
        },500);

        setInterval(function(){
            $('#get').load(' #get');
        },1000);

        function load_order() {
            $.ajax({
                url: "fetch_order.php",
                type: "POST",
                success: function(data) {
                    $("#show_pro_order").html(data);
                }
            });
        }
        load_order();

        $(document).on("click","#cancel_btn",function(){
            let o_id = $(this).data('o_id');
            let om_id = $(this).data('om_id');
            // console.log(p_id);
            $.ajax({
                url: 'cancel_order.php',
                method: 'POST',
                data: {
                    o_id:o_id,
                    om_id:om_id
                },
                success:function(data){
                    if (data === "success") {
                        load_order();
                    } else {
                        
                    }
                }
            });
        });
    });
</script>
<?php
    include("footer.php");
?>
