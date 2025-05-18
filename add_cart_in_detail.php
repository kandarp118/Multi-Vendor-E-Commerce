<?php
include("connection.php");
session_start();

    $p_id = $_POST['productId'];
    $c_id = $_SESSION['user']['c_id'];
    $sel_pro_query = "SELECT * FROM product WHERE p_id = '$p_id'";
    $sel_pro_ans = mysqli_query($c, $sel_pro_query);
    $fp = mysqli_fetch_array($sel_pro_ans);

    if ($fp) {
        $p_qun = isset($_POST['productQun']) ? (int)$_POST['productQun'] : 1;
        $cart_total = $p_qun * (int)$fp['p_selling_price'];

        $ins_cart_query = "
            INSERT INTO cart (p_id, c_id, pro_name, pro_image, pro_price, pro_quantity, cart_total) 
            VALUES ('$p_id', '$c_id', '".$fp['p_name']."', '".$fp['p_image']."', '".$fp['p_selling_price']."', '$p_qun', '$cart_total')
            ON DUPLICATE KEY UPDATE pro_quantity = pro_quantity + $p_qun, cart_total = cart_total + $cart_total
        ";

        $ins_cart_ans = mysqli_query($c, $ins_cart_query);

        if ($ins_cart_ans) {
            echo "success";
            ?>
            <?php
        } else {
            echo "Failed to add product to cart.";
        }
    } else {
        echo "Product not found.";
    }
?>
