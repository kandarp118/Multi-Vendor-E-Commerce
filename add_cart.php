<?php
include("connection.php");
session_start();

if (isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['p_id'])) 
    {
        $p_id = $_POST['p_id'];
        $c_id = $_SESSION['user']['c_id'];

        $sel_pro_query = "SELECT * FROM product WHERE p_id = '$p_id'";
        $sel_pro_ans = mysqli_query($c, $sel_pro_query);
        $fp = mysqli_fetch_array($sel_pro_ans);

        if ($fp) {
            $p_qun = isset($_POST['p_qun']) ? (int)$_POST['p_qun'] : 1;
            $cart_total = $p_qun * (int)$fp['p_selling_price'];

            $ins_cart_query = "INSERT INTO cart (p_id, c_id, pro_name, pro_image, pro_price, pro_quantity, cart_total) 
                VALUES ('$p_id', '$c_id', '".$fp['p_name']."', '".$fp['p_image']."', '".$fp['p_selling_price']."', '$p_qun', '$cart_total')";

            $ins_cart_ans = mysqli_query($c, $ins_cart_query);

            if ($ins_cart_ans) {
                echo "success";
            } else {
                echo "incart";
            }
        } else {
            echo "Product not found.";
        }
    }
    else {
        echo "Invalid request.";
    }
} else {
    echo "signin";
}

?>
