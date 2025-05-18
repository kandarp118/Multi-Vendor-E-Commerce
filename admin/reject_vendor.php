<?php
    include("connection.php");
    session_start();
    $v_id = $_POST['v_id'];
    $del_sell_pro = "DELETE FROM product WHERE p_author='$v_id'";
    $del_sell_ans = mysqli_query($c,$del_sell_pro);
    if ($del_sell_ans) {
        $del_sell = "DELETE FROM vendor WHERE v_id='$v_id'";
        $del_sell_res = mysqli_query($c,$del_sell);
        if ($del_sell_res) {
            if (isset($_SESSION['seller'])){
                $_SESSION['status_admin_sell'] = "reject_seller".$v_id;
                // if ($_SESSION['seller']['v_id'] == $v_id){
                //     unset($_SESSION['seller']);
                // }
                echo "success";
            }else{
                echo "error in session vendor";
                echo "success";
            }
        } else {
            echo "error in delete vendor";
        }
    } else {
        echo "error in delete product";
    }
    
?>