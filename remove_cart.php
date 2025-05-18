<?php
    include("connection.php");
    $cart_id = $_POST['cart_id'];
    $del_cart_query = "DELETE FROM cart WHERE cart_id = $cart_id";
    $del_cart_ans = mysqli_query($c,$del_cart_query);
    if ($del_cart_ans) {
        echo "success";
    } else {
        echo $del_cart_query;
    }
    
?>