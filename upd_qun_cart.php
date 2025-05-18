<?php
    include("connection.php");
    session_start();
    if (isset($_POST['sel_qun']) && isset($_POST['p_id'])) {
        $pro_id = $_POST['p_id'];
        $pro_qun = $_POST['sel_qun'];
        $cart_id = $_POST['cart_id'];
        $sel_pro_query="SELECT * FROM product WHERE p_id='$pro_id'";
        $sel_pro_ans=mysqli_query($c,$sel_pro_query);
        $fp=mysqli_fetch_array($sel_pro_ans);
?>
        <script>
            console.log("<?= $pro_id?>");
        </script>
        <?php
        $new_total=$pro_qun * $fp['p_selling_price'];
        $upd_cart_qun_query="UPDATE cart SET pro_quantity='$pro_qun',cart_total='$new_total' WHERE p_id='$pro_id' AND cart_id='$cart_id'";
        $upd_cart_qun_ans=mysqli_query($c,$upd_cart_qun_query);
        if ($upd_cart_qun_ans) {
            echo "success";
        } else {
            echo "error in update query";
        }
    } else {
        echo "error in pro_id and pro_qun";
    }
    
?>